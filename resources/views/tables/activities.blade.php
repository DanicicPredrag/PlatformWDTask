@extends('main')

@section('content')
	<div class="container">
		<table class="table">
			<tr>
				<th>activity_id</th>
				<th>title</th>
				<th>created_at</th>
				<th>updated_at</th>
			</tr>

		@foreach($activities as $activity)

			<tr>
				<td>{{$activity->activity_id}}</td>
				<td><a class="navbar-brand" href="{{route('activity', $activity->activity_id)}}">{{$activity->title}}</a></td>
				<td>{{$activity->created_at}}</td>
				<td>{{$activity->updated_at}}</td>
			</tr>

		@endforeach()
		</table>
	</div>
@endsection