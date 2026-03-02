<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Http\Requests\StoreDepartmentRequest;
use App\Http\Requests\UpdateDepartmentRequest;
use Illuminate\Http\Request;

class DepartmentController extends Controller
{
    /**
     * Display all departments for the authenticated user's facility (non-API)
     * 
     * Query parameters:
     * - per_page: Results per page (default: 15)
     */
    public function index()
    {
        $perPage = request()->input('per_page', 15);
        
        $departments = Department::orderBy('name')->paginate($perPage);
        
        return response()->json($departments);
    }

    /**
     * Show form for creating a new department (non-API)
     */
    public function create()
    {
        // This would typically return a view, but keeping it for REST completeness
        return response()->json(['message' => 'Use POST /departments to create']);
    }

    /**
     * Store a newly created department
     */
    public function store(StoreDepartmentRequest $request)
    {
        $department = Department::create([
            'facility_id' => auth()->user()->facility_id,
            'name' => $request->name,
            'total_beds' => $request->total_beds,
            'color_theme' => $request->color_theme,
        ]);

        return response()->json($department, 201);
    }

    /**
     * Display the specified department
     */
    public function show(Department $department)
    {
        $this->authorize('view', $department);
        return response()->json($department);
    }

    /**
     * Show form for editing the department (non-API)
     */
    public function edit(Department $department)
    {
        $this->authorize('view', $department);
        return response()->json(['message' => 'Use PATCH /departments/{id} to update']);
    }

    /**
     * Update the specified department
     */
    public function update(UpdateDepartmentRequest $request, Department $department)
    {
        $this->authorize('update', $department);

        $department->update([
            'name' => $request->name,
            'total_beds' => $request->total_beds,
            'color_theme' => $request->color_theme,
        ]);

        return response()->json($department);
    }

    /**
     * Delete the specified department
     */
    public function destroy(Department $department)
    {
        $this->authorize('delete', $department);

        $deptName = $department->name;
        $deptId = $department->id;
        
        $department->delete();

        // Log department deletion
        \App\Models\AuditLog::log(
            facilityId: auth()->user()->facility_id,
            userId: auth()->id(),
            action: 'delete',
            targetModel: 'Department',
            targetId: $deptId,
            changes: null,
            description: "Department '{$deptName}' deleted"
        );

        return response()->json(['message' => 'Department deleted successfully']);
    }
}
