
@php
    $label = $label ?? "";
    $type = $type ?? "text";
    $name = $name ?? "";
    $name2 = $name2 ?? "";
    $class = $class ?? "col-12";
    $value = $value ?? "";
    $value2 = $value2 ?? "";
    $required = $required ?? "";
    $optionnal = $optionnal ?? false;
@endphp

<div class="row m-auto">
    <div class="form-row">
        <div class="form-group m-auto">
            <label for="example-flatpickr-range" >{{$label}}</label>
            <input type="{{$type}}" class="js-flatpickr form-control bg-white " id="example-flatpickr-range" name="date_debut" name2="date_fin" value="{{$value}}" value2="{{$value2}}" placeholder="Select Date Range" data-mode="range" data-min-date="today">
        </div>
    </div>
</div>