<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use User;
use Project;
use Item;
use Tag;
use Team;
use Comment;
use Auth;

class ItemController extends Controller
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

    	$project_id = $request->input('project_id');
    	$project = Project::find($project_id);

    	$item = new Item;
    	$item->title = $request->input('title');
    	$item->description = $request->input('description');
    	$item->save();

    	$relation = $project->items()->save($item);
    	$relation->createdBy = $user->id;
    	$relation->save();

    	$teams = $project->teams;
    	foreach($teams as $team){
            $nestedTeams = $team->teams;
    		if(isset($_POST[$team->name])){
    			$relation = $item->teams()->save($team);
    		}
            foreach($nestedTeams as $nestedTeam){
    			if(isset($_POST[preg_replace('/\s+/', '_', $nestedTeam->name)])){
    				$relation = $item->teams()->save($nestedTeam);
    			}
    		}
    	}

    	$tags = $project->tags;
    	foreach($tags as $tag){
    		$nestedTags = $tag->tags;
            if(isset($_POST[preg_replace('/\s+/', '_', $tag->name)])){
                $relation = $item->tags()->save($tag);
            }
    		foreach($nestedTags as $nestedTag){
    			if(isset($_POST[preg_replace('/\s+/', '_', $nestedTag->name)])){
    				$relation = $item->tags()->save($nestedTag);
    			}
    		}
    	}
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
        $item = Item::find($id);
        $comments = $item->comments;
        $project = $item->parentProject;

        return view("item", ['item' => $item, 'comments' => $comments, 'project' => $project]);
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
        $item = Item::find($id);
        $item->delete();
        return back();
    }
}
