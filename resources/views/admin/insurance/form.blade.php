<div class="row">
    <div class="col-md-3">
        <div class="form-group">
            <label for="brand">Brand</label>
            <input name="brand" id="brand" type="text" value="{{ $client->brand ?? '' }}" class="form-control @error('brand') is-invalid @enderror">
            @error('brand')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">
        <div class="form-group">
            <label for="name">Nama</label>
            <input name="name" id="name" type="text" value="{{ $client->name ?? '' }}" class="form-control @error('name') is-invalid @enderror">
            @error('name')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="address">Alamat</label>
            <input name="address" id="address" type="text" value="{{ $client->address ?? '' }}" class="form-control @error('address') is-invalid @enderror">
            @error('address')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="no_telp">No Telp</label>
            <input name="no_telp" id="no_telp" type="text" value="{{ $client->no_telp ?? '' }}" class="form-control @error('no_telp') is-invalid @enderror">
            @error('no_telp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="no_hp">No HP</label>
            <input name="no_hp" id="no_hp" type="text" value="{{ $client->no_hp ?? '' }}" class="form-control @error('no_hp') is-invalid @enderror">
            @error('no_hp')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="email">Email</label>
            <input name="email" id="email" type="text" value="{{ $client->email ?? '' }}" class="form-control @error('email') is-invalid @enderror">
            @error('email')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="status">Status</label>
            <input name="status" id="status" type="text" value="{{ $client->status ?? '' }}" class="form-control @error('status') is-invalid @enderror">
            @error('status')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="picture">Picture</label>
            <input name="picture" id="picture" type="file" class="form-control @error('picture') is-invalid @enderror">
            @error('picture')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="ppn">PPN</label>
            <input name="ppn" id="ppn" type="text" value="{{ $client->ppn ?? '' }}" class="form-control @error('ppn') is-invalid @enderror">
            @error('ppn')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-3">

        <div class="form-group">
            <label for="type">Type</label>
            <input name="type" id="type" type="text" value="{{ $client->type ?? '' }}" class="form-control @error('type') is-invalid @enderror">
            @error('type')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>