@extends('layouts.master')

@section('title')
	Tranding quotes
@endsection

@section('styles')
        <link rel="stylesheet" href="{{ URL::to('src/css/font-awesome.min.css') }}">
@endsection

@section('content')
	@if(!empty(Request::segment(1)))
	<section class="filter-bar">
		A filter has been set! <a href="{{route('index')}}">show all quotes</a>
	</section>

	@endif
	@if(count($errors) > 0)
		<section class="info-box fail">
				@foreach($errors->all() as $error)
				<div>{{$error}}</div>
				@endforeach
		</section>
	@endif
	@if(Session::has('success'))
		<section class="info-box success">
				<div>{{Session::get('success')}}</div>
		</section>
	@endif

	<section class="quotes">
		<h1>Latest Quotes{{($author)? ' by '.$author->name:''}}</h1>
		@for($i = 0; $i < count($quotes); $i++)


		<article class="quote{{ $i % 3 === 0 ? ' first-in-line': ($i +1) % 3 ===0 ? ' last-in-line':'' }}">
			<div class="delete"><a href="{{route('delete', ['quote_id' => $quotes[$i]->id])}}">X</a></div>
			{{$quotes[$i]->quote}}

			<div class="info">
				Created by <a href="{{route('author', ['author_id' => $quotes[$i]->author_id])}}">{{$quotes[$i]->author->name}}</a>
				on {{$quotes[$i]->created_at}}
			</div>
		</article>
		@endfor
		<div class="pagination">
			@if($quotes->currentPage()  !== 1)
				<a href="{{$quotes->previousPageUrl()}}"><span class="fa fa-caret-left"></span></a>
			@endif
			@if($quotes->currentPage()  !== $quotes->lastPage() && $quotes->hasPages())
				<a href="{{$quotes->nextPageUrl()}}"><span class="fa fa-caret-right"></span></a>
			@endif
		</div>
	</section>
	<section class="edit-quote">
		<h1>Add a Quote</h1>
		<form method="post" action="{{route('create')}}">
			<div class="input-group">
				<label for="author">Your Name</label>
				<input type="text" name="author" id="author" placeholder="Your Name">
			</div>
			<div class="input-group">
				<label for="email">Your E-mail</label>
				<input type="text" name="email" id="email" placeholder="Your E-mail">
			</div>
			<div class="input-group">
				<label for="quote">Your Quote</label>
				<textarea rows="5" name="quote" id="quote" placeholder="Your Quote"></textarea>
			</div>
			<button class="btn" type="submit">Submit Quote</button>
			<input type="hidden" name="_token" value="{{ csrf_token() }}">
		</form>
	</section>
@endsection
