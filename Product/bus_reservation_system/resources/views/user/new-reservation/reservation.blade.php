@extends('layouts.user-main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>Bus Reservation</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('reserve_bus') }}" method="POST" id="reservation_form">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label for="">Bus</label>
                    <select name="bus_id" id="bus_id" class="form-control" readonly>
                        <option value="">Select Bus</option>
                        @foreach ($bus_details as $bus)
                            <option value="{{ $bus->bus_id }}" @isset($data) @if ($data->bus_id == $bus->bus_id) {{ 'selected' }} @else {{ 'disabled' }} @endif @endisset>{{ $bus->bus_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-4">
                    <label for="">Date</label>
                    <input type="date" name="res_date" id="" @isset($data)  value="{{ $data->res_date }}" @endisset class="form-control" readonly >
                </div>
                <div class="form-group col-md-4">
                    @php
                        if(isset($data)){
                            $route_info = App\Models\BusRoute::find($data->route_id);
                        }
                    @endphp
                    <label for="">Starting Time</label>
                    <input type="time" name="" id="" @isset($data)  value="{{ $route_info->start_time }}" @endisset class="form-control" readonly>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <label for="">From</label>
                    <select name="from" id="from" class="form-control" readonly>
                        <option value="" >From City</option>
                        @foreach ($city_details as $city)
                            <option value="{{ $city->city_id }}" @isset($data) @if ($data->from_id == $city->city_id) {{ 'selected' }} @else {{ 'disabled' }}@endif @endisset>{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">To</label>
                    <select name="to" id="to" class="form-control" readonly>
                        <option value="" >Destination City</option>
                        @foreach ($city_details as $city)
                            <option value="{{ $city->city_id }}" @isset($data) @if ($data->to_id == $city->city_id) {{ 'selected' }} @else {{ 'disabled' }}@endif @endisset>{{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-3">
                    <label for="">Pice per person</label>
                    <input type="text" name="route_price" id="" @isset($data)  value="{{ $data->route_price }}" {{ 'readonly' }}@endisset class="form-control">
                </div>
                <div class="form-group col-md-3">
                    <label for="">Number of Seats</label>
                    <input type="text" name="no_of_seats" id="" class="form-control">
                </div>
            </div>
            
            <did class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Reserve Sheets you needed (Green - Available, Yellow - Unavailable, Blue - Your Reservation)</label>
                </div>
            </did>
            <div class="form-row">
                <div class="form-group col-md-1">
                </div>
                @php
                    $my_client_id = App\Models\Client::where('user_id', Auth::user()->id)->first()->clnt_id;
                @endphp
                @for ($i = 1; $i <= 20; $i=$i+2)
                    @php $k=0;@endphp
                    @if(count($reservation_info) > 0)
                        @foreach ($reservation_info as $res)
                            @foreach ($res->seats as $r)
                                @if($r == $i)
                                    @if($res->clnt_id == $my_client_id)
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-primary btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @else
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-warning btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @endif
                                @else
                                    @foreach ($reservation_info as $res)
                                        @foreach ($res->seats as $r)
                                            @if($r == $i)
                                                @php $k =1; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif                            
                            @endforeach
                            @if($k == 0)
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                                </div>
                                @break
                            @endif
                        @endforeach
                    @else
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                        </div>
                    @endif
                @endfor
                <div class="form-group col-md-1">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                </div>
                @for ($i = 2; $i <= 20; $i=$i+2)
                    @php $k=0;@endphp
                    @if(count($reservation_info) > 0)
                        @foreach ($reservation_info as $res)
                            @foreach ($res->seats as $r)
                                @if($r == $i)
                                    @if($res->clnt_id == $my_client_id)
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-primary btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @else
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-warning btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @endif
                                @else
                                    @foreach ($reservation_info as $res)
                                        @foreach ($res->seats as $r)
                                            @if($r == $i)
                                                @php $k =1; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif                            
                            @endforeach
                            @if($k == 0)
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                                </div>
                                @break
                            @endif
                        @endforeach
                    @else
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                        </div>
                    @endif
                @endfor
                <div class="form-group col-md-1">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                    @if(count($reservation_info) > 0)
                        @php $k=0;@endphp
                        @foreach ($reservation_info as $res)
                            @foreach ($res->seats as $r)
                                @if($r == 41)
                                    @if($res->clnt_id == $my_client_id)
                                        <button type="button" class="btn btn-primary btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        @continue
                                    @else
                                        <button type="button" class="btn btn-warning btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        @continue
                                    @endif
                                @else
                                    @foreach ($reservation_info as $res)
                                        @foreach ($res->seats as $r)
                                            @if($r == 41)
                                                @php $k =1; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif                            
                            @endforeach
                            @if($k == 0)
                                    <button type="button" class="btn btn-success btn-block checkitem" value="41">A41</button>
                                @break
                            @endif
                        @endforeach
                    @else
                        <button type="button" class="btn btn-success btn-block checkitem" value="41">A41</button>
                    @endif
                </div>
                <div class="form-group col-md-1">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                </div>
                <div class="form-group col-md-1">
                    @if(count($reservation_info) > 0)
                        @php $k=0;@endphp
                        @foreach ($reservation_info as $res)
                            @foreach ($res->seats as $r)
                                @if($r == 42)
                                    @if($res->clnt_id == $my_client_id)
                                        <button type="button" class="btn btn-primary btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        @continue
                                    @else
                                        <button type="button" class="btn btn-warning btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        @continue
                                    @endif
                                @else
                                    @foreach ($reservation_info as $res)
                                        @foreach ($res->seats as $r)
                                            @if($r == 42)
                                                @php $k =1; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif                            
                            @endforeach
                            @if($k == 0)
                                    <button type="button" class="btn btn-success btn-block checkitem" value="42">A42</button>
                                @break
                            @endif
                        @endforeach
                    @else
                        <button type="button" class="btn btn-success btn-block checkitem" value="41">A41</button>
                    @endif
                </div>
                <div class="form-group col-md-1">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                </div>
                @for ($i = 21; $i <= 39; $i=$i+2)
                    @if(count($reservation_info) > 0)
                        @php $k=0;@endphp
                        @foreach ($reservation_info as $res)
                            @foreach ($res->seats as $r)
                                @if($r == $i)
                                    @if($res->clnt_id == $my_client_id)
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-primary btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @else
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-warning btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @endif
                                @else
                                    @foreach ($reservation_info as $res)
                                        @foreach ($res->seats as $r)
                                            @if($r == $i)
                                                @php $k =1; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif                            
                            @endforeach
                            @if($k == 0)
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                                </div>
                                @break
                            @endif
                        @endforeach
                    @else
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                        </div>
                    @endif
                @endfor
                
                <div class="form-group col-md-1">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-1">
                </div>
                @for ($i = 22; $i <= 40; $i=$i+2)
                    @if(count($reservation_info) > 0)
                        @php $k=0;@endphp
                        @foreach ($reservation_info as $res)
                            @foreach ($res->seats as $r)
                                @if($r == $i)
                                    @if($res->clnt_id == $my_client_id)
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-primary btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                    @continue
                                    @else
                                        <div class="form-group col-md-1">
                                            <button type="button" class="btn btn-warning btn-block checkitem" value="{{ $i }}" disabled>A{{ $i }}</button>
                                        </div>
                                        @continue
                                    @endif
                                @else
                                    @foreach ($reservation_info as $res)
                                        @foreach ($res->seats as $r)
                                            @if($r == $i)
                                                @php $k =1; @endphp
                                                @break
                                            @endif
                                        @endforeach
                                    @endforeach
                                @endif                            
                            @endforeach
                            @if($k == 0)
                                <div class="form-group col-md-1">
                                    <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                                </div>
                                @break
                            @endif
                        @endforeach 
                    @else
                        <div class="form-group col-md-1">
                            <button type="button" class="btn btn-success btn-block checkitem" value="{{ $i }}">A{{ $i }}</button>
                        </div>
                    @endif
                @endfor
                <div class="form-group col-md-1">
                </div>

            </div>
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Special Notes</label>
                    <textarea name="notice" id="" cols="30" class="form-control" rows="10"></textarea>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <input type="hidden" name="route_id" value="{{ $data->route_id }}">
                    <input type="hidden" name="seats" id="seats" value="">
                    <button type="button" class="btn btn-primary btn-block" id="reserve_seat">Reserve Now</button>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    $('document').ready(function(){

        var val_array=[]; 
        $(".checkitem").on('click', function(){
            if($(this).on('click')){
                if($(this).hasClass('btn-checked')){

                    $(this).removeClass('btn-checked');
                    $(this).removeClass('btn-danger');
                    $(this).addClass('btn-success');
                    let thisid_val = $(this).val();

                    val_array = jQuery.grep(val_array, function(value) {
                        return value != thisid_val;
                    });

                }else{
                    let thisid_val = $(this).val();
                    val_array.push(thisid_val);
                    $(this).removeClass('btn-success');
                    $(this).addClass('btn-danger');
                    $(this).addClass('btn-checked');
                }
            }
            // console.log(val_array);
        });

        $('#reserve_seat').click(function(){
            $('#seats').val(val_array);
            $('#reservation_form').submit();
        });
    });

</script>
@endsection