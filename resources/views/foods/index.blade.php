@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">  
			<h1>Foods</h1>
			<div class="form-group">
			<a href="{{route('food.create')}}" class="btn btn-info" role="button">Create</a>
			</div>
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">Title</th>
				  <th scope="col"></th>
				</tr>
			  </thead>
			  <tbody>
				@foreach ($foods as $food)
					<tr>
					  <td>{{$food->title}}</td>
					  <td>
					  <a href="{{route('food.update', ['id'=>$food->id])}}" class="btn btn-info" role="button">Update</a>
					  <a href="{{route('food.delete', ['id'=>$food->id])}}" class="btn btn-info" role="button">Delete</a>
					  <a href="{{route('food.show', ['id'=>$food->id])}}" class="btn btn-info" role="button">Show</a>
					  </td>
					</tr>					
				@endforeach								
			  </tbody>
			</table>
        </div>
    </div>
</div>
@endsection
