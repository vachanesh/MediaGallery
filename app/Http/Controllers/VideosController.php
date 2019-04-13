<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use App\Video;
use Auth;

class VideosController extends Controller {
	public function index() {
		$user_id = Auth::user()->id;
      	$videos = Video::where('user_id', $user_id)->paginate(10);
      	return view('videos/index')->with('videos', $videos);
  	}

  	public function create() {
      	$video = new Video();
      	return view('videos/create')->with('video', $video);
  	}

  	public function save($id = null, Request $request) {
      	$video = new Video();
      	$rules = [
	      'name' => 'required',
	      'description' => 'required',
	      'video_path'=>'required|mimetypes:video/avi,video/mpeg,video/quicktime,video/mp4,video/3gpp'
	    ];

	    $input = ['id' => null];

	    $validator = Validator::make($request->all(), $rules);
	    if($validator->fails()){
	    	// dd($validator);
	        return redirect()->route('videos.create')->withErrors($validator)->withInput();
	    }

	    // $file = $request->file('video_path');
	    // $random_name = str_random(8);
	    // $destinationPath = 'video/';
	    // $extension = $file->getClientOriginalExtension();
	    // $filename=$random_name.'_video.'.$extension;
	    // $uploadSuccess = $request->file('video_path')->move($destinationPath, $filename);

     	$filename = $request->file('video_path')->getClientOriginalName();
	    $video = base64_encode(file_get_contents($request->file('video_path')));

		$video = 'data:'.$request->file('video_path')->getClientMimeType().';base64,'.$video;
	    Video::create(array(
    	  'user_id' => Auth::user()->id,
	      'name' => $request->get('name'),
	      'description' => $request->get('description'),
	      'video_path' => $filename,
	      'video' => $video,
	    ));

	    return redirect()->route('videos');
  	}

  	public function delete($id) {
      	$video = Video::find($id);

		$video->delete();

		return redirect()->route('videos');
  	}
}
