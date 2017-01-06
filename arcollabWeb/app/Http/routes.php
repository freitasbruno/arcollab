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

Route::get('upload', function() {
  return ('image uploaded');
});

Route::get('/startbootstrap', function () {
    return view('startbootstrap');
});

Route::get('/home', function () {
    return view('home');
});

Route::post('/newTeam', function () {
	$user = User::find(session()->get('user_id'));
	
	$team = new Team;
	$team->name = Input::get('name');
	$team->save();

	$relation = $user->teams()->save($team);
	$relation->createdBy = $user->id;
	$relation->save();
	
    return back();
});

Route::get('/projects', function () {
	if (is_null(session()->get('user_id'))){
		return Redirect::to('login');
	}else{
		$user = User::find(session()->get('user_id'));
		$projects = $user->hasProject;
		return view('projects', array('user'=>$user, 'projects'=>$projects));
	}
});

Route::get('/project/{project_id}', function ($project_id) {
	$project = Project::find($project_id);
	$groups = $project->groups;
	return view("project", ['project' => $project, 'groups' => $groups]);
});

Route::post('newProject', 'UploadController@upload');

Route::get('/deleteProject/{id}', function ($id) {
	$project = Project::find($id);
	$project->delete();
    return Redirect::to('projects');
});

Route::get('/group/{group_id}', function ($group_id) {
	$group = Group::find($group_id);
	$items = $group->items;
	$groups = $group->groups;
	return view("group", ['group' => $group, 'items' => $items, 'groups' => $groups]);
});

Route::post('/newGroup', function () {
	$user = User::find(session()->get('user_id'));
	
	$group = new Group;
	$group->name = Input::get('name');
	$group->save();
	
	if (!empty(Input::get('project_id'))){
	    $project_id = Input::get('project_id');
	    $project = Project::find($project_id);
	    $relation = $project->groups()->save($group);
	    $redirect = 'project/'.$project_id;
	}elseif (!empty(Input::get('group_id'))){
	    $parentGroup_id = Input::get('group_id');
	    $parentGroup = Group::find($parentGroup_id);
	    $relation = $parentGroup->groups()->save($group);
	    $redirect = 'group/'.$parentGroup_id;
	}else{
	    return back();
	}
	$relation->createdBy = $user->id;
	$relation->save();
	
    return Redirect::to($redirect);
});

Route::get('/deleteGroup/{id}', function ($id) {
	// get parent project
	// redirect to parent project or group
	$group = Group::find($id);
	$group->delete();
    return Redirect::to('projects');
});

Route::get('/item/{item_id}', function ($item_id) {
	$item = Item::find($item_id);
	$comments = $item->comments;
	return view("item", ['item' => $item, 'comments' => $comments]);
});

Route::post('/newItem', function () {
	$user = User::find(session()->get('user_id'));
	
	//$project_id = Input::get('project_id');
	//$project = Project::find($project_id);
	$group_id = Input::get('group_id');
	$group = Group::find($group_id);
	
	$item = new Item;
	$item->title = Input::get('title');
	$item->description = Input::get('description');
	$item->save();
	
	$relation = $group->items()->save($item);
	$relation->createdBy = $user->id;
	$relation->save();
	
    return Redirect::to('group/'.$group_id);
});

Route::get('/deleteItem/{id}', function ($id) {
	// get parent project
	// redirect to parent project or group
	$item = Item::find($id);
	$item->delete();
    return Redirect::to('projects');
});

Route::post('/newComment', function () {
	$user = User::find(session()->get('user_id'));
	
	$item_id = Input::get('item_id');
	$item = Item::find($item_id);
	
	$comment = new Comment;
	$comment->description = Input::get('comment');
	$comment->save();
	
	$relation = $item->comments()->save($comment);
	$relation->createdBy = $user->id;
	$relation->save();
	
    return Redirect::to('item/'.$item_id);
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