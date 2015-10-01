@extends('layout/master')
@section('title', 'Page not found')
@section('description', 'This is the news page of VertexDezign')
@section('content')
	<div class='container'>
		<div class="two">
			<div class="error-image">
				<img src="{{URL('/images/404.png')}}">
			</div>
		</div>
		<div class="two">
			<div class="error-message">
					<h2>Oeps we couldn't find the page</h2>
					<p>The page you are looking for has been removed, or never existed. We're sorry for any inconvenience.</p>

			</div>
		</div>
		<div style="clear:both;"></div>
	</div>
@endsection