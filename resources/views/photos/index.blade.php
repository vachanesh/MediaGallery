@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
          <h2>
            Photo List <a href="{{ route('photos.create') }}" class="btn btn-primary pull-right">Add New</a>
          </h2>
          <hr>
        </div>
        @if(count($photos) > 0)
            @foreach($photos as $photo)
            <div class="col-lg-3">
                <a href="{{ route('photos.delete', ['id' => $photo->id]) }}"><img src="{{ URL::asset('/default/delete.png') }}" class="close-btn"></img></a>
                <div class="thumbnail">
                    <img alt="{{$photo->name}}" src="{{$photo->photo ? $photo->photo : 'default/default-image.png'}}">
                    <div class="caption">
                        <h3>{{$photo->name}}</h3>
                        <p><b>Description : </b>{{$photo->description}}</p>
                        <small><b>Created date: </b><span>{{ date("d F Y",strtotime($photo->created_at)) }} at {{date("g:ha",strtotime($photo->created_at)) }}</span></small>
                    </div>
              </div>
            </div>
            @endforeach
            <div class="col-lg-12">
                <hr>
                {{ $photos->links() }}
            </div>
        @else
            <div class="col-lg-12">
                <center><i><h4 class="text-danger">There is no photos available.</h4></i></center>
            </div>
        @endif
    </div>
</div>
@endsection
