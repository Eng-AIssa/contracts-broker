@props(['disabled' => false, 'error' => null, 'value' => ''])

<select {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->class(['is-invalid' => $error, 'border-dark-subtle' => !$error])->merge(['class' => 'form-select rounded-1', 'aria-label' => "Unit Code Dropdown List"]) !!}>
    <option selected>{{$value}}</option>
    {{$slot}}
</select>
