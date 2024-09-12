@extends('layouts.main')

@section('content')
<div class="card">
    <div class="card-header">
        <h2>ADD DAILY ROUTINE</h2>
    </div>
    <div class="card-body">
        <form action="{{ route('add_route') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="form-group col-md-12">
                    <label for="">Select Bus</label>
                    <select name="bus_id" class="form-control" data-toggle="select" required>
                        <option selected disabled>Select Bus</option>
                        @foreach ($bus_details as $bus)
                            <option value="{{ $bus->bus_id }}">{{ $bus->bus_id }} - {{ $bus->bus_name }}</option>   
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="">Start Time :</label>
                    <input type="time" name="start_time" id="" class="form-control" required>
                </div>
                <div class="form-group col-md-6">
                    <label for="">End Time :</label>
                    <input type="time" name="end_time" id="" class="form-control" required>
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-3">
                    <button type="submit" class="btn btn-primary btn-block">Add Route</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection