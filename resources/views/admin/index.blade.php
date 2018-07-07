@extends('layouts.app') 
@section('brand') Teacher @endsection 
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon" data-background-color="rose">
                <i class="material-icons">perm_identity</i>
            </div>
            <div class="card-content">
                <h4 class="card-title">Admin List</h4>
                <div class="toolbar pull-right">
                </div>
                <br>
                <div class="material-datatables">
                    <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>ID Number</th>
                                <th>Teacher Name</th>
                                <th>UserType</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>#</th>
                                <th>ID Number</th>
                                <th>Teacher Name</th>
                                <th>UserType</th>
                                <th>Time</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @php $count = 0; @endphp
                            @forelse($admins as $admin)
                            <tr>
                                @php $count++; @endphp
                                <td>{{ $count }}</td>
                                <td>{{ $admin->id }}</td>
                                <td>{{ $admin->fulName }}</td>
                                <td>{{ $admin->usertype }}</td>
                                <td>{{ $admin->time }}</td>
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
@endsection