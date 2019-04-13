@extends('layouts.app')

@section('content')
<div class="container">
      <div class="span4" style="display: inline-block;margin-top:100px;">
        <form name="createnewalbum" method="POST"action="{{route('photos.save')}}" enctype="multipart/form-data">
            {{ csrf_field() }}
          <fieldset>
            <legend>Add New Photo</legend>
            <div class="form-group">
              <label for="name">Photo Name</label>
              <input name="name" type="text" class="form-control"placeholder="Photo Name" value="{{old('name')}}">
              @if ($errors->has('name'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('name') }}</strong>
                </span>
              @endif

            </div>
            <div class="form-group">
              <label for="description">Photo Description</label>
              <textarea name="description" type="text"class="form-control" placeholder="Photo description">{{old('description')}}</textarea>
              @if ($errors->has('description'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('description') }}</strong>
                </span>
              @endif
            </div>
            <div class="form-group">
              <label for="cover_image">Select a Photo</label>
              {{Form::file('photo_path')}}
              @if ($errors->has('photo_path'))
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $errors->first('photo_path') }}</strong>
                </span>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Create!</button>
          </fieldset>
        </form>
      </div>
    </div> <!-- /container -->
@endsection
