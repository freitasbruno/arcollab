<?php 

namespace App\Http\Controllers;

use Input;
use Validator;
use Redirect;
use Request;
use Session;
use User;
use Item;
use Comment;
use Attachement;
use Auth;

class NewCommentController extends Controller {
	
  public function create() {
    
	$user = Auth::user();
	
	$item_id = Input::get('item_id');
	$item = Item::find($item_id);
	
	$comment = new Comment;
	$comment->description = Input::get('comment');
	$comment->createdBy = $user->id;
	$comment->save();
	
	$relation = $item->comments()->save($comment);
	$relation->save();
  	
    // getting all of the post data
    $files = Input::file('attachements');

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
	      Session::flash('success', 'Upload successfully'); 
	      return Redirect::to('item/'.$item_id);
	    } 
	    else {
	      return Redirect::to('item/'.$item_id)->withInput()->withErrors($validator);
    	}
    }
    
    return back();

  }
}