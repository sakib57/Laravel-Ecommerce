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
					  <th>Description</th>
					  <th>Status</th>
					  <th>Actions</th>
				  </tr>
			  </thead>   
			  <tbody>
			  	@foreach($all_brand as $value)
				<tr>
					<td>{{$value->brand_id}}</td>
					<td class="center">{{$value->brand_name}}</td>
					<td class="center">{{$value->brand_detail}}</td>
					<td class="center">
						<?php if($value->publication_status==1){?>
							<span class="label label-success">Active</span>
						<?php }else{?>
							<span class="label">Inactive</span>
						<?php }?>

					</td>
					<td class="center">
						<?php if($value->publication_status==1){?>
							<a class="btn btn-danger" href="{{URL::to('/inactive-brand/'.$value->brand_id)}}" title="Inactive">
								<i class="halflings-icon white thumbs-down"></i>
							</a>
						<?php }else{?>
							<a class="btn btn-success" href="{{URL::to('/active-brand/'.$value->brand_id)}}" title="Active">
								<i class="halflings-icon white thumbs-up"></i>
							</a>
						<?php }?>
						

						<a class="btn btn-info" href="{{URL::to('/edit-brand/'.$value->brand_id)}}">
							<i class="halflings-icon white edit"></i>  
						</a>
						<a class="btn btn-danger" href="{{URL::to('/delete-brand/'.$value->brand_id)}}" id="delete">
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