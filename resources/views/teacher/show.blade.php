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
						<th>UNDERTIME REASONS</th>
					</tr>
				</thead>
				<tbody>
					@php
						$count = 0;
					@endphp
					@for ($i = 0; $i < 30; $i++)
					<tr>
						<td>{{ $i+1 }}</td>
						<td class="text-center">
							@foreach ($records as $record)
								{{ $record->created_at->day == $i+1 && $record->created_at->hour < 12 && $record->type == 'In' ? $record->created_at->format('h:m:A') : '' }}
							@endforeach
						</td>
						<td class="text-center">
							@foreach ($records as $record)
								{{ $record->created_at->day == $i+1 && $record->created_at->hour < 12 && $record->type == 'Out' ? $record->created_at->format('h:m:A') : '' }}
							@endforeach
						</td>
						<td class="text-center">
							@foreach ($records as $record)
								{{ $record->created_at->day == $i+1 && $record->created_at->hour >= 12 && $record->type == 'In' ? $record->created_at->format('h:m:A') : '' }}
							@endforeach
						</td>
						<td class="text-center">
							@foreach ($records as $record)
								{{ $record->created_at->day == $i+1 && $record->created_at->hour >= 12 && $record->type == 'Out' ? $record->created_at->format('h:m:A') : '' }}
							@endforeach
						</td>
					</tr>
					@endfor
				</tbody>
			</table>
		</div>
	</div>
</div>
@endsection