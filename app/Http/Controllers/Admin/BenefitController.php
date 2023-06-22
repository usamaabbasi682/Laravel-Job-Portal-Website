<?php

namespace App\Http\Controllers\Admin;

use App\Models\Benefit;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BenefitController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $benefits = Benefit::orderBy('id','DESC')->get();
        return view('admin.manage_jobs.attributes.benefits.index',compact('benefits'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_jobs.attributes.benefits.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $benefit = $request->input('name');
        try {
            Benefit::create([
                'name' => $benefit,
            ]);

            return to_route('admin.benefits.index')->with('success','Benefit has been successfully Added');
        } catch (\Exception $e) {
            return to_route('admin.benefits.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Benefit $benefit)
    {
        return view('admin.manage_jobs.attributes.benefits.edit',compact('benefit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Benefit $benefit)
    {
        $request->validate(['name'=>'required']);
        $benefitName = $request->input('name');
        try {
            $benefit->update([
                'name' => $benefitName,
            ]);

            return to_route('admin.benefits.index')->with('success','Benefit has been successfully Updated');
        } catch (\Exception $e) {
            return to_route('admin.benefits.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Benefit $benefit)
    {
        $benefit->delete();
        return to_route('admin.benefits.index')->with('error','Benefit deleted successfully.');
    }
}
