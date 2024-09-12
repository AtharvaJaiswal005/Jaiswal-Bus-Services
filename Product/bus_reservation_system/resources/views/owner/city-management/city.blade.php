@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>ADD CITY</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('city_add') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-8">
                    <input type="text" name="city_name" id="" placeholder="City Name" class="form-control" required>
                </div>
                <div class="form-group col-md-4">
                    <button class="btn btn-primary btn-block" type="submit">Add City</button>
                </div>
            </div>
        </form>
    </div>
</div>

<div class="card">
    <div class="card-header">
        <h2>CITY LIST</h2>
    </div>
    <div class="card-body">
        <table class="table table-bordered" id="example">
            <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">City Name</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($city_details as $city)     
                <tr>               
                    <th scope="row">{{ $city->city_id }}</th>
                    <td>{{ $city->city_name }}</td>
                    <td>
                        <button class="btn btn-warning btn-sm btn-edit" data-id="{{ $city->city_id }}" city-name="{{ $city->city_name }}" type="button">Edit</button>
                        <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $city->city_id }}" type="button">Delete</button>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<!-- Modal Delete -->
<div class="modal fade" id="delete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
                <form action="{{ route('delete_city') }}" method="POST">
                    @csrf
                    <input type="hidden" name="city_id" class="city_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                    <button type="submit" class="btn btn-primary">Yes</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('edit_city') }}" method="POST">
                @csrf
                <div class="modal-body">
                <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">City :</label>
                    <input type="text" name="city_name" value="" class="form-control city_name">
                </div>
            </div>
                </div>
                <div class="modal-footer">
                    <input type="hidden" name="city_id" class="city_id">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Reset Data</button>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
     $('document').ready(function(){
        $('.btn-delete').click(function(){
            city_id = $(this).attr('data-id');
            $('.city_id').val(city_id);
            $('#delete').modal('show');
        });

        $('.btn-edit').click(function(){
            city_id = $(this).attr('data-id');
            city_name = $(this).attr('city-name');
            $('.city_id').val(city_id);
            $('.city_name').val(city_name);
            $('#edit').modal('show');
        });        
    });
</script>
@endsection