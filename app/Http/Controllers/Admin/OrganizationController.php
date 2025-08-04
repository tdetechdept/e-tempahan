<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Section;
use App\Models\Department;
use App\Models\Agency;
use App\Models\Chairman;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\RedirectResponse;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     */

    private function getModelInstance($type)
    {
        return match ($type) {
            'section' => \App\Models\Section::class,
            'department' => \App\Models\Department::class,
            'agency' => \App\Models\Agency::class,
            'chairman' => \App\Models\Chairman::class,
            default => abort(404),
        };
    }
    public function index()
    {
        $sections = Section::latest()->get();
        $agencies = Agency::latest()->get();
        $department = Department::latest()->get();
        $chairmen = Chairman::latest()->get();
        return view('admin.organization.index', compact('sections', 'agencies', 'department', 'chairmen'));
    }

    public function create($type)
    {
        $validTypes = ['section', 'department', 'agency', 'chairman'];

        if (!in_array($type, $validTypes)) {
            abort(404);
        }

        return view('admin.organization.create', compact('type'));
    }

    public function store(Request $request, $type): RedirectResponse
    {
        switch ($type) {
            case 'section':
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255|unique:sections,name'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Section::create(['name' => $request->name]);
                break;

            case 'department':
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255|unique:departments,name'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Department::create(['name' => $request->name]);
                break;

            case 'agency':
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255|unique:agencies,name'
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Agency::create(['name' => $request->name]);
                break;

            case 'chairman':
                $validator = Validator::make($request->all(), [
                    'name' => 'required|string|max:255',
                    'position' => 'nullable|string|max:255',
                    'division' => 'nullable|string|max:255',
                    'office_phone' => 'nullable|string|max:20',
                ]);
                if ($validator->fails()) {
                    return redirect()->back()->withErrors($validator)->withInput();
                }
                Chairman::create($request->only(['name', 'position', 'division', 'office_phone']));
                break;
        }

        return redirect()->route('organization.index')->with('success', ucfirst($type) . ' berjaya dikemaskini.');
    }



    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($type, $id)
    {
        $validTypes = ['section', 'department', 'agency', 'chairman'];
        if (!in_array($type, $validTypes)) {
            abort(404);
        }

        $model = $this->getModelInstance($type)::findOrFail($id);
        return view('admin.organization.edit', compact('type', 'model'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $type, $id): RedirectResponse
    {
        $validTypes = ['section', 'department', 'agency', 'chairman'];
        if (!in_array($type, $validTypes)) {
            abort(404);
        }

        $model = $this->getModelInstance($type)::findOrFail($id);

        $tableMap = [
            'section' => 'sections',
            'department' => 'departments',
            'agency' => 'agencies',
            'chairman' => 'chairmen',
        ];

        $table = $tableMap[$type] ?? abort(404);

        $rules = ['name' => "required|string|max:255|unique:$table,name,$id"];

        if ($type === 'chairman') {
            $rules['position'] = 'nullable|string|max:255';
            $rules['division'] = 'nullable|string|max:255';
            $rules['office_phone'] = 'nullable|string|max:20';
        }

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $model->update($request->only(array_keys($rules)));

        return redirect()->route('organization.index')->with('success', ucfirst($type) . ' berjaya dikemaskini.');
    }

    public function destroy(Request $request, $type, $id)
    {
        $model = $this->getModelInstance($type)::findOrFail($id);
        $model->delete();

        return redirect()->back()->with('success', ucfirst($type) . ' berjaya dipadam.');
    }
}
