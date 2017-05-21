<?php 

namespace App\Http\Controllers;


use Input;
use Validator;
use User;
use Team;
use Auth;
use Mail;

class AddUserController extends Controller {
	
	public function create() {
	
		$sender = Auth::user();
		$to= Input::get('email');
		$from = $sender->email;
		$this->sendEmailInvite($to, $from);
		/*
		$user = User::where('email', $email)->first();
		$team = Team::find(Input::get('team_id'));
		
		$relation = $team->users()->save($user);
		$users = $team->users;
		*/
		
		return back();
	
	}
	
	public function sendEmailInvite($to, $from)
    {
        Mail::send('emails.invite', ['to' => $to], function ($m) use ($to){
            $m->from('hello@aconex.com', 'ARCOLLAB');
            $m->to($to, 'user')->subject('Your invite!');
        });
    }
}