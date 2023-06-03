@php
    $label = $label ?? "";
    $type = $type ?? "text";
    $name = $name ?? "";
    $class = $class ?? "col-4";
    $value = $value ?? "";
    $placeholder = $placeholder ?? "";
    $required = $required ?? "";
    $optionnal = $optionnal ?? false;
@endphp
<div class="text-capitalize {{ $class }}">
    <label>{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="form-control" placeholder="{{ $placeholder }}">
</div>