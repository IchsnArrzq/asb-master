@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-end p-2">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Invoice
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>insurance</th>
                                <th>Case</th>
                                <th>No Inovice</th>
                                <th>Tanggal Inovice</th>
                                <th>Tanggak Jatuh Invoice</th>
                                <th>Amount</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->client->name }} - {{ $data->client->brand }}</td>
                                <td>{{ $data->caselist->insured }}</td>
                                <td>{{ $data->caselist->file_no }}</td>
                                <td></td>
                                <td>Tanggak Jatuh Invoice</td>
                                <td>{{ $data->share }}</td>
                                <td>Status</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModalCenter" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Modal title</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_case">No Case</label>
                                <select name="" id="no_case" onchange="OnSelect(this)" class="form-control">
                                    @foreach($caselist as $data)
                                    <option value="{{ $data->id }}">{{ $data->file_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pr_amount">Pr Amount</label>
                                <input type="text" id="pr_amount" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <div class="row">

                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="fee_based">Fee Based</label>
                                <input type="text" id="fee_based" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Expense</label>
                                <input type="text" id="expense" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Total Share Percent</label>
                                <input type="text" id="share" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" id="total" class="form-control">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="table-responsive">
                                <table>

                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@stop
@section('scripts')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
    const formatter = function(num) {
        var str = num.toString().replace("", ""),
            parts = false,
            output = [],
            i = 1,
            formatted = null;
        if (str.indexOf(".") > 0) {
            parts = str.split(".");
            str = parts[0];
        }
        str = str.split("").reverse();
        for (var j = 0, len = str.length; j < len; j++) {
            if (str[j] != ",") {
                output.push(str[j]);
                if (i % 3 == 0 && j < (len - 1)) {
                    output.push(",");
                }
                i++;
            }
        }
        formatted = output.reverse().join("");
        return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
    };
    const GetResource = function(id) {
        return fetch(`/api/caselist/${id}`)
            .then((data) => {
                if (!data.ok) {
                    throw data.statusText;
                }
                return data.json()
            })
    }
    const OnSelect = async function(q) {
        try {
            let data = await GetResource($(q).val())
            console.log(data)
            $('#pr_amount').val(formatter(data.pr_amount))
            $('#expense').val(formatter(data.expense.amount))
        } catch (err) {
            console.log(err)
        }
    }
    $(document).ready(function() {
        setTimeout(function() {
            $('#no_case').select2()
        }, 500)
    })
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