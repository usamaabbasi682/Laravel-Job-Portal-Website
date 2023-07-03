<?php

namespace App\Http\Controllers\Admin;

use App\Models\Tag;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $tags = Tag::orderBy('id','DESC')->get();
        return view('admin.manage_jobs.attributes.tags.index',compact('tags'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.manage_jobs.attributes.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $tag = $request->input('name');
        try {
            Tag::create([
                'name' => $tag,
                'slug' => \Illuminate\Support\Str::slug($tag),
            ]);

            return to_route('admin.tags.index')->with('success','Tag has been successfully Added');
        } catch (\Exception $e) {
            return to_route('admin.tags.index')->with('error','Something went wrong!');
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
    public function edit(Tag $tag)
    {
        return view('admin.manage_jobs.attributes.tags.edit',compact('tag'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,Tag $tag)
    {
        $request->validate(['name'=>'required']);
        $tagName = $request->input('name');
        try {
            $tag->update([
                'name' => $tagName,
                'slug' => \Illuminate\Support\Str::slug($tagName),
            ]);

            return to_route('admin.tags.index')->with('success','Tag has been successfully Updated');
        } catch (\Exception $e) {
            return to_route('admin.tags.index')->with('error','Something went wrong!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Tag $tag)
    {
        $tag->delete();
        return to_route('admin.tags.index')->with('error','Tag deleted successfully.');
    }
}
