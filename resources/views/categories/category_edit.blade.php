@extends('template.app')
@section('section1')
    <form enctype="multipart/form-data" method="POST" action="{{ route('categories.update',$category->id) }}">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">name</label>
            <input name="name" class="form-control" id="exampleFormControlInput1" placeholder="{{$category->name}}">
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="OK">
    </form>
@endsection