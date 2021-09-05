@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <h5>Insurance List</h5>
                    <a href="{{ route('admin.insurance.create') }}" class="btn btn-outline-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">Id</th>
                                <th class="text-light">Brand</th>
                                <th class="text-light">Name</th>
                                <th class="text-light">Address</th>
                                <th class="text-light">No Telp</th>
                                <th class="text-light">Hp</th>
                                <th class="text-light">Email</th>
                                <th class="text-light">Status</th>
                                <th class="text-light">PPN</th>
                                <th class="text-light">Type</th>
                                <th class="text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                            <tr>
                                <td>{{ $client->id }}</td>
                                <td>{{ $client->brand }}</td>
                                <td>{{ $client->name }}</td>
                                <td>{{ $client->address }}</td>
                                <td>{{ $client->no_telp }}</td>
                                <td>{{ $client->no_hp }}</td>
                                <td>{{ $client->email }}</td>
                                <td>{{ $client->status }}</td>
                                <td>{{ $client->ppn }}</td>
                                <td>{{ $client->type }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.insurance.edit', $client->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.insurance.destroy', $client->id) }}" method="post">
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
@endsection

@section('scripts')
<script>
    $('.table').DataTable()
</script>
@stop