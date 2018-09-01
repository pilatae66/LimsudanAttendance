@extends('layouts.app')
@section('content')
<div class="row">
	<div class="col-md-8">
		<div class="card">
			<div class="card-header card-header-icon" data-background-color="rose">
				<i class="material-icons">perm_identity</i>
			</div>
			<div class="card-content">
				<h4 class="card-title">Edit Profile -
					<small class="category">Complete your profile</small>
				</h4>
				<form action="{{ route('teachers.update', $teacher->id) }}" method="POST">
					@csrf
					<input type="hidden" name="_method" value="PATCH">
					<div class="row">
						<div class="col-md-4">
							<div class="form-group label-floating {{ $errors->has('fname') ? 'has-error' : '' }}">
								<label class="control-label">Firstname</label>
								<input type="text" name="fname" class="form-control" value="{{ $teacher->fname }}">
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
								<input type="text" name="mname" class="form-control" value="{{ $teacher->mname }}">
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
								<input type="text" name="lname" class="form-control" value="{{ $teacher->lname }}">
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
					<div class="row">
						<div class="col-md-4">
							<div class="form-group label-floating {{ $errors->has('id') ? 'has-error' : '' }}">
								<label class="control-label">ID Number</label>
								<input type="text" name="id" class="form-control" value="{{ $teacher->id }}">
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
					<button type="submit" class="btn btn-rose pull-right">Update Profile</button>
					<div class="clearfix"></div>
				</form>
			</div>
		</div>
	</div>
	<div class="col-md-4">
		<div class="card card-profile">
			<div class="card-avatar">
				<a href="#pablo">
					<img class="img" src="{{$teacher->fileName == null || !file_exists(public_path('storage/upload/'.$teacher->fileName)) ? asset('images/default-avatar.png') : asset('storage/upload/'.$teacher->fileName)}}" />
				</a>
			</div>
			<div class="card-content">
				<h6 class="category text-gray">{{ $teacher->id }}</h6>
				<h4 class="card-title">{{ $teacher->fullName }}</h4>
				<p class="description">
				</p>
			</div>
		</div>
	</div>
