@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h2>
            Video List <a href="{{ route('videos.create') }}" class="btn btn-primary pull-right">Add New</a>
          </h2>
          <hr>
        </div>

        @if(count($videos) > 0)
          @foreach($videos as $video)
          <div class="col-lg-3">
            <div class="thumbnail">
              <a href="{{ route('videos.delete', ['id' => $video->id]) }}" ><img src="{{ URL::asset('/default/delete.png') }}" class="close-btn"></img></a>
              <video controls style="width: 100%">
                <source type="video/mp4" src="{{$video->video_path ? $video->video : 'javascript:void(0)'}}">
              </video>
              <div class="caption">
                <h3>{{$video->name}}</h3>
                <p><b>Description : </b>{{$video->description}}</p>
                <small><b>Created date: </b><span>{{ date("d F Y",strtotime($video->created_at)) }} at {{date("g:ha",strtotime($video->created_at)) }}</span></small>
              </div>
            </div>
          </div>
          @endforeach
          <div class="col-lg-12">
            <hr>
            {{ $videos->links() }}
          </div>
        @else
          <div class="col-lg-12">
            <center><i><h4 class="text-danger">There is no videos available.</h4></i></center>
          </div>
        @endif
    </div>
</div>
@endsection
