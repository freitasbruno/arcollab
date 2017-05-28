<?php

namespace App\Http\Controllers;


use Input;
use Validator;
use Redirect;
use Session;
use User;
use Team;
use Auth;
use Mail;

class TeamUserController extends Controller {

	public function create() {

		$newUserEmail = Input::get('email');
		$user = User::where('email', $newUserEmail)->first();
		$from = Auth::user();
		$to= $newUserEmail;
		if (!is_null($user)){
			/*
			$team = Team::find(Input::get('team_id'));
			$relation = $team->users()->save($user);
			*/
			Session::flash('msgSuccess', $user->name . " has been added to the project");
			$this->sendEmailInvite($to, $from);
			return back();
		}else{
			Session::flash('msgWarning', "Could not find user");
			//$this->sendEmailInvite($to, $from);
			return back();
		}
	}

	public function sendEmailInvite($to, $from)
    {
        Mail::send('emails.invite', ['to' => $to], function ($m) use ($to, $from){
            $m->from('freitascbruno@gmail.com', 'ARCOLLAB');
            $m->to($to, 'user')->subject($from->name . ' invited you to collaborate on a project!');
        });
    }
}
