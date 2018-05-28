@extends('layouts.app')

@section('content')
<div class="container">	
	<div class="row">
		<h1>Food Create</h1>
	</div>
    <div class="row">
		<form method="POST" action={{route('food.store')}}> 
		{{ csrf_field() }}
		<div class="form-group">
			<label>Title</label>
			<input type="text" class="form-control" name="title" value="{{old('title')}}">			
		</div>	
		@if($errors->has('title'))
			<div class="alert alert-danger">
				{{ $errors->first('title') }}
			</div>
		@endif
		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description">{{old('description')}}</textarea>		
		</div>
		<hr>
		<div class="form-group"> 
		<button type="button" class="btn btn-primary btn-flat" id="add-ingridient">Add ingredient</button>
		</div>
		<div class="form-group" id="ingr-list">
			
		</div>
		<hr>
		<button type="submit" class="btn btn-primary btn-flat">Save</button>	
		</form>
    </div>
</div>

@include('foods.parts.ingridient')

@endsection
