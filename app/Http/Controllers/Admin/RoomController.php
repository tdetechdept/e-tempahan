<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Room;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use OwenIt\Auditing\Models\Audit;

class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $rooms = Room::latest()->get();
        return view('admin.rooms.index', compact('rooms'));
    }
    
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.rooms.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'room_name'     => 'required|string|max:255|unique:rooms,room_name',
            'description'   => 'required|string',
            'room_capacity' => 'required|integer|min:1',
            'facilities'    => 'nullable|string',
            'picture'       => 'required|image|mimes:jpg,jpeg,png,webp,bmp|max:2048',
            'layout_plan'   => 'nullable|file|mimes:pdf,jpg,jpeg,png,webp,bmp|max:2048',
            'pic_name'      => 'required|string|max:255',
            'pic_phone'     => 'required|string|max:20',
            'pic_email'     => 'required|email|max:255',
        ]);

        $data = $validator->validated();

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        if ($request->hasFile('picture')) {
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path(Room::IMAGE_PATH), $pictureName);
            $data['picture'] = $pictureName;
        }

        if ($request->hasFile('layout_plan')) {
            $layout = $request->file('layout_plan');
            $layoutName = time() . '_' . $layout->getClientOriginalName();
            $layout->move(public_path(Room::PLAN_PATH), $layoutName);
            $data['layout_plan'] = $layoutName;
        }

        $room = Room::create([
            'room_name'      => $data['room_name'],
            'description'    => $data['description'],
            'room_capacity'  => $data['room_capacity'],
            'picture'        => $data['picture'] ?? null,
            'layout'         => $data['layout_plan'] ?? null,
            'facilities'     => array_map('trim', explode(',', $data['facilities'] ?? '')),
           
            'pic_name'       => $data['pic_name'],
            'pic_phone'      => $data['pic_phone'],
            'pic_email'      => $data['pic_email'],
        ]);

        // Add custom audit message
        $room->auditEvent = 'room_created_by_admin';
        $room->isCustomEvent = true;
        $room->save();

        return view('admin.rooms.success');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.show', compact('room'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $room = Room::findOrFail($id);
        return view('admin.rooms.edit', compact('room'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $room = Room::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'room_name' => ['required', 'string', 'max:255', Rule::unique('rooms', 'room_name')->ignore($room->id),],
            'description'   => 'required|string',
            'room_capacity' => 'required|integer|min:1',
            'facilities'    => 'nullable|string',
            'picture'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'layout_plan'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'pic_name'     => 'nullable|string|max:255',
            'pic_phone'    => 'nullable|string|max:50',
            'pic_email'    => 'nullable|email|max:255',
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();
        $originalStatus = $room->status;

        // Handle picture upload & delete old
        if ($request->hasFile('picture')) {
            if ($room->picture && file_exists(public_path(Room::IMAGE_PATH . '/' . $room->picture))) {
                unlink(public_path(Room::IMAGE_PATH . '/' . $room->picture));
            }
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path(Room::IMAGE_PATH), $pictureName);
            $data['picture'] = $pictureName;
        } else {
            $data['picture'] = $room->picture;
        }

        // Handle layout plan upload (store in DB even if changed)
        $layoutChanged = false;
        if ($request->hasFile('layout_plan')) {
            if ($room->layout && file_exists(public_path(Room::PLAN_PATH . '/' . $room->layout))) {
                unlink(public_path(Room::PLAN_PATH . '/' . $room->layout));
            }
            $layout = $request->file('layout_plan');
            $layoutName = time() . '_' . $layout->getClientOriginalName();
            $layout->move(public_path(Room::PLAN_PATH), $layoutName);
            $data['layout'] = $layoutName;

            if ($room->layout !== $layoutName) {
                $layoutChanged = true;
            }
        } else {
            $data['layout'] = $room->layout;
        }

        // Update room
        $room->update([
            'room_name'       => $data['room_name'],
            'description'     => $data['description'],
            'room_capacity'   => $data['room_capacity'],
            'facilities'      => array_map('trim', explode(',', $data['facilities'] ?? '')),
            'picture'         => $data['picture'],
            'layout'          => $data['layout'],
            'pic_name'        => $request->input('pic_name'),
            'pic_phone'       => $request->input('pic_phone'),
            'pic_email'       => $request->input('pic_email'),
        ]);

        // Add custom audit message based on what changed
        $room->isCustomEvent = true;
        $room->save();

        // If layout changed, go back to edit page with message
        if ($layoutChanged) {
            return redirect()
                ->route('rooms.edit', $room->id)
                ->with('layout_changed', true)
                ->with('success', 'Layout updated, please review changes.');
        }

        return view('admin.rooms.success-update');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $room = Room::findOrFail($id);

        // Delete picture file if exists
        if ($room->picture && file_exists(public_path(Room::IMAGE_PATH . '/' . $room->picture))) {
            unlink(public_path(Room::IMAGE_PATH . '/' . $room->picture));
        }

        // Delete layout file if exists
        if ($room->layout && file_exists(public_path(Room::PLAN_PATH . '/' . $room->layout))) {
            unlink(public_path(Room::PLAN_PATH . '/' . $room->layout));
        }

        // Add custom audit message before deletion
        $room->auditEvent = 'room_deleted_by_admin';
        $room->isCustomEvent = true;
        $room->save();
        
        $room->delete();

        return view('admin.rooms.success-delete');
    }

    public function cancelled()
    {
        $rooms = Room::where('status', '0')->get();
        return view('admin.rooms.cancelled', compact('rooms'));
    }
}
