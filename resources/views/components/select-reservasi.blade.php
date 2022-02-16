@props(['label','name','value'=>'','dataOption'=>[] ])
<?php
$value = old($name,$value);
?>
<div class="form-group row">
    <label class="col-4 text-right col-form-label"><?= $label ?></label>
    <div class="col">
        <select name="{{ $name }}"
            class="form-control{{ $errors->has($name) ? ' is-invalid' : '' }}">
            <option value="">Pilih</option>
                @foreach ($dataOption as $item)
                    @if ($item['value'] == $value)
                        <option value="{{ $item['value']}}" selected>{{ $item['option']}}</option>
                        @else
                        <option value="{{ $item['value']}}">{{ $item['option']}}</option>
                    @endif
                @endforeach
        </select>
    </div>
</div>

{{--    --}}