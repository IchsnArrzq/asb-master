@extends('layouts.admin')
@section('content')
@can('user_create')
<div style="margin-bottom: 10px;" class="row">
    <div class="col-lg-12">
        <a class="btn btn-primary float-right" href="{{ route("admin.users.create") }}">
            <i class="fa fa-plus"></i> {{ trans('global.add') }} {{ trans('cruds.user.title_singular') }}
        </a>
    </div>
</div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.user.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table id="run-table" class=" table table-bordered table-striped table-hover datatable datatable-User">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Role</th>
                        <th>
                            Action
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
@section('scripts')

<script>
    $('.table').DataTable()
</script>
@endsection