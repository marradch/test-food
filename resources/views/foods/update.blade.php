@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1>Ingredient Update</h1>
	</div>
    <div class="row">		
		<form method="POST" action={{route('food.update', ['id'=>$food->id])}}> 
		{{ csrf_field() }}
		<div class="form-group">
			<label for="exampleInputEmail1">Title</label>
			<input type="text" class="form-control" name="title" value="{{$food->title}}">			
		</div>	
		@if($errors->has('title'))
			<div class="alert alert-danger">
				{{ $errors->first('title') }}
			</div>
		@endif
		<div class="form-group">
			<label>Description</label>
			<textarea class="form-control" name="description">{{$food->description}}</textarea>		
		</div>
		<hr>
		<div class="form-group"> 
		<button type="button" class="btn btn-primary btn-flat" id="add-ingridient">Add ingredient</button>
		</div>
		<div class="form-group" id="ingr-list">
			@foreach ($foodIngridients as $foodingridient)
			<div class="row">
			<div class="col-md-6">
				<div class="form-group"> 
					<select name="ingrient_id_list[]" class="form-control">
					<option value=""></option>
					@foreach ($ingridients as $ingridient)
						<option value="{{$ingridient->id}}" {{($foodingridient->ingridient_id==$ingridient->id)?'selected="selected"':''}}>{{$ingridient->title}}</option>				
					@endforeach	
					</select>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">                
					<input name="ingridient_count[]" class="time-selection form-control" value="{{$foodingridient->ingridient_count}}"/>
				</div>
			</div>
			<div class="col-md-3">
				<div class="form-group">                                
					<a href="#" class="btn btn-info ingr-remove" role="button">Delete</a>
				</div>
			</div>
			</div>
			@endforeach	
		</div>
		<hr>
		<button type="submit" class="btn btn-primary btn-flat">Save</button>	
		</form>
    </div>
</div>

@include('foods.parts.ingridient')

@endsection
