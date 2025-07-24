<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\Models\Room;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;

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
            'level'         => 'nullable|string|max:255',
            'status' => ['required', Rule::in([Room::STATUS_ACTIVE, Room::STATUS_INACTIVE])],
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

        Room::create([
            'room_name'      => $data['room_name'],
            'description'    => $data['description'],
            'room_capacity'  => $data['room_capacity'],
            'picture'        => $data['picture'] ?? null,
            'layout'         => $data['layout_plan'] ?? null,
            'facilities'     => array_map('trim', explode(',', $data['facilities'] ?? '')),
            'status'         => $data['status'],
            'level'          => $data['level'],
        ]);

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
            'room_name'     => 'required|string|max:255',
            'description'   => 'required|string',
            'room_capacity' => 'required|integer|min:1',
            'facilities'    => 'nullable|string',
            'level'         => 'nullable|string',
            'picture'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'layout_plan'   => 'nullable|file|mimes:pdf,jpg,jpeg,png|max:2048',
            'status'        => ['required', Rule::in([Room::STATUS_ACTIVE, Room::STATUS_INACTIVE])],
        ]);

        if ($validator->fails()) {
            return redirect()
                ->back()
                ->withErrors($validator)
                ->withInput();
        }

        $data = $validator->validated();

        // Handle picture upload & delete old
        if ($request->hasFile('picture')) {
            if ($room->picture && file_exists(public_path(Room::IMAGE_PATH . '/' . $room->picture))) {
                unlink(public_path(Room::IMAGE_PATH . '/' . $room->picture));
            }
            $picture = $request->file('picture');
            $pictureName = time() . '_' . $picture->getClientOriginalName();
            $picture->move(public_path(Room::IMAGE_PATH), $pictureName);
            $data['picture'] = $pictureName;
        }

        // Handle layout plan upload & delete old
        if ($request->hasFile('layout_plan')) {
            if ($room->layout && file_exists(public_path(Room::PLAN_PATH . '/' . $room->layout))) {
                unlink(public_path(Room::PLAN_PATH . '/' . $room->layout));
            }
            $layout = $request->file('layout_plan');
            $layoutName = time() . '_' . $layout->getClientOriginalName();
            $layout->move(public_path(Room::PLAN_PATH), $layoutName);
            $data['layout'] = $layoutName;
        }

        // Update room
        $room->update([
            'room_name'       => $data['room_name'],
            'description'     => $data['description'],
            'room_capacity'   => $data['room_capacity'],
            'facilities'      => array_map('trim', explode(',', $data['facilities'] ?? '')),
            'picture'         => $data['picture'] ?? $room->picture,
            'layout'          => $data['layout'] ?? $room->layout,
            'level'           => $data['level'],
            'status'          => $data['status'],
        ]);

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

        $room->delete();

        return view('admin.rooms.success-delete');
    }

    public function cancelled()
    {
        $rooms = Room::where('status', '0')->get();
        return view('admin.rooms.cancelled', compact('rooms'));
    }
}
