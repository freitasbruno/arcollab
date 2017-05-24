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
     * The user repository instance.
     */
    protected $user;

    /**
     * Create a new controller instance.
     *
     * @param  User  $user
     * @return void
     */
    public function __construct()
    {
        $this->user = Auth::user();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = $this->user->projects;
		$sharedProjects = array();
		$teams = $this->user->assignedTeams;
		if (!empty($teams)){
			foreach ($teams as $team){
				$project = $team->parentProject;
				array_push($sharedProjects, $project);
			}
		}
		return view('projects', array('user'=>$this->user, 'projects'=>$projects, 'sharedProjects'=>$sharedProjects));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        // Creating the project and saving the relation to the user
        $project = new Project;
		$project->name = $request->input('name');
		$project->description = $request->input('description');
		$project->save();

		$relation = $user->projects()->save($project);
		$relation->save();

        if ($request->hasFile('image')) {
            if ($request->file('image')->isValid()) {
                $file = $request->file('image');

                /*
                $rules = array(); //mimes:jpeg,bmp,png and for max size max:10000
                $validator = Validator::make($file, $rules);

                if ($validator->fails()) {
                    // send back to the page with the input data and errors
                    return 'validator failed';
                }
                */

                $destinationPath = 'uploads';
                $extension = $request->file('image')->getClientOriginalExtension();
                $name = $request->file('image')->getClientOriginalName();
                $fileName = 'project'.$project->id.'.'.$extension;

                $file->move($destinationPath, $fileName);

                $project->imageName = $name;
                $project->imageFilename = $fileName;
                $project->save();

            }
        }else{
            return ('Image not valid');
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
