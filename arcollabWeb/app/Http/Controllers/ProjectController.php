<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Input;
use Validator;
use Redirect;
use User;
use Project;
use Item;
use Team;
use Tag;
use Group;
use Auth;

class ProjectController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $user = Auth::user();
        $projects = $user->projects;
		$sharedProjects = array();
		$teams = $user->assignedTeams;
		if (!empty($teams)){
			foreach ($teams as $team){
				$project = $team->parentProject;
				array_push($sharedProjects, $project);
			}
		}
		return view('projects', array('user'=>$user, 'projects'=>$projects, 'sharedProjects'=>$sharedProjects));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $user = Auth::user();
        $project = new Project;
		$project->name = Input::get('name');
		$project->description = Input::get('description');
		$project->save();

		$relation = $user->projects()->save($project);
		$relation->save();
		// getting all of the post data
		$file = array('image' => Input::file('image'));

		// setting up rules
		$rules = array(); //mimes:jpeg,bmp,png and for max size max:10000
		// doing the validation, passing post data, rules and the messages
		$validator = Validator::make($file, $rules);
		if ($validator->fails()) {
			// send back to the page with the input data and errors
			return 'validator failed';
		} else {
			// checking file is valid.
			if (Input::file('image')->isValid()) {
				$destinationPath = 'uploads';
				$extension = Input::file('image')->getClientOriginalExtension();
				$name = Input::file('image')->getClientOriginalName();
				$fileName = 'project'.$project->id.'.'.$extension;

				Input::file('image')->move($destinationPath, $fileName); // uploading file to given path

				$project->imageName = $name;
				$project->imageFilename = $fileName;
				$project->save();

				return back();
			} else {
				return Redirect::to('upload failed');
			}
		}
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $project = Project::find($id);
		$items = $project->items;
		$teams = $project->teams;
		$tags = $project->tags;
		return view("project", ['project' => $project, 'items' => $items, 'teams' => $teams, 'tags' => $tags]);
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
        $project = Project::find($id);
		$project->delete();
	    return Redirect::to('projects');
    }
}
