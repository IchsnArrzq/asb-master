@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                {{ $caselist }}
            </div>
        </div>
    </div>
</div>
@stop