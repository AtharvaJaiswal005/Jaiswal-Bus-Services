@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>RESERVATIONS</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-boardered" id="example">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Contact Number</th>
                        <th scope="col">Bus Name/ Route</th>
                        <th scope="col">Requested Seats</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res_details as $res)
                    @php
                    $client_details = App\Models\Client::find($res->clnt_id);
                    $from_city = App\Models\City::find($res->city_first);
                    $to_city = App\Models\City::find($res->city_second);
                    $bus_details = App\Models\Bus::find($res->bus_id);
                    $bus_route_details = App\Models\BusRoute::where('route_id', $res->route_id)->first();
                    @endphp
                    <tr>
                        <th scope="row">{{ $res->reservations_id }}</th>
                        <td>{{ $client_details->clnt_name }}</td>
                        <td>{{ $client_details->clnt_contact_no_def }}</td>
                        <td>{{ $bus_details->bus_name }} ---> {{ $bus_route_details->start_time }} - {{ $bus_route_details->end_time }}</td>
                        <td>{{ $res->seats_count }}--->@foreach ($res->seats as $seat)
                            {{ $seat }} {{ ', ' }}
                            @endforeach
                        </td>
                        <td>{{ $from_city->city_name }} to {{ $to_city->city_name }}</td>
                        <td>{{ $res->reservation_date }}</td>
                        <td>{{ $res->price_total }}</td>
                        <td>
                            <button class="btn btn-success btn-sm btn-approve" data-id="{{ $res->reservations_id }}" type="button">Approve</button>
                            <button class="btn btn-danger btn-sm btn-reject" data-id="{{ $res->reservations_id }}" type="button">Reject</button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
<!-- Modal Approve -->
<div class="modal fade" id="approve" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure that are you going to approve this reservation?
            </div>
            <div class="modal-footer">
                <form action="{{ route('approve_res') }}" method="POST">
                    @csrf
                    <input type="hidden" name="res_id" class="res_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Modal Reject -->
<div class="modal fade" id="reject" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure that are you going to reject this reservation?
            </div>
            <div class="modal-footer">
                <form action="{{ route('reject_res') }}" method="POST">
                    @csrf
                    <input type="hidden" name="res_id" class="res_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    $('document').ready(function() {
        $('.btn-approve').click(function() {
            res_id = $(this).attr('data-id');
            $('.res_id').val(res_id);
            $('#approve').modal('show');
        });

        $('.btn-reject').click(function() {
            res_id = $(this).attr('data-id');
            $('.res_id').val(res_id);
            $('#reject').modal('show');
        });
    });
</script>
@endsection