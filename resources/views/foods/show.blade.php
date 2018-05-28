@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h1>{{$food->title}}</h1>
	</div>
    <div class="row">			
	<p>{{$food->description}}</p>
	</div>
		@foreach ($foodIngridients as $foodingridient)
		<div class="row">
		<div class="col-md-6">
			<p>{{$foodingridient->ingridient()->first()->title}}</p>
		</div>
		<div class="col-md-6">
			<div class="form-group">                
				<input food-ingridient-id="{{$foodingridient->id}}" class="time-selection form-control ingridient-count" value="{{$foodingridient->ingridient_count}}"/>
			</div>
		</div>
		</div>
		@endforeach	
    </div>
</div>

<script type="text/javascript">
$(document).ready(function() {
    $('.ingridient-count').on('change', function() {
		
		var ingridient_count = $(this).val();
		var food_ingridient_id = $(this).attr('food-ingridient-id');
        $.ajax({
            url: '/food/update-count',
            type: 'post',
            data: {                
				'ingridient_count': ingridient_count,
				'food_ingridient_id': food_ingridient_id,
            },
            async: false,            
            success: function(data){               
                          
            }
        });
    });
});	
</script>

@endsection