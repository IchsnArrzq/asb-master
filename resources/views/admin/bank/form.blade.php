<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="bank_name">Bank Name</label>
            <input name="bank_name" id="bank_name" type="text" value="{{ $bank->bank_name ?? '' }}" class="form-control @error('bank_name') is-invalid @enderror">
            @error('bank_name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="no_account">no_account</label>
            <input name="no_account" id="no_account" type="text" value="{{ $bank->no_account ?? '' }}" class="form-control @error('no_account') is-invalid @enderror">
            @error('no_account')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="currency_id">currency</label>
            <select name="currency_id" id="currency_id" class="form-control @error('currency_id') is-invalid @enderror">
            <option value="{{ $bank->currency->id ?? '' }}">-- {{ $bank->currency->type ?? 'Kosong' }} --</option>
            @foreach($currency as $data)
            <option value="{{ $data->id }}">{{ $data->type }}</option>
            @endforeach
            </select>
            @error('currency_id')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>