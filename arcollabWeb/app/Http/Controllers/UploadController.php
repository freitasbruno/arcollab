<?php 

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use User;
use Project;

class UploadController extends Controller {
	
	public function upload() {
		$user = User::find(session()->get('user_id'));
	
		$project = new Project;
		$project->name = Input::get('name');
		$project->save();
		
		$relation = $user->hasProject()->save($project);
		$relation->save();
		
		// getting all of the post data
		$file = array('image' => Input::file('image'));
		// setting up rules
		$rules = array('image' => 'required',); //mimes:jpeg,bmp,png and for max size max:10000
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
				
				return Redirect::to('projects');
			} else {
				return Redirect::to('upload failed');
			}
		}
	}
}