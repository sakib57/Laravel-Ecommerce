@extends('admin_layout')
@section('content')
<div class="row-fluid sortable">
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon edit"></i><span class="break"></span>Add Product</h2>
			
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
			<form class="form-horizontal" action="{{URL::to('/save-product')}}" method="post" enctype="multipart/form-data">
				{{csrf_field()}}
			  <fieldset>
			  	<div class="control-group">
				  <label class="control-label" for="typeahead">Product Name </label>
				  <div class="controls">
					<input type="text" class="span6 typeahead" name="product_name">
				  </div>
				</div> 
				<div class="control-group">
				  <label class="control-label" for="selectError3">Select Category</label>
					<div class="controls">
					  <select id="selectError3" name="category">
					  	<option value="">-- Select --</option>
					  	@foreach($category as $value)
						<option value="{{$value->category_id}}">{{$value->category_name}}</option>
						@endforeach
					  </select>
					</div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="selectError3">Select Brand</label>
					<div class="controls">
					  <select id="selectError3" name="brand">
					  	<option value="">-- Select --</option>
					  	@foreach($brand as $value)
						<option value="{{$value->brand_id}}">{{$value->brand_name}}</option>
						@endforeach
					  </select>
					</div>
				</div> 

				<div class="control-group">
				  <label class="control-label" for="selectError3">Product Price</label>
					<div class="controls">
					  <input type="number" class="span6 typeahead" name="product_price">
					</div>
				</div> 

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Short Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="short_desc" id="textarea2" rows="3"></textarea>
				  </div>
				</div>

				<div class="control-group hidden-phone">
				  <label class="control-label" for="textarea2">Product Long Description</label>
				  <div class="controls">
					<textarea type="text" class="cleditor" name="long_desc" id="textarea2" rows="3"></textarea>
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="fileInput">File input</label>
				  <div class="controls">
					<input class="input-file uniform_on" id="fileInput" type="file" name="image">
				  </div>
				</div>

				<div class="control-group">
				  <label class="control-label" for="typeahead">Publish Product</label>
				  <div class="controls">
					<input type="checkbox"  name="publication_status" value="1">
				  </div>
				</div> 

				<div class="form-actions">
				  <button type="submit" class="btn btn-primary">Save Product</button>
				  <button type="reset" class="btn">Cancel</button>
				</div>
			  </fieldset>
			</form>   

		</div>
	</div><!--/span-->

</div><!--/row-->
@endsection