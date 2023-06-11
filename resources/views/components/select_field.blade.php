@php
    $label = $label ?? "";
    $data = $data ?? "text";
    $name = $name ?? "";
    $class = $class ?? "col-md-12";
    $value = $value ?? "";
    $placeholder = $placeholder ?? "";
    $required = $required ?? "";
    $optionnal = $optionnal ?? false;
@endphp
<div class="{{ $class }}">
    <label for="{{ $name }} text-capitalize">{{ $label }}</label>
    <select name="{{ $name }}" id="{{ $name }}" class="form-control mb-4 @error($name) is-invalid @enderror">
        <option value="">Séléctionner {{ $label }}</option>
        @foreach($data as $obj)
        <option value="{{ $obj->id }}">{{ $obj }}</option>
        @endforeach
    </select>
    @error($name)
    <span class="alert text-danger">{{ $message }}</span>
    @enderror
</div>