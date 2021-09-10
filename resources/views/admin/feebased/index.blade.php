@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <h5>Fee Based List</h5>
                    <a href="{{ route('admin.feebased.create') }}" class="btn btn-outline-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">Id</th>
                                <th class="text-light">Adjusted IDR</th>
                                <th class="text-light">Adjusted USD</th>
                                <th class="text-light">Fee IDR</th>
                                <th class="text-light">Fee USD</th>
                                <th class="text-light">Category Fee</th>
                                <th class="text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($feebased as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td class="text-right">Rp.{{ number_format($data->adjusted_idr) }}</td>
                                <td class="text-right">${{ number_format($data->adjusted_usd) }}</td>
                                <td class="text-right">Rp.{{ number_format($data->fee_idr) }}</td>
                                <td class="text-right">${{ number_format($data->fee_usd) }}</td>
                                <td class="text-center">
                                    
                                    @if($data->category_fee == 1)
                                        <span class="badge badge-primary">Marine - {{ $data->category_fee }}</span>
                                    @else
                                        <span class="badge badge-success">Non Marine - {{ $data->category_fee }}</span>
                                    @endif
                                </td>
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
    $('.table').DataTable({
        responsive: {
            details: {
                type: 'column'
            }
        },
        columnDefs: [{
                className: 'dtr-control',
                responsivePriority: 1,
                targets: 0
            },
            {
                responsivePriority: 2,
                targets: 1
            }
        ]
    })
</script>
@stop