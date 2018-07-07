@extends('layouts.app') 
@section('brand') Teacher Records @endsection 
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header" data-background-color="red">
                    <h4 class="title">Teacher's Record List</h4>
                    <p class="category">List of teacher records in Limunsudan Bayug Falls Elementary School</p>
                </div>
                <div class="card-content table-responsive">
                    <table class="table table-hover">
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
                <div class="card-footer">
                    <div class="row pull-right">
                        {{ $records->links()}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection