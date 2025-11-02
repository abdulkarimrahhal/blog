@extends('template.app')
@section('section1')
    <div class="row">
        <div class="col-md-6">
            <h2>Login</h2><br>
            <form enctype="multipart/form-data" method="POST" action="/login">
                @csrf
                <input name="email" class="form-control" type="email" placeholder="email"><br>
                <input name="password" class="form-control" type="password" placeholder="password"><br>
                <input class="btn btn-primary" type="submit" value="Login">
            </form>
        </div>
    </div>
@endsection