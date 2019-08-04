@extends('main')

@section('content')
	<div class="container">
		<h1>Add New Activity</h1>
		<hr>
		<form action="{{route('activity_form_post')}}" method="post">
			{{ csrf_field() }}
			<div class="form-group">
				<label for="title">Title</label>
				<input type="text" class="form-control" id="title" name="title" value="{{old('title')}}" />
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
