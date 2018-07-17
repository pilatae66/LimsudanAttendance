@extends('layouts.app') 
@section('brand') Teacher Records @endsection 
@section('content')
<div class="container-fluid">
	<div class="row">
		<div class="col-md-12">
			<div class="card">
				<div class="card-header card-header-icon" data-background-color="rose">
						<i class="material-icons">school</i>
					</div>
					<h4 class="title">Teacher's Record List</h4>
				<div class="card-content">
					<table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
						<thead class="text-danger">
							<th>Teacher Name</th>
							<th>Attendance Type</th>
							<th>Time</th>
						</thead>
						<tbody>
							@forelse($records as $record)
							<tr>
								<td>{{ $record->fullName }}</td>
								<td>{{ $record->attType }}</td>
								<td>{{ $record->time }}</td>
							</tr>
							@empty
							<tr>
								<td colspan="3">No data available</td>
							</tr>
							@endforelse
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>
@endsection