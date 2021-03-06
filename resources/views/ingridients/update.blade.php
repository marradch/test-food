@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1>Ingredient Update</h1>
	</div>
    <div class="row">		
		<form method="POST" action={{route('ingridient.update', ['id'=>$ingridient->id])}}> 
		{{ csrf_field() }}
		<div class="form-group">
			<label for="exampleInputEmail1">Title</label>
			<input type="text" class="form-control" name="title" value="{{$ingridient->title}}">			
		</div>	
		@if($errors->has('title'))
			<div class="alert alert-danger">
				{{ $errors->first('title') }}
			</div>
		@endif
		<button type="submit" class="btn btn-primary btn-flat">Save</button>	
		</form>
    </div>
</div>
@endsection
