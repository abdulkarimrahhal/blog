@extends('template.app')
@section('section1')
    <form enctype="multipart/form-data" method="POST" action="/categories/store">
        @csrf
        <div class="mb-3">
            <label for="exampleFormControlInput1" class="form-label">Category Name</label>
            <input name="name" class="form-control" id="exampleFormControlInput1" placeholder="">
        </div>
        <br>
        <input class="btn btn-primary" type="submit" value="Create">
    </form>
@endsection
