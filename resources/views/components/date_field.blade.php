@php
    $label = $label ?? "";
    $type = $type ?? "text";
    $name = $name ?? "";
    $class = $class ?? "col-5";
    $value = $value ?? "";
    $placeholder = $placeholder ?? "";
    $required = $required ?? "";
    $optionnal = $optionnal ?? false;
@endphp
<div class="text-capitalize {{ $class }}">
    <label>{{ $label }}</label>
    <input type="{{ $type }}" name="{{ $name }}" value="{{ $value }}" class="form-control" placeholder="{{ $placeholder }}" data-week-start="1" data-autoclose="true" data-today-highlight="true">
</div>