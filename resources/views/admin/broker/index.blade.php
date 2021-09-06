@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <h5>cause of loss List</h5>
                    <a href="{{ route('admin.broker.create') }}" class="btn btn-outline-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">Id</th>
                                <th class="text-light">nama_broker</th>
                                <th class="text-light">telepon_broker</th>
                                <th class="text-light">email_broker</th>
                                <th class="text-light">alamat_broker</th>
                                <th class="text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($broker as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->nama_broker }}</td>
                                <td>{{ $data->telepon_broker }}</td>
                                <td>{{ $data->email_broker }}</td>
                                <td>{{ $data->alamat_broker }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.broker.edit', $data->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.broker.destroy', $data->id) }}" method="post">
                                            @csrf
                                            @method('delete')    
                                        <button type="submit" class="btn btn-outline-danger btn-sm">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/1.11.0/js/jquery.dataTables.min.js"></script>
<script>
    $('.table').DataTable()
</script>
@endsection