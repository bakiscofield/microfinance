@php
    $label = $label ?? "";
    $type = $type ?? "text";
    $name = $name ?? "";
    $name2 = $name2 ?? "";
    $class = $class ?? "col-12";
    $value = $value ?? "";
    $required = $required ?? "";
    $optionnal = $optionnal ?? false;
@endphp
<div class="{{ $class }} form-group">
    <label for="{{ $name }}" class="text-capitalize">{{ $label }}</label>
    <div class="input-daterange input-group" data-date-format="mm/dd/yyyy" data-week-start="1" data-autoclose="true" data-today-highlight="true">
        <input type="text" class="form-control" id="{{ $name }}" value="{{ $value }}" name="{{ $name }}" placeholder="Date début" data-week-start="1" data-autoclose="true" data-today-highlight="true">
        <div class="input-group-prepend input-group-append">
            <span class="input-group-text font-w600">
                <i class="fa fa-fw fa-arrow-right"></i>
            </span>
        </div>
        <input type="text" class="form-control" id="{{ $name2 }}" value="{{ $value2 }}" name="{{ $name2 }}" placeholder="Date fin" data-week-start="1" data-autoclose="true" data-today-highlight="true">
    </div>
</div>