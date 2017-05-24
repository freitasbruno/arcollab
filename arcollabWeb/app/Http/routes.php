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

Route::get('/logout', function () {
	session()->clear();
	return view('home');
});

Route::post('newComment', 'NewCommentController@create');
Route::post('addUser', 'AddUserController@create');

Route::get('project/{id}/delete', ['as' => 'project.delete', 'uses' => 'ProjectController@destroy']);
Route::resource('projects', 'ProjectController');

Route::get('tags/{project_id}', 'TagController@index');
Route::post('newTag', 'TagController@store');
Route::get('deleteTag/{id}', 'TagController@destroy');

Route::get('teams/{project_id}', 'TeamController@index');
Route::get('team/{id}', 'TeamController@show');
Route::post('newTeam', 'TeamController@store');
Route::get('deleteTeam/{id}', 'TeamController@destroy');

Route::get('item/{id}/delete', ['as' => 'item.delete', 'uses' => 'ItemController@destroy']);
Route::resource('items', 'ItemController');

Route::get('group/{id}/delete', ['as' => 'group.delete', 'uses' => 'GroupController@destroy']);
Route::resource('groups', 'GroupController');
