@extends('admin_layout')
@section('content')

<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Brand</h2>
			
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>
		<p class="alert-success text-center">
				<?php
				$message=Session::get('msg');
				if($message){
					echo $message;
					Session::put('msg',null);
				}
				?>
			</p>
		<div class="box-content">
			<form class="form-horizontal" action="{{URL::to('/save-brand')}}" method="post">
				{{csrf_field()}}
			  <fieldset>
				<div class="control-group">
				  <label class="control-label" for="typeahead">Brand Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="brand_name">
				  </div>
				</div> 

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Brand Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="brand_description" id="textarea2" rows="3"></textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Publish Brand</label>
				  <div class="controls">
					<input type="checkbox"  name="publication_status" value="1">
				  </div>
				</div> 

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save Brand</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection