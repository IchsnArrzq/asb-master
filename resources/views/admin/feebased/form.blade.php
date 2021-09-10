<div class="row">
    <div class="col-md-6">
        <div class="form-group">
            <label for="adjusted_idr">Adjusted IDR</label>
            <input name="adjusted_idr" id="adjusted_idr" type="text" oninput="rupiah(this)" value="{{ number_format($feebased->adjusted_idr) ?? '' }}" class="form-control @error('adjusted_idr') is-invalid @enderror">
            @error('adjusted_idr')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="adjusted_usd">Adjusted USD</label>
            <input name="adjusted_usd" id="adjusted_usd" type="text" oninput="rupiah(this)" value="{{ number_format($feebased->adjusted_usd) ?? '' }}" class="form-control @error('adjusted_usd') is-invalid @enderror">
            @error('adjusted_usd')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="fee_idr">Fee IDR</label>
            <input name="fee_idr" id="fee_idr" type="text" oninput="rupiah(this)" value="{{ number_format($feebased->fee_idr) ?? '' }}" class="form-control @error('fee_idr') is-invalid @enderror">
            @error('fee_idr')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-6">
        <div class="form-group">
            <label for="fee_usd">Fee USD</label>
            <input name="fee_usd" id="fee_usd" type="text" oninput="rupiah(this)" value="{{ number_format($feebased->fee_usd) ?? '' }}" class="form-control @error('fee_usd') is-invalid @enderror">
            @error('fee_usd')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
    <div class="col-md-4">
        <div class="form-group">
            <label for="category_fee">Category Fee</label>
            <select name="category_fee" id="category_fee" type="text" class="form-control @error('category_fee') is-invalid @enderror">
                <option value="1">Marine</option>
                <option value="2">Non Marine</option>
            </select>
            @error('category_fee')
            <div class="invalid-feedback">
                {{ $message }}
            </div>
            @enderror
        </div>
    </div>
</div>
@section('scripts')
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

    function rupiah(e) {
        e.value = formatter(e.value)
    }
</script>
@stop