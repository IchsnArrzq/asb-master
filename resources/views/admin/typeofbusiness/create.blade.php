@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card shadow">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <a href="{{ route('admin.typeofbusiness.index') }}" class="btn btn-outline-info">Back</a>
                    <h5>Type of Business Form Create</h5>
                </div>
                <form action="{{ route('admin.typeofbusiness.store') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    @include('admin.typeofbusiness.form')
                    <button type="submit" class="btn btn-outline-success float-right">Store</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection