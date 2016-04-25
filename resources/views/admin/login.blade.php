@extends('layouts.master')

@section('title')
	Admin - Tranding quotes
@endsection

@section('styles')
        <link rel="stylesheet" href="{{ URL::to('src/css/font-awesome.min.css') }}">
@endsection

@section('content')
@if(count($errors) > 0)
  <section class="info-box fail">
      @foreach($errors->all() as $error)
      <div>{{$error}}</div>
      @endforeach
  </section>
@endif
@if(Session::has('fail'))
  <section class="info-box fail">
      <div>{{Session::get('fail')}}</div>
  </section>
@endif
<section class="edit-quote">
  <h1>Admin Login</h1>
  <form method="post" action="{{route('admin.login')}}">
    <div class="input-group">
      <label for="name">Admin Username</label>
      <input type="text" name="name" id="name">
    </div>
    <div class="input-group">
      <label for="password">Admin Password</label>
      <input type="password" name="password" id="password">
    </div>

    <button class="btn" type="submit">access</button>
    <input type="hidden" name="_token" value="{{ csrf_token() }}">
  </form>
</section>
@endsection
