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
    return view('projects');
});

Route::get('/project/{project_id}', function ($project_id) {
	$project = Project::find($project_id);
	return view("project")->with('project', $project);
});

Route::post('newProject', function () {
	$project = new Project;
	$project->name = Input::get('name');
	$project->save();
	
    return view('projects');
});

Route::get('/deleteProject/{id}', function ($id) {
	$project = Project::find($id);
	$project->delete();
    return Redirect::to('projects');
});

Route::get('/about', function () {
    return 'route to about page';
});

Route::get('/neoTestNodes', function () {
	for($i=0; $i<5; $i++){
		$node = new Node;
	    $node->name = 'Test Node ' . $i;
	    $node->save();
	}
});

Route::get('/neoTestRelations', function () {
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

Route::get('/neoTestModify', function () {
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