@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <div class="d-flex justify-content-between p-2">
                    <h5>Invoice Member List</h5>
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#exampleModalCenter">
                        Invoice
                    </button>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered" id="table">
                        <thead class="bg-primary">
                            <tr>
                                <th class="text-light">Id</th>
                                <th class="text-light">Insurance</th>
                                <th class="text-light">Case</th>
                                <th class="text-light">No Inovice</th>
                                <th class="text-light">Tanggal Inovice</th>
                                <th class="text-light">Tanggal Jatuh Invoice</th>
                                <th class="text-light">Amount</th>
                                <th class="text-light">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($member as $data)
                            <tr>
                                <td>{{ $data->id }}</td>
                                <td>{{ $data->client->name }} - {{ $data->client->brand }}</td>
                                <td>{{ $data->caselist->insured }}</td>
                                <td>{{ $data->caselist->file_no }}</td>
                                <td>{{ $data->caselist->dol }}</td>
                                <td>{{ $data->caselist->end }}</td>
                                <td>{{ $data->share }}</td>
                                <td>{{ $data->is_leader}}</td>
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
                <h5 class="modal-title" id="exampleModalLongTitle">Detail Inovice</h5>
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
                                    <option value=""></option>
                                    @foreach($caselist as $data)
                                    <option value="{{ $data->id }}">{{ $data->file_no }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="claim_amount">Claim Amount</label>
                                <input type="text" id="claim_amount" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="adjusted">Adjusted</label>
                                <input type="text" id="adjusted" class="form-control" readonly>
                                <span class="badge badge-success" id="ForAdjusted"></span>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="fee_based">Fee Based</label>
                                <input type="text" id="fee_based" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">Expense</label>
                                <input type="text" id="expense" class="form-control" readonly>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="">PPN</label>
                                <input type="text" id="share" class="form-control" readonly>
                                <span class="badge badge-primary" id="ForPercent"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Total</label>
                                <input type="text" id="total" class="form-control" readonly>
                            </div>
                        </div>
                    </div>
                    <hr>
                    <div class="row">
                        <div class="col-md-12">
                            <table class="table table-bordered">
                                <thead class="bg-primary text-light">
                                    <tr>
                                        <th>Member</th>
                                        <th>Member Share</th>
                                        <th>Nominal</th>
                                    </tr>
                                </thead>
                                <tbody id="forLoop">
                                </tbody>
                            </table>
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
        $('#claim_amount').val('')
        $('#adjusted').val('')
        $('#fee_based').val('')
        $('#expense').val('')
        $('#share').val('')
        $('#total').val('')
        $('#forLoop').html('')
        try {
            let data = await GetResource($(q).val())
            console.log(data)
            $('#claim_amount').val(formatter(data.sum.claim_amount))
            $('#adjusted').val(formatter(data.sum.adjusted))
            $('#fee_based').val(formatter(data.sum.fee))
            $('#expense').val(formatter(data.caselist.expense.amount))
            // $('#share').val(formatter(parseInt(data.sum.fee) + parseInt(data.caselist.expense.amount)))
            let sub_total = parseInt(data.sum.claim_amount) + parseInt(data.sum.fee) + parseInt(data.caselist.expense.amount)
            let persen = parseInt(sub_total) * parseInt(data.caselist.insurance.ppn) / 100
            $('#ForPercent').html(`${data.caselist.insurance.name} - ${data.caselist.insurance.ppn}%`)
            $('#ForAdjusted').html(`${data.caselist.currency}`)
            $('#share').val(formatter(persen))
            let total = parseInt(sub_total) + parseInt(persen)
            $('#total').val(formatter(total))
            $('#forLoop').html('')


            $.each(data.caselist.member, function() {
                $('#forLoop').append("<tr>" +
                    "<td id=" + this.member_insurance + "_dom>" + TheAjaxFunc(this.member_insurance) + "</td>" +
                    "<td>" + this.share + "</td>" +
                    "<td>" + formatter(total * parseInt(this.share) / 100) + "</td>" +
                    "</tr>")
            })
        } catch (err) {
            console.info(err)
            alert('Data Masih Kosong')
        }
    }

    function FindTheInsurance(id) {
        return fetch(`/api/insurance/${id}`)
            .then(data => {
                if (!data.ok) {
                    throw data.statusText
                }
                return data.json()
            })
    }
    async function TheAjaxFunc(id) {
        let response = await FindTheInsurance(id)
        $(`#${id}_dom`).html(response.name)
    }
    $(document).ready(function() {
        setTimeout(function() {
            $('#no_case').select2({
                placeholder: 'Select a Case'
            })
        }, 500)
    })
    $('#table').DataTable({
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