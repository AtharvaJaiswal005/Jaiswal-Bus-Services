@extends('layouts.user-main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>My Reservations</h2>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-boardered" id="example">
                <thead>
                    <tr>
                        <th scope="col">Reservatoin Id</th>
                        <th scope="col">Bus Name/ Route</th>
                        <th scope="col">Requested Sheets</th>
                        <th scope="col">Destination</th>
                        <th scope="col">Date</th>
                        <th scope="col">Total Price</th>
                        <th scope="col">Status</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($res_date as $res)
                    @php
                    $bus_name = App\Models\Bus::find($res->bus_id)->bus_name;
                    $destination = App\Models\City::find($res->city_second)->city_name;
                    @endphp
                    <tr>
                        <th scope="row">{{ $res->reservations_id }}</th>
                        <td>{{ $bus_name }}</td>
                        <td>@foreach ($res->seats as $seat)
                            {{ $seat }},
                            @endforeach
                        </td>
                        <td>{{ $destination }}</td>
                        <td>{{ $res->reservation_date }}</td>
                        <td>{{ $res->price_total }}</td>
                        <td>@php
                            $st = $res->status;
                            if($st == 2){
                            $status = 'Approved';
                            $color = 'success';
                            }elseif($st == 3){
                            $status = 'Pending';
                            $color = 'warning';

                            }elseif($st == 4) {
                            $status = 'Rejected';
                            $color = 'danger';
                            }

                            echo "<span class='badge badge-$color'>$status</span>";
                            @endphp
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection