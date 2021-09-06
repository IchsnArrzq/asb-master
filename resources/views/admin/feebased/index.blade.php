@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <h5>feebased List</h5>
                    <a href="{{ route('admin.feebased.create') }}" class="btn btn-outline-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">Id</th>
                                <th class="text-light">adjusted_idr</th>
                                <th class="text-light">adjusted_usd</th>
                                <th class="text-light">fee_idr</th>
                                <th class="text-light">fee_usd</th>
                                <th class="text-light">category_fee</th>
                                <th class="text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feebased as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->adjusted_idr }}</th>
                                <td>{{ $data->adjusted_usd }}</th>
                                <td>{{ $data->fee_idr }}</th>
                                <td>{{ $data->fee_usd }}</th>
                                <td>{{ $data->category_fee }}</th>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.feebased.edit', $data->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.feebased.destroy', $data->id) }}" method="post">
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