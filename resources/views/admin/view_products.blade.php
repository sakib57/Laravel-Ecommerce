@extends('admin_layout')
@section('content')

<div class="row-fluid sortable">		
	<div class="box span12">
		<div class="box-header" data-original-title>
			<h2><i class="halflings-icon user"></i><span class="break"></span>Members</h2>
			<div class="box-icon">
				<a href="#" class="btn-setting"><i class="halflings-icon wrench"></i></a>
				<a href="#" class="btn-minimize"><i class="halflings-icon chevron-up"></i></a>
				<a href="#" class="btn-close"><i class="halflings-icon remove"></i></a>
			</div>
		</div>

		<div class="box-content">
			<p class="alert-info text-center">
				<?php
				$message=Session::get('msg');
				if($message){
					echo $message;
					Session::put('msg',null);
				}
				?>
			</p>
			<table class="table table-striped table-bordered bootstrap-datatable datatable">
			  <thead>
				  <tr>
					  <th>ID</th>
					  <th>Name</th>
					  <th>Photo</th>
					  <th>Price</th>
					  <th>Description</th>
					  <th>Category</th>
					  <th>Brand</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($all_products as $value)
				<tr>
					<td>{{$value->id}}</td>
					<td class="center">{{$value->product_name}}</td>
					<td class="center"><img style="width:50px;height:auto" src="images/{{$value->image}}"></td>
					<td class="center">{{$value->product_price}}</td>
					<td class="center">{{$value->short_desc}}</td>
					<td class="center">{{$value->category_name}}</td>
					<td class="center">{{$value->brand_name}}</td>
					<td class="center">
						<?php if($value->publication_status==1){?>
							<span class="label label-success">Active</span>
						<?php }else{?>
							<span class="label">Inactive</span>
						<?php }?>

					</td>
					<td class="center">
						<?php if($value->publication_status==1){?>
							<a class="btn btn-danger" href="{{URL::to('/inactive-product/'.$value->
								id)}}" title="Inactive">
								<i class="halflings-icon white thumbs-down"></i>
							</a>
						<?php }else{?>
							<a class="btn btn-success" href="{{URL::to('/active-product/'.$value->id)}}" title="Active">
								<i class="halflings-icon white thumbs-up"></i>
							</a>
						<?php }?>
						

						<a class="btn btn-info" href="{{URL::to('/edit-product/'.$value->id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete-product/'.$value->id)}}" id="delete">
							<i class="halflings-icon white trash"></i> 
						</a>
					</td>
				</tr>
				@endforeach
			  </tbody>
		  </table>            
		</div>
	</div><!--/span-->
</div><!--/row-->

@endsection