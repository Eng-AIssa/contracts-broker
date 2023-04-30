@props(['disabled' => false, 'error' => null])

<div class="form-check">
    <input {{ $disabled ? 'disabled' : '' }} {!! $attributes->class(['is-invalid' => $error])->merge(['class' => 'form-check-input', 'type' => 'checkbox']) !!}>
    {{$slot}}
</div>
