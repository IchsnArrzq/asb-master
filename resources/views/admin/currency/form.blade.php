<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <label for="type">type</label>
            <input name="type" id="type" type="text" value="{{ $currency->type ?? '' }}" class="form-control @error('type') is-invalid @enderror">
            @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>