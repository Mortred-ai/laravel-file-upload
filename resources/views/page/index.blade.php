@extends('layout.app')

@section('content')

<div class="mt-5">
    <h1>File Upload</h1>
</div>
<form method="POST" enctype="multipart/form-data" action="{{ route('upload.store') }}">
    @csrf
    <div class=" form-group">
        <label for="title">Title</label>
        <input type="text" class="form-control" id="title" name="title" aria-describedby="emailHelp" placeholder="Enter Text" value="{{ old('title') }}">
        @error("title")
        <small class="text-danger"> {{ $message }}</small>
        @enderror
    </div>
    <div class="custon-file">
        <div class="custom-file">
            <input type="file" class="custom-file-input" id="customFile" name="image">
            <label class="custom-file-label" for="customFile">Choose file</label>
            @error("image")
            <small class="text-danger"> {{ $message }}</small>
            @enderror
        </div>
    </div>

    <button type="submit" class="btn btn-primary mt-4">Submit</button>
</form>

<div class="row">
    @foreach($data as $item)
    <div class="col-3 mt-5">
        <img class="card">
        <img src="{{ $item->path_location }}" class="img-thumbnail">
        <div class="card-footer">
            <p class="mr-auto d-inline">{{ $item->title }}</p>
            <a class="badge badge-danger mr-0 d-inline" href="{{ route('upload.delete',['id' => $item->id]) }}">Delete</a>
        </div>
    </div>
    @endforeach
</div>
</div>
@endsection