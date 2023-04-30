@props(['disabled' => false, 'required' => false, 'error' => null])

<input {{ $required ? 'required' : '' }} {{ $disabled ? 'disabled' : '' }} {!! $attributes->class(['is-invalid' => $error, 'border-dark-subtle' => !$error])->merge(['class' => 'form-control rounded-1']) !!}>
