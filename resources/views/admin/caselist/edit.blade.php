@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <a href="{{ route('admin.caselist.index') }}" class="btn btn-outline-info">Back</a>
                    <h5>Case List Form Edit <span class="badge badge-warning">{{ $caselist->file_no }}</span></h5>
                </div>
                <form action="{{ route('admin.caselist.update', $caselist->id) }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    @include('admin.caselist.form')
                    <button type="submit" class="btn btn-outline-success float-right" id="submit_case_list">Update</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection