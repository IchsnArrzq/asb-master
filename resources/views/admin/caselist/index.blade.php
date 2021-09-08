@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <h5>case List</h5>
                    <a href="{{ route('admin.caselist.create') }}" class="btn btn-outline-primary btn-sm">Create</a>
                </div>
                <div class="table-responsive">
                    <table id="table" class="table table-striped nowrap">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">More</th>
                                <th class="text-light">Id</th>
                                <th class="text-light">file no</th>
                                <th class="text-light">insurance</th>
                                <th class="text-light">adjuster</th>
                                <th class="text-light">broker</th>
                                <th class="text-light">incident</th>
                                <th class="text-light">policy</th>
                                <th class="text-light">insured</th>
                                <th class="text-light">risk_location</th>
                                <th class="text-light">currency</th>
                                <th class="text-light">leader</th>
                                <th class="text-light">begin</th>
                                <th class="text-light">end</th>
                                <th class="text-light">dol</th>
                                <th class="text-light">Pr Amount</th>
                                <th class="text-light">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($caselist as $data)
                            <tr>
                                <td></td>
                                <td>{{ $data->id }}</td>
                                <td><a href="{{ route('admin.caselist.show', $data->id) }}">{{ $data->file_no }}</a></td>
                                <td>{{ $data->insurance->brand }} - {{ $data->insurance->name }}</td>
                                <td>{{ $data->adjuster->name }}</td>
                                <td>{{ $data->broker->nama_broker }}</td>
                                <td>{{ $data->incident->type_incident }}</td>
                                <td>{{ $data->policy->type_policy }}</td>
                                <td>{{ $data->insured }}</td>
                                <td>{{ $data->risk_location }}</td>
                                <td>{{ $data->currency }}</td>
                                <td>{{ $data->leader }}</td>
                                <td>{{ $data->begin }}</td>
                                <td>{{ $data->end }}</td>
                                <td>{{ $data->dol }}</td>
                                <td>{{ $data->pr_amount }}</td>
                                <td>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('admin.caselist.edit', $data->id) }}" class="btn btn-outline-warning btn-sm">Edit</a>
                                        <form action="{{ route('admin.caselist.destroy', $data->id) }}" method="post">
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