</div>
<div class="row"></div>
<div class="col-md-12">
	<div class="card">
		<div class="card-header card-header-icon" data-background-color="rose">
			<i class="material-icons">perm_identity</i>
		</div>
		<div class="card-content">
			<h4 class="card-title">Daily Time Record</h4>
			<div class="col-md-4 pull-right">
				<div class="form-group label-floating {{ $errors->has('id') ? 'has-error' : '' }}">
					<label class="control-label">Month of</label>
					<form action="{{ route('user.getMonthDTR', $teacher->id) }}" method="get">
						<select name="month" class="form-control date">
							<option selected hidden>Choose month...</option>
							<option value="1">January</option>
							<option value="2">February</option>
							<option value="3">March</option>
							<option value="4">April</option>
							<option value="5">May</option>
							<option value="6">June</option>
							<option value="7">July</option>
							<option value="8">August</option>
							<option value="9">September</option>
							<option value="10">October</option>
							<option value="11">November</option>
							<option value="12">December</option>
						</select>
						<button type="submit" class="btn btn-rose pull-right">Apply</button>
					</form>
					@if ($errors->has('id'))
					<span class="help-block">
						<strong>{{ $errors->first('month') }}</strong>
					</span>
					@endif
				</div>
			</div>
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>DAY</th>
						<th>A.M. Arrival</th>
						<th>DEPARTURE</th>
						<th>P.M. ARRIVAL</th>
						<th>DEPARTURE</th>
						<th>REMARKS</th>
					</tr>
				</thead>
				<tbody>
					@php
					$count = 0;
					$morning = "";
					$morning2 = 0;
					$afternoon = "";
					$afternoon2 = null;
					$total = 0;
					@endphp
					@for ($i = 0; $i < 30; $i++)
					<tr>
						<td>{{ $i+1 }}</td>
						<td class="text-center">
							@foreach ($records as $key => $record)
								@if ($record->created_at->day == $i+1)
									@if ($record->created_at->hour < 12)
										@if ($record->type == 'In')
										@if ($record->status == 'Valid')
											{{ $record->created_at->format('h:i A') }}
											@php
											$morning = $record->created_at;
												$records->forget($key);
											@endphp
										@else
											@php
												$morning = $record->status;
											@endphp
										@endif
										@endif
									@endif
								@endif
							@endforeach
							@if ($morning == null)
								<button class="btn btn-danger btn-round btn-sm" data-toggle="modal" data-target="#absentModal" data-type="In" data-id="{{ $teacher->id }}" data-date="{{ $i+1 }}" data-month="{{ $month }}" data-day="Morning">
									Absent
								</button>
							@elseif($morning == 'On Leave')
								{{ $morning }}
							@endif
						</td>
						<td class="text-center">
							@foreach ($records as $key => $record)
								@if ($morning != "")
									@if ($record->created_at->day == $i+1)
										@if ($record->created_at->hour < 12)
											@if ($record->type == 'Out')
												@if ($record->status == 'Valid')
													{{ $record->created_at->format('h:i A') }}
													@php
													$morning2 = $record->created_at->diffInMinutes($morning);
													$records->forget($key);
													@endphp
												@else
													@php
														$morning2 = $record->status;
													@endphp
												@endif
											@endif
										@endif
									@endif
								@else
									@php
									$morning2 = null;
									@endphp
								@endif
							@endforeach
							@if ($morning2 == null)
								<button class="btn btn-danger btn-round btn-sm" data-toggle="modal" data-target="#absentModal" data-type="Out" data-id="{{ $teacher->id }}" data-date="{{ $i+1 }}" data-month="{{ !empty($month) ? $month : 0 }}" data-day="Morning">
									Absent
								</button>
							@elseif($morning2 == 'On Leave')
								{{ $morning2 }}
							@endif
						</td>
						<td class="text-center">
							@foreach ($records as $key => $record)
								@if ($record->created_at->day == $i+1)
									@if ($record->created_at->hour > 12)
										@if ($record->type == 'In')
											@if ($record->status == 'Valid')
												{{ $record->created_at->format('h:i A') }}
												@php
												$afternoon = $record->created_at;
												$records->forget($key);
												@endphp
											@else
												@php
													$afternoon = $record->status;
												@endphp
											@endif
										@endif
									@endif
								@endif
							@endforeach
							@if ($afternoon == null)
								<button class="btn btn-danger btn-round btn-sm" data-toggle="modal" data-target="#absentModal" data-type="In" data-id="{{ $teacher->id }}" data-date="{{ $i+1 }}" data-month="{{ $month }}" data-day="Afternoon">
									Absent
								</button>
							@elseif($afternoon == 'On Leave')
								{{ $afternoon }}
							@endif
						</td>
						<td class="text-center">
							@foreach ($records as $key => $record)
								@if ($afternoon != "")			
									@if ($record->created_at->day == $i+1)
										@if ($record->created_at->hour > 12)
											@if ($record->type == 'Out')
												@if ($record->status == 'Valid')
													{{ $record->created_at->format('h:i A') }}
													@php
													$afternoon2 = $record->created_at->diffInMinutes($afternoon);
													$records->forget($key);
													@endphp
												@else
													@php
														$afternoon2 = $record->status;
													@endphp
											@endif
										@endif
									@endif
								@endif
								@else
									@php
									$afternoon2 = null;
									@endphp
								@endif
							@endforeach
							@if ($afternoon2 == null)
								<button class="btn btn-danger btn-round btn-sm" data-toggle="modal" data-target="#absentModal" data-type="Out" data-id="{{ $teacher->id }}" data-date="{{ $i+1 }}" data-month="{{ $month }}" data-day="Afternoon">
									Absent
								</button>
							@elseif($afternoon2 != 'Valid' && !is_numeric($afternoon2))
								{{ $afternoon2 }}
							@endif
						</td>
						<td>
							@php
							$sub_total = 0;
							if(is_numeric($morning2) && is_numeric($afternoon2)){
								$sub_total = $morning2 + $afternoon2;
								if ($sub_total != 0) {
									if (480 - $sub_total == 0) {
										echo 'No Undertime';
									}
									elseif (480 - $sub_total < 0){
										echo  abs(floor((480 - $sub_total) / 60)) . " hours " . $sub_total % 60 . " minutes Overtime" ;
									}
									else{
										echo  floor((480 - $sub_total) / 60) . " hours " . $sub_total % 60 . " minutes Undertime" ;
									}
								}
							}
							if(is_numeric($morning2) && !is_numeric($afternoon2)){
								$sub_total = $morning2;
								if ($sub_total != 0) {
									if (480 - $sub_total == 0) {
										echo 'No Undertime';
									}
									elseif (480 - $sub_total < 0){
										echo  abs(floor((480 - $sub_total) / 60)) . " hours " . $sub_total % 60 . " minutes Overtime" ;
									}
									else{
										echo  floor((480 - $sub_total) / 60) . " hours " . $sub_total % 60 . " minutes Undertime" ;
									}
								}
							}
							if(!is_numeric($morning2) && is_numeric($afternoon2)){
								$sub_total = $afternoon2;
								if ($sub_total != 0) {
									if (480 - $sub_total == 0) {
										echo 'No Undertime';
									}
									elseif (480 - $sub_total < 0){
										echo  abs(floor((480 - $sub_total) / 60)) . " hours " . $sub_total % 60 . " minutes Overtime" ;
									}
									else{
										echo  floor((480 - $sub_total) / 60) . " hours " . $sub_total % 60 . " minutes Undertime" ;
									}
								}
							}
							@endphp
						</td>
					</tr>
					@php
					$total += $sub_total;
					$morning = "";
					$morning2 = 0;
					$afternoon = "";
					$afternoon2 = 0;
					@endphp
					@endfor
					<td><b>TOTAL</b></td>
					<td></td>
					<td></td>
					<td></td>
					<td></td>
					<td>{{ floor(($total) / 60) . " hours " . $total % 60 . " minutes" }}</td>
				</tbody>
			</table>
		</div>
	</div>
</div>
<!-- Classic Modal -->
<div class="modal fade" id="absentModal" tabindex="-1" role="dialog" aria-labelledby="absentModal" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
						<i class="material-icons">clear</i>
					</button>
					<h4 class="modal-title">Register New Record for Absent</h4>
				</div>
				<div class="modal-body">
					<input type="time" class="form-control" id="time">
				</div>
				<div class="modal-footer">
					<button type="button" id="submit" class="btn btn-success btn-sm">Register</button>
					<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">Close</button>
				</div>
			</div>
		</div>
	</div>
	<!--  End Modal -->
@endsection