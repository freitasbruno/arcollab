<?php 

namespace App\Http\Controllers;

use Input;
use Validator;
use User;
use Team;

class AddUserController extends Controller {

	public function create() {
	
		$email = Input::get('email');
		$user = User::where('email', $email)->first();
		$team = Team::find(Input::get('team_id'));
		
		$relation = $team->users()->save($user);
		$users = $team->users;
		
		return back();
	
	}
}