@extends('main')

@section('content')
	<div class="container">
		<h1>Add New Time log</h1>
		<hr>
		<form action="{{route('time_spent_form_post')}}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="description">Activity name</label>
				<select class="form-control" name="activity_id">
					@foreach($activities as $activity)
						@if(old('activity_id') == $activity->activity_id)
							<option value="{{$activity->activity_id}}" selected>{{$activity->title}}</option>
						@else
						<option value="{{$activity->activity_id}}">{{$activity->title}}</option>
						@endif
					@endforeach()
				</select>
			</div>
			<div class="form-group">
				<label for="description">Time Spent</label>
				<input type="text" class="form-control" id="time_spent" name="time_spent" value="{{old('time_spent')}}" />
			</div>
			<div class="form-group">
				<label for="description">Description</label>
				<textarea type="text" class="form-control" id="description" name="description">{{old('description')}}</textarea>
			</div>
			@if ($errors->any())
				<div class="alert alert-danger">
					<ul>
						@foreach ($errors->all() as $error)
							<li>{{ $error }}</li>
						@endforeach
					</ul>
				</div>
			@endif
			<button type="submit" class="btn btn-primary">Submit</button>
		</form>
	</div>
@endsection
