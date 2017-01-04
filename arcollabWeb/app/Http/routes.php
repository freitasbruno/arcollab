<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/startbootstrap', function () {
    return view('startbootstrap');
});

Route::get('/home', function () {
    return view('home');
});

Route::get('/projects', function () {
	$user = User::find(session()->get('user_id'));
	$projects = $user->hasProject;
	
	if (is_null(session()->get('user_id'))){
		return view('login');
	}else{
		$user_id = session()->get('user_id');
		$user = User::find($user_id);
		return view('projects', array('user'=>$user, 'projects'=>$projects));
	}
});
Route::get('/project/{project_id}', function ($project_id) {
	$project = Project::find($project_id);
	return view("project")->with('project', $project);
});

Route::post('/newProject', function () {
	$user = User::find(session()->get('user_id'));
	
	$project = new Project;
	$project->name = Input::get('name');
	$project->save();
	
	$relation = $user->hasProject()->save($project);
	$relation->save();
	
    return Redirect::to('projects');
});

Route::get('/deleteProject/{id}', function ($id) {
	$project = Project::find($id);
	$project->delete();
    return Redirect::to('projects');
});

Route::get('/about', function () {
    return 'route to about page';
});

Route::get('/register', function () {
	return view('register');
});

Route::post('register', function () {
	$user = new User;
	$user->email = Input::get('email');
	$user->name = Input::get('name');
	$user->password = Hash::make(Input::get('password'));
	$user->save();
	
	return view('login', array('theEmail' => $user->email));
});

Route::get('/login', function () {
	$session_id = session()->get('user_id');
	if (is_null($session_id)){
		return view('login');
	}else{
		return view('projects');
	}
});

Route::post('login', function () {
	$credentials = Input::only('email', 'password');
	$user = User::where('email', $credentials['email'])->first();
	$password = $credentials['password'];
	if(Hash::check($password, $user->password)) {
		session()->put('user_id', $user->id);
		return redirect('projects');
	}else{
		return ('no success');
	}
});

Route::get('/logout', function () {
	session()->clear();
	return view('home');
});

Route::get('neoTestNodes', function () {
	for($i=0; $i<5; $i++){
		$node = new Node;
	    $node->name = 'Test Node ' . $i;
	    $node->save();
	}
});

Route::get('neoTestRelations', function () {
	/*
	One-To-One
	->hasOne()
	<-belongsTo()
	
	One-To-Many
	->hasMany()
	<-belongsTo()
	
	Many-To-Many
	->belongToMany()
	
	
	*/
	$node1 = Node::find(1);
	$node2 = Node::find(2);
	$relation = $node1->hasNode()->save($node2);
	$relation->name = $node1->name . "-" . $node2->name;
	$relation->save();
});

Route::get('neoTestModify', function () {
	$node1 = Node::find(1);
	$node2 = Node::find(3);
	$node1->name = $node1->name . ' - modified';
	$node1->save();
	
	$node2->name = $node2->name . ' - modified';
	$node2->save();
	
	$relation = $node1->hasNode()->save($node2);
	$relation->name = 'modified relation';
	$relation->save();
	
	$node0 = Node::find(0);
	$nodes = Node::all();
    foreach($nodes as $node){
    	if($node->id != 0){
	    	$relation = $node0->likes()->save($node);
			$relation->name = 'new like relation';
			$relation->save();
    	}
    }
});