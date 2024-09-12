@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>ADD NEW BUS</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('bus_reg') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Bus Name :</label>
                    <input type="text" name="name" id="" class="form-control @error('name') is-invalid @enderror">
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Registration Number :</label>
                    <input type="text" name="reg_no" id="" class="form-control @error('reg_no') is-invalid @enderror">
                    @error('reg_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Contact Number :</label>
                    <input type="number" name="contact_no" id="" class="form-control @error('contact_no') is-invalid @enderror">
                    @error('contact_no')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group col-md-6">
                    <label for="">Number of Seats :</label>
                    <input type="number" name="no_of_seats" id="" class="form-control @error('no_of_seats') is-invalid @enderror">
                    @error('no_of_seats')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Add Bus</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>BUS LIST</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="bus_mgt">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Bus Name</th>
                    <th scope="col">Registration No</th>
                    <th scope="col">Contact No</th>
                    <th scope="col">Seats</th>
                    <th scope="col">Status</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bus_details as $bus)
                    <tr>
                        <th scope="row">{{ $bus->bus_id }}</th>
                        <td>{{ $bus->bus_name }}</td>
                        <td>{{ $bus->bus_reg_no }}</td>
                        <td>{{ $bus->bus_contact_no }}</td>
                        <td>{{ $bus->bus_no_seats }}</td>
                        <td>@php $status = $bus->status; if($status == 1){ echo "<span class='badge badge-success badge-sm'>Active</span>"; }else{{ echo "<span class='badge badge-danger badge-sm'>Deactive</span>"; }} @endphp</td>
                        <td>
                            <button class="btn btn-warning btn-sm edit_bus" type="button" bus_id="{{ $bus->bus_id }}" bus_name="{{$bus->bus_name}}" reg_no="{{ $bus->bus_reg_no }}" contact_no="{{ $bus->bus_contact_no }}" seats="{{ $bus->bus_no_seats }}">Edit</button>
                            @php $status = $bus->status; if($status == 1){ echo "<button class='btn btn-danger btn-sm deactive_bus'  type='button' bus_id='$bus->bus_id' status='0'>Deactive</button>";} else{echo"<button class='btn btn-success btn-sm deactive_bus'  type='button' bus_id='$bus->bus_id' status='1'>Active</button>";} @endphp
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="deactive_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Confirmation</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Are you sure that are you going to active/deactive this record?
            </div>
            <form action="{{ route('deactive_bus') }}" method="POST">
                @csrf
                <div class="modal-footer">
                    <input type="hidden" name="bus_id" class="bus_id" value="">
                    <input type="hidden" name="status" class="status" value="">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit_model" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('update_reg') }}" method="POST">
                <div class="modal-body">
                    @csrf
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Bus Name :</label>
                            <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror">
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Registration Number :</label>
                            <input type="text" name="reg_no" id="reg_no" class="form-control @error('reg_no') is-invalid @enderror">
                            @error('reg_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-12">
                            <label for="">Contact Number :</label>
                            <input type="number" name="contact_no" id="contact_no" class="form-control @error('contact_no') is-invalid @enderror">
                            @error('contact_no')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="form-group col-md-12">
                            <label for="">Number of Seats :</label>
                            <input type="number" name="no_of_seats" id="no_of_seats" class="form-control @error('no_of_seats') is-invalid @enderror">
                            @error('no_of_seats')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="bus_id" id="bus_id" value="">
                        <button type="submit" class="btn btn-primary ">Update Bus</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    $('document').ready(function(){
        $('.edit_bus').click(function(){
            let bus_id = $(this).attr('bus_id');
            let bus_name = $(this).attr('bus_name');
            let bus_reg_no = $(this).attr('reg_no');
            let bus_contact_no = $(this).attr('contact_no');
            let seats = $(this).attr('seats');

            $('#bus_id').val(bus_id);
            $('#name').val(bus_name);
            $('#reg_no').val(bus_reg_no);
            $('#contact_no').val(bus_contact_no);
            $('#no_of_seats').val(seats);
            $('#edit_model').modal('show');
        })

        $('.deactive_bus').click(function(){
            let id = $(this).attr('bus_id');
            let status = $(this).attr('status');

            $('.bus_id').val(id);
            $('.status').val(status);
            $('#deactive_model').modal('show');
        });
    });
</script>
@endsection