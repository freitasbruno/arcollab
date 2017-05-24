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
    return view('home');
});

Route::get('/about', function () {
    return 'route to about page';
});

Route::get('/home', function () {
    return view('home');
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
	$email = $credentials['email'];
	$password = $credentials['password'];
	$user = User::where('email', $credentials['email'])->first();

	if (Auth::attempt(['email' => $email, 'password' => $password])) {
			Auth::login($user);
            return redirect('projects');
        }else{
		return back();
	}
});

Route::post('newProject', 'ProjectController@create');
Route::post('newComment', 'NewCommentController@create');
Route::post('addUser', 'AddUserController@create');

Route::resource('projects', 'ProjectController');
/*
Route::get('projects', 'ProjectController@all');
Route::get('project/{project_id}', 'ProjectController@show');
Route::get('deleteProject/{id}', 'ProjectController@delete');
*/
Route::get('/logout', function () {
	session()->clear();
	return view('home');
});

Route::get('/teams/{project_id}', function ($project_id) {
		$project = Project::find($project_id);
		$teams = $project->teams;
		return view('teams', array('project'=>$project, 'teams'=>$teams));
});

Route::get('/team/{team_id}', function ($team_id) {
	$project = teamParentProject($team_id);
	$team = Team::find($team_id);
	$teams = $team->teams;
	return view("team", ['team' => $team, 'teams' => $teams, 'project' => $project]);
});

Route::post('/newTeam', function () {
	$user = Auth::user();

	$team = new Team;
	$team->name = Input::get('name');
	$team->save();

	if (!empty(Input::get('project_id'))){
	    $project_id = Input::get('project_id');
	    $project = Project::find($project_id);
	    $relation = $project->teams()->save($team);
	    $redirect = 'project/'.$project_id;
	}elseif (!empty(Input::get('team_id'))){
	    $parentTeam_id = Input::get('team_id');
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
});

Route::get('/deleteTeam/{id}', function ($id) {
	$team = Team::find($id);
	$team->delete();
	return back();
});

/*
Route::get('/group/{group_id}', function ($group_id) {
	$group = Group::find($group_id);
	$items = $group->items;
	$groups = $group->groups;
	$project = parentProject($group_id);
	$teams = $project->teams;
	$tags = $project->tags;
	return view("group", ['group' => $group, 'project' => $project, 'items' => $items, 'groups' => $groups, 'teams' => $teams, 'tags' => $tags]);
});

Route::post('/newGroup', function () {
	$user = Auth::user();

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
	return back();
});
*/

Route::get('/tags/{project_id}', function ($project_id) {
		$project = Project::find($project_id);
		$tags = $project->tags;
		return view('tags', array('project'=>$project, 'tags'=>$tags));
});

Route::post('/newTag', function () {
	$user = Auth::user();

	$tag = new Tag;
	$tag->name = Input::get('name');
	$tag->save();

	if (!empty(Input::get('project_id'))){
        $project_id = Input::get('project_id');
        $project = Project::find($project_id);
        $relation = $project->tags()->save($tag);
        $redirect = 'tags/'.$project_id;
	}
	elseif (!empty(Input::get('parentTag_id'))) {
		$parentTag_id = Input::get('parentTag_id');
	    $parentTag = Tag::find($parentTag_id);
	    $relation = $parentTag->tags()->save($tag);
	}
	else {
	    return back();
	}
	$relation->createdBy = $user->id;
	$relation->save();

    return back();
});

Route::get('/deleteTag/{id}', function ($id) {
	// get parent project
	// redirect to parent project or group
	$tag = Tag::find($id);
	$tag->delete();
    return back();
});

Route::get('/item/{item_id}', function ($item_id) {
	$item = Item::find($item_id);
	$comments = $item->comments;
	$group = $item->parentGroup;
	$groups = $group->groups;
	$items = $group->items;
	$project = itemParentProject($item_id);

	return view("item", ['item' => $item, 'items' => $items, 'comments' => $comments, 'project' => $project, 'group' => $group, 'groups' => $groups]);
});

Route::post('/newItem', function () {

	$user = Auth::user();

	$group_id = Input::get('group_id');
	$group = Group::find($group_id);
	$project = parentProject($group_id);

	$item = new Item;
	$item->title = Input::get('title');
	$item->description = Input::get('description');
	$item->save();

	$relation = $group->items()->save($item);
	$relation->createdBy = $user->id;
	$relation->save();

	$teams = $project->teams;
	foreach($teams as $team){
		if(isset($_POST[$team->name])){
			$relation = $item->teams()->save($team);
		}
	}

	$tags = $project->tags;
	foreach($tags as $tag){
		$nestedTags = $tag->tags;
		foreach($nestedTags as $nestedTag){
			if(isset($_POST[preg_replace('/\s+/', '_', $nestedTag->name)])){
				$relation = $item->tags()->save($nestedTag);
			}
		}
	}

    return Redirect::to('group/'.$group_id);
});

Route::get('/deleteItem/{id}', function ($id) {
	// get parent project
	// redirect to parent project or group
	$item = Item::find($id);
	$item->delete();
	return back();
});
