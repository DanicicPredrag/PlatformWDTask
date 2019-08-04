@extends('main')

@section('content')
	<div class="container">
		<div class="row text-center">
			<div class="col-md-12">
				<h1>{{$activity->title}}</h1>
			</div>
		</div>
		<div class="row">
		<table class="table">
			<tr>
				<th>time_spent_id</th>
				<th>description</th>
				<th>time_spent</th>
				<th>created_at</th>
				<th>updated_at</th>
			</tr>

			@foreach($activity->time_spent as $time_spent)

				<tr>
					<td>{{$time_spent->time_spent_id}}</td>
					<td>{{$time_spent->description}}</td>
					<td>{{$time_spent->time_spent}}</td>
					<td>{{$time_spent->created_at}}</td>
					<td>{{$time_spent->updated_at}}</td>
				</tr>

			@endforeach()
		</table>
		</div>
	</div>
@endsection