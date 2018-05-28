@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">  
			<h1>Ingredients</h1>
			<div class="form-group">
			<a href="{{route('ingridient.create')}}" class="btn btn-info" role="button">Create</a>
			</div>
			<table class="table">
			  <thead>
				<tr>
				  <th scope="col">Title</th>
				  <th scope="col"></th>
				</tr>
			  </thead>
			  <tbody>
				@foreach ($ingridients as $ingridient)
					<tr>
					  <td>{{$ingridient->title}}</td>
					  <td>
					  <a href="{{route('ingridient.update', ['id'=>$ingridient->id])}}" class="btn btn-info" role="button">Update</a>
					  <a href="{{route('ingridient.delete', ['id'=>$ingridient->id])}}" class="btn btn-info" role="button">Delete</a>					  
					  </td>
					</tr>					
				@endforeach								
			  </tbody>
			</table>
        </div>
    </div>
</div>
@endsection
