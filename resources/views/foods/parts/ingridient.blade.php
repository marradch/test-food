<script type="text/html" id="ingr-addition-template">
    <div class="row">
        <div class="col-md-6">
            <div class="form-group"> 
				<select name="ingrient_id_list[]" class="form-control" required>
				<option value=""></option>
                @foreach ($ingridients as $ingridient)
					<option value="{{$ingridient->id}}">{{$ingridient->title}}</option>				
				@endforeach	
				</select>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">                
                <input name="ingridient_count[]" class="time-selection form-control" value="" required/>
            </div>
        </div>
        <div class="col-md-3">
            <div class="form-group">                                
				<a href="#" class="btn btn-info ingr-remove" role="button">Delete</a>
            </div>
        </div>
    </div>
</script>

<script type="text/javascript">
$(document).ready(function() {
    $('#add-ingridient').on('click', function() {
        var template = $('#ingr-addition-template').text();		
        $('#ingr-list').append(template);		        
    });

    $('#ingr-list').on('click', '.ingr-remove', function() {                
        $(this).parent().parent().parent().remove();
    });  
});	
</script>
