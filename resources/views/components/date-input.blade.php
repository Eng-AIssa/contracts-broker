@props(['disabled' => false, 'error' => null])

<input {{ $disabled ? 'disabled' : '' }}
    {!! $attributes->class(['is-invalid' => $error, 'border-dark-subtle' => !$error])->merge(['class' => 'form-control rounded-1', 'type' => 'date']) !!}>

