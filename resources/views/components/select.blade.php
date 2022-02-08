@props(['name','value'=>'','dataOption'=>[] ])
<?php
$value = old($name,$value);
?>
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
{{--    --}}