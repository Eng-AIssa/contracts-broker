@props(['disabled' => false, 'error' => null, 'value' => ''])

<select {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->class(['is-invalid' => $error, 'border-dark-subtle' => !$error])->merge(['class' => 'form-select ', 'aria-label' => "Unit Code Dropdown List"]) !!}>
    <option selected>{{$value}}</option>
    {{$slot}}
</select>
