@extends('layouts.master')

@section('title')
	Admin - Tranding quotes
@endsection

@section('content')
<ul>
@foreach($authors as $author)
<li>{{$author->name}} ({{$author->email}})</li>
@endforeach
</ul>
@endsection
