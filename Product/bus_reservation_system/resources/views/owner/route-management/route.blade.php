@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>ROUTE & PRICING</h2>
    </div>
    <div class="card-body">
            <div class="form-row">
                <div class="form-gorup col-md-12">
                    <label for="">Bus Time</label>
                    @if(isset($route)) 
                        @php
                            $bus_name = App\Models\Bus::find($route->bus_id)->bus_name;
                        @endphp
                        <select name="route_id"  class="form-control route_id" readonly>
                            <option value="{{ $route->route_id }}">{{ $bus_name }} - {{ $route->start_time }} - {{ $route->end_time }}</option>
                        </select>
                    @else
                        <select name="route_id"  class="form-control route_id" data-toggle="select">
                            <option selected disabled>Select Bus Route</option>
                            @foreach ($route_details as $route)
                                @php
                                    $bus_name = App\Models\Bus::find($route->bus_id)->bus_name;
                                @endphp
                                <option value="{{ $route->route_id }}">{{ $bus_name }} - {{ $route->start_time }} - {{ $route->end_time }}</option>
                            @endforeach
                        </select>
                    @endif
                </div>
            </div><br>
            <div class="form-row">
                <div class="form-gorup col-md-6">
                    <label for="">City</label>
                    <select name="city_id" id="city_id" class="form-control" data-toggle="select" required>
                        <option selected disabled >Select City</option>
                        @foreach ($city_details as $city)
                            <option value="{{ $city->city_id }}"> {{ $city->city_name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group col-md-6">
                    <label for="">Price</label>
                    <input type="number" name="price" id="price" value="" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <button type="button" class="btn btn-primary btn-block btn-submit">Add to Route</button>
                </div>
            </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>ROUTE & PRICING LIST</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Route Name</th>
                    <th scope="col">Price</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                   
                </tr>
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure that are you going to delete this record?
            </div>
            <div class="modal-footer">
                <input type="hidden" name="route_price_city_id" id="route_price_city_id" value="">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                <button type="button" class="btn btn-primary btn-confrm-delete">Yes</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="">
                <div class="modal-body">
                    <div class="form-row">
                        <div class="form-gorup col-md-12">
                            <label for="">City</label>
                            <select name="" id="" class="form-control" data-toggle="select">
                                <option value="">Select City</option>
                                <option value="">Ambalantota</option>
                                <option value="">Katharagama</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Price</label>
                            <input type="number" name="" id="" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset Data</button>
                    <button type="button" class="btn btn-primary">Edit Route</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('document').ready(function(){
        $('.route_id').change(function(){
            let route_id = $(this).val();
            
            $.ajax({
                url: "{{route('get_all_route_data')}}",
                data: {
                    route_id: route_id,
                    _token: "{{ csrf_token() }}",
                },
                type: 'post',
                beforeSend: function() {
                    $('#example tbody').html(' ');   
                },
                success: function(details) {
                    $("#example tbody").html(details);
                },
                
                    
            });
        });

        $('.btn-submit').click(function(){
            let t = $(this);
            let route_id = $('.route_id').val();
            let city_id = $('#city_id').val();
            let price = $('#price').val();

            if(price == ' '){
                $('#price').addAttr('placeholder','Cant empty');
            }
        
            $.ajax({
                url: "{{route('add_price')}}",
                data: {
                    route_id: route_id,
                    city_id: city_id,
                    price: price,
                    _token: "{{ csrf_token() }}",
                },
                type: 'post',
                dataType: 'json',
                beforeSend: function() {
                    t.val('Processing...');
                    t.css('background-color','blue');

                },
                success: function(details) {
                    t.text('Success, Add new');
                    t.css('background-color','green');
                    getdata(route_id);
                    $('#price').val('');
                },
                error: function(err) {
                    t.text('Fail.Try Again');
                    t.css('background-color','red');
                }
                
            });
        });

        

    });

    function delete_data(dataid){
        $('#route_price_city_id').val(dataid);
        $('#delete_modal').modal('show');
    };

    function edit_data(city, price){
        $('#edit_modal').modal('show');
    };
    
    $('.btn-confrm-delete').click(function() {
        let route_price_city_id = $('#route_price_city_id').val();
        let route_id = $('.route_id').val();

        $.ajax({
            url: "{{route('delete_city_route_price')}}",
            data: {
                route_price_city_id: route_price_city_id,
                _token: "{{ csrf_token() }}",
            },
            type: 'post',
            success: function() {
                $('#example tbody').html(' ');   
                getdata(route_id);
                $('#delete_modal').modal('hide');

                Swal.fire({
                    type: 'toast',
                    position: 'center',
                    icon: 'success',
                    title: 'Recode delete successful',
                    showConfirmButton: false,
                    timer: 1000
                })
  
            },     
        });
    });

    function getdata(route_id){
            
            $.ajax({
                url: "{{route('get_all_route_data')}}",
                data: {
                    route_id: route_id,
                    _token: "{{ csrf_token() }}",
                },
                type: 'post',
                beforeSend: function() {
                    $('#example tbody').html(' ');   
                },
                success: function(details) {
                    $("#example tbody").html(details);
                },
                
                    
            });
        };
</script>
@endsection