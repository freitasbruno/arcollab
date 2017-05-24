<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use User;
use Project;
use Team;
use Auth;

class TeamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $project = Project::find($id);
        $teams = $project->teams;
        return view('teams', array('project'=>$project, 'teams'=>$teams));
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

        $team = new Team;
        $team->name = $request->input('name');
        $team->save();

        if (!empty($request->input('project_id'))){
            $project_id = $request->input('project_id');
            $project = Project::find($project_id);
            $relation = $project->teams()->save($team);
            $redirect = 'project/'.$project_id;
        }elseif (!empty($request->input('team_id'))){
            $parentTeam_id = $request->input('team_id');
            $parentTeam = Team::find($parentTeam_id);
            $relation = $parentTeam->teams()->save($team);
            $redirect = 'team/'.$parentTeam_id;
        }else{
            $relation = $user->teams()->save($team);
            $relation->createdBy = $user->id;
            $relation->save();
            return back();
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
        $project = teamParentProject($id);
        $team = Team::find($id);
        $teams = $team->teams;
        return view("team", ['team' => $team, 'teams' => $teams, 'project' => $project]);
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
        $team = Team::find($id);
        $team->delete();
        return back();
    }
}
