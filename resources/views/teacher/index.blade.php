@extends('layouts.app') 
@section('brand') Teacher @endsection 
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-icon" data-background-color="rose">
				<i class="material-icons">school</i>
			</div>
			<div class="card-content">
				<h4 class="card-title">Teacher List</h4>
				<div class="toolbar pull-right">
					<button class="btn btn-rose btn-simple btn-xs" data-toggle="modal" data-target="#myModal">
						<i class="material-icons">create</i>
					</button>
					
				</div>
				<br>
				<div class="material-datatables">
					<table id="datatables" class="table table-striped table-no-bordered table-hover datatables" cellspacing="0" width="100%" style="width:100%">
						<thead>
							<tr>
								<th>#</th>
								<th>ID Number</th>
								<th>Teacher Name</th>
								<th>UserType</th>
								<th>Time</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</thead>
						<tfoot>
							<tr>
								<th>#</th>
								<th>ID Number</th>
								<th>Teacher Name</th>
								<th>UserType</th>
								<th>Time</th>
								<th class="disabled-sorting text-right">Actions</th>
							</tr>
						</tfoot>
						<tbody>
							@php $count = 0; @endphp
							@forelse($teachers as $teacher)
							<tr data-route="{{ route('teachers.show', $teacher->id) }}">
								@php $count++; @endphp
								<td>{{ $count }}</td>
								<td>{{ $teacher->id }}</td>
								<td>{{ $teacher->fullName }}</td>
								<td>{{ $teacher->usertype }}</td>
								<td>{{ $teacher->time }}</td>
								<td class="text-right">
									<form style="display:inline-block;" action="{{ route('teachers.destroy', $teacher->id) }}" method="POST">
										@csrf
										<input type="hidden" name="_method" value="DELETE">
										<button type="submit" class="btn btn-simple btn-danger btn-icon remove"><i class="material-icons">close</i></button>
									</form>
								</td>
							</tr>
							@empty
							<tr>
								<td colspan="5">No data available</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
			<!-- end content-->
		</div>
		<!--  end card  -->
	</div>
	<!-- end col-md-12 -->
</div>
<!-- end row -->
<!-- Classic Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title text-center">Create Teacher</h4>
			</div>
			<div class="modal-body">
				<form method="POST" action="{{ route('teachers.store') }}" enctype="multipart/form-data">
					@csrf
					<div class="row">
						<div class="col-sm-3">
							<div class="picture-container">
								<div class="picture" data-color="rose">
									<img src="{{asset('images/default-avatar.png')}}" class="picture-src" id="wizardPicturePreview" title="" />
									<input type="file" name="photo" id="wizard-picture">
								</div>
								<h6>Choose Picture</h6>
							</div>
						</div>
						<br><br>
						<div class="col-md-4">
							<div class="form-group label-floating {{ $errors->has('id') ? 'has-error' : '' }}">
								<label class="control-label">ID Number</label>
								<input type="text" name="id" class="form-control">
								@if ($errors->has('id'))
								<span class="help-block">
									<strong>{{ $errors->first('id') }}</strong>
								</span>
								@endif
							</div>
							{{--  End of form  --}}
						</div>
						{{--  End of col  --}}
					</div>
					{{--  End of row  --}}
					<div class="row">
						<div class="col-md-4">
							<div class="form-group label-floating {{ $errors->has('fname') ? 'has-error' : '' }}">
								<label class="control-label">Firstname</label>
								<input type="text" name="fname" class="form-control">
								@if ($errors->has('fname'))
								<span class="help-block">
									<strong>{{ $errors->first('fname') }}</strong>
								</span>
								@endif
							</div>
							{{--  End of form  --}}
						</div>
						{{--  End of col  --}}
						
						<div class="col-md-4">
							<div class="form-group label-floating {{ $errors->has('mname') ? 'has-error' : '' }}">
								<label class="control-label">Middlename</label>
								<input type="text" name="mname" class="form-control">
								@if ($errors->has('mname'))
								<span class="help-block">
									<strong>{{ $errors->first('mname') }}</strong>
								</span>
								@endif
							</div>
							{{--  End of form  --}}
						</div>
						{{--  End of col  --}}
						
						<div class="col-md-4">
							<div class="form-group label-floating {{ $errors->has('lname') ? 'has-error' : '' }}">
								<label class="control-label">Lastname</label>
								<input type="text" name="lname" class="form-control">
								@if ($errors->has('lname'))
								<span class="help-block">
									<strong>{{ $errors->first('lname') }}</strong>
								</span>
								@endif
							</div>
							{{--  End of form  --}}
						</div>
						{{--  End of col  --}}
					</div>
					{{--  End of row  --}}
				</div>
				<div class="modal-footer">
					<button type="submit" class="btn btn-success btn-simple">Create</button>
					<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
				</form>
				{{--  End of form  --}}
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
@endsection