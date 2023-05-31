<div {{ $attributes->merge(['class' => "z-10 font-normal bg-white divide-y divide-gray-100 rounded-lg shadow w-44 dark:bg-gray-700 dark:divide-gray-600"]) }}
     id="floatDropdown" :class="{'hidden': !model, 'block': model}">
    <ul class="py-2 text-sm text-gray-700 dark:text-gray-400">
        {{ $slot }}
    </ul>
</div>
