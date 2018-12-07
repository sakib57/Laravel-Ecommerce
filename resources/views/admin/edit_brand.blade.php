@extends('admin_layout')
@section('content')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Edit Brand</h2>
			
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		
		<div class="box-content">
			<form class="form-horizontal" action="{{URL::to('/update-brand')}}" method="post">
				{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">brand Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="brand_name" value="{{$brand_detail->brand_name}}">
					<input type="hidden" name="brand_id" value="{{$brand_detail->brand_id}}">
				  </div>
				</div> 

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">brand Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="brand_description" id="textarea2" rows="3">
						{{$brand_detail->brand_detail}}
					</textarea>
				  </div>
				</div>

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Update</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection