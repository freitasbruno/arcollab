<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use User;
use Project;
use Group;
use Item;
use Auth;

class GroupController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

        $group = new Group;
        $group->name = $request->input('name');
        $group->save();

        if (!empty($request->input('project_id'))){
            $project_id = $request->input('project_id');
            $project = Project::find($project_id);
            $relation = $project->groups()->save($group);
            $redirect = 'project/'.$project_id;
        }elseif (!empty($request->input('group_id'))){
            $parentGroup_id = $request->input('group_id');
            $parentGroup = Group::find($parentGroup_id);
            $relation = $parentGroup->groups()->save($group);
            $redirect = 'group/'.$parentGroup_id;
        }else{
            return back();
        }
        $relation->createdBy = $user->id;
        $relation->save();

        return Redirect::to($redirect);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $group = Group::find($group_id);
        $items = $group->items;
        $groups = $group->groups;
        $project = parentProject($group_id);
        $teams = $project->teams;
        $tags = $project->tags;
        return view("group", ['group' => $group, 'project' => $project, 'items' => $items, 'groups' => $groups, 'teams' => $teams, 'tags' => $tags]);
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
        $group = Group::find($id);
        $group->delete();
        return back();
    }
}
