@extends('layouts.admin')

@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="profile-tabs">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs nav-tabs-bottom">
                        <li class="nav-item"><a class="nav-link active" href="#Assignment" data-toggle="tab">Assignment info</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Expense" data-toggle="tab">Expense</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Email" data-toggle="tab">Email Transcript</a></li>
                        <li class="nav-item"><a class="nav-link" href="#File" data-toggle="tab">File Survey</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Claim" data-toggle="tab">Claim Documents</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Report1" data-toggle="tab">Report 1</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Report2" data-toggle="tab">Report 2</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Report3" data-toggle="tab">Report 3</a></li>
                        <li class="nav-item"><a class="nav-link" href="#Report4" data-toggle="tab">Report 4</a></li>
                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane show active" id="Assignment">
                            <div class="row">
                                <div class="col-md-12">
                                Assignment
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="Expense">
                            <div class="row">
                                <div class="col-md-12">
                                Expense
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="Email">
                            <div class="row">
                                <div class="col-md-12">
                                Email
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="File">
                            <div class="row">
                                <div class="col-md-12">
                                File
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="Report1">
                            <div class="row">
                                <div class="col-md-12">
                                Report1
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="Report2">
                            <div class="row">
                                <div class="col-md-12">
                                Report2
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="Report3">
                            <div class="row">
                                <div class="col-md-12">
                                Report3
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane show" id="Report4">
                            <div class="row">
                                <div class="col-md-12">
                                Report4
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop