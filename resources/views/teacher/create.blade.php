@extends('layouts.app')
@section('brand') Create Teacher @endsection 
@section('content')
<div class="row">
	<div class="col-md-12">
		<div class="card">
			<div class="card-header card-header-icon" data-background-color="rose">
				<i class="material-icons">mail_outline</i>
			</div>
			<div class="card-content">
				<h4 class="card-title">Create Teacher</h4>
				<form method="POST" action="{{ route('teachers.store') }}">
					@csrf
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
					<div class="row">
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
					
					<button type="submit" class="btn btn-fill btn-rose">Submit</button>
				</form>
			</div>
		</div>
	</div>
</div>

@endsection