<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Input;
use Validator;
use Redirect;
use Session;
use User;
use Item;
use Comment;
use Attachement;
use Auth;

class CommentController extends Controller {
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

		$item_id = $request->input('item_id');
		$item = Item::find($item_id);

		$comment = new Comment;
		$comment->description = $request->input('comment');
		$comment->createdBy = $user->id;
		$comment->save();

		$relation = $item->comments()->save($comment);
		$relation->save();

		// getting all of the post data
		$files = $request->file('attachements');

		if ($files[0] != null){

			// Making counting of uploaded images
			$file_count = count($files);

			// start count how many uploaded
			$uploadcount = 0;

			foreach($files as $file) {
			  $rules = array(); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
			  $validator = Validator::make(array('file'=> $file), $rules);
			  if($validator->passes()){
				$destinationPath = 'uploads';
				$originalName = $file->getClientOriginalName();
				$extension = $file->getClientOriginalExtension();
				if ($uploadcount == 0){
					$filename = 'comment'.$comment->id.'.'.$extension;
				}else{
					$filename = 'comment'.$comment->id.'_'.$uploadcount.'.'.$extension;
				}

				$upload_success = $file->move($destinationPath, $filename);
				$uploadcount ++;

				$attachement = new Attachement;
				$attachement->filename = $filename;
				$attachement->originalName = $originalName;
				$attachement->extension = $extension;

				$relation = $comment->attachements()->save($attachement);
				$relation->save();
			  }
			}
			if($uploadcount == $file_count){
			  Session::flash('msgSuccess', "New comment added successfully!");
			  return Redirect::to('items/'.$item_id);
			}
			else {
			  Session::flash('msgWarning', "There was a problem uploading the comment attachments");
			}
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
        //
    }
}
