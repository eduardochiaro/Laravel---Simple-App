@extends('layouts.master')

@section('title')
	Tranding quotes
@endsection

@section('styles')
        <link rel="stylesheet" href="{{ URL::to('src/css/font-awesome.min.css') }}">
@endsection

@section('content')
  <h1>thank you {{$author_name}} callback</h1>
@endsection
