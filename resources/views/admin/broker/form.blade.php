<div class="row">
    <div class="col-md-4">
        <div class="form-group">
            <label for="nama_broker">nama_broker</label>
            <input name="nama_broker" id="nama_broker" type="text" value="{{ $broker->nama_broker ?? '' }}" class="form-control @error('nama_broker') is-invalid @enderror">
            @error('nama_broker')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="telepon_broker">telepon_broker</label>
            <input name="telepon_broker" id="telepon_broker" type="text" value="{{ $broker->telepon_broker ?? '' }}" class="form-control @error('telepon_broker') is-invalid @enderror">
            @error('telepon_broker')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="email_broker">email_broker</label>
            <input name="email_broker" id="email_broker" type="email" value="{{ $broker->email_broker ?? '' }}" class="form-control @error('email_broker') is-invalid @enderror">
            @error('email_broker')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="alamat_broker">alamat_broker</label>
            <input name="alamat_broker" id="alamat_broker" type="text" value="{{ $broker->alamat_broker ?? '' }}" class="form-control @error('alamat_broker') is-invalid @enderror">
            @error('alamat_broker')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>