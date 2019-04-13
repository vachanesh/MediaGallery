<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Photo;
use Auth;

class PhotosController extends Controller {
	public function index() {
		$user_id = Auth::user()->id;
      	$photos = Photo::where('user_id', $user_id)->paginate(10);
      	return view('photos/index')->with('photos', $photos);
  	}

  	public function create() {
      	$photo = new Photo();
      	return view('photos/create')->with('photo', $photo);
  	}

  	public function save($id = null, Request $request) {
      	$photo = new Photo();
      	$rules = [
	      'name' => 'required',
	      'description' => 'required',
	      'photo_path'=>'required|image'
	    ];

	    $input = ['id' => null];

	    $validator = Validator::make($request->all(), $rules);
	    if($validator->fails()){
	    	// dd($validator);
	        return redirect()->route('photos.create')->withErrors($validator)->withInput();
	    }
	    $filename = $request->file('photo_path')->getClientOriginalName();
	    $image = base64_encode(file_get_contents($request->file('photo_path')));

		$image = 'data:'.$request->file('photo_path')->getClientMimeType().';base64,'.$image;

	    Photo::create(array(
	      'user_id' => Auth::user()->id,
	      'name' => $request->get('name'),
	      'description' => $request->get('description'),
	      'photo_path' => $filename,
	      'photo' => $image,
	    ));

	    return redirect()->route('photos');
  	}

  	public function delete($id) {
      	$photo = Photo::find($id);

		$photo->delete();

		return redirect()->route('photos');
  	}
}
