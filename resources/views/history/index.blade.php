@extends('layouts.app') 
@section('brand') History @endsection 
@section('content')
<div class="card">
    <div class="card-header card-header-icon" data-background-color="rose">
        <i class="material-icons">history</i>
    </div>
    <div class="card-content">
        <h4 class="card-title">History</h4>
        <div class="toolbar">
            <!--        Here you can write extra buttons/actions for the toolbar              -->
        </div>
        <div class="material-datatables">
            <table id="datatables" class="table table-striped table-no-bordered table-hover" cellspacing="0" width="100%" style="width:100%">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Teacher Name</th>
                        <th>Incident</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tfoot>
                    <tr>
                        <th>#</th>
                        <th>Teacher Name</th>
                        <th>Incident</th>
                        <th>Time</th>
                    </tr>
                </tfoot>
                <tbody>
                    @php $count = 0; @endphp
                    @forelse($histories as $history)
                    <tr>
                        @php $count++; @endphp
                        <td>{{ $count }}</td>
                        <td>{{ $history->fullName }}</td>
                        <td>{{ $history->incident }}</td>
                        <td>{{ $history->time }}</td
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
    <!-- end content-->
</div>
<!--  end card  -->
@endsection