<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use User;
use Project;
use Tag;
use Auth;

class TagController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);
		$tags = $project->tags;
		return view('tags', array('project'=>$project, 'tags'=>$tags));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = Auth::user();

        $tag = new Tag;
        $tag->name = $request->input('name');
        $tag->save();

        if (!empty($request->input('project_id'))){
            $project_id = $request->input('project_id');
            $project = Project::find($project_id);
            $relation = $project->tags()->save($tag);
            $redirect = 'tags/'.$project_id;
        }
        elseif (!empty($request->input('parentTag_id'))) {
            $parentTag_id = $request->input('parentTag_id');
            $parentTag = Tag::find($parentTag_id);
            $relation = $parentTag->tags()->save($tag);
        }
        else {
            return back();
        }
        $relation->createdBy = $user->id;
        $relation->save();

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tag = Tag::find($id);
        $tag->delete();
        return back();
    }
}
