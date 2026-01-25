{{-- @props(['active' => false, ])

<a {{ $attributes->merge(['class' => $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']) }}>
    {{ $slot }}
</a> --}}


@props(['active' => false])

<a {{ $attributes->merge([
    'class' => $active 
        ? 'relative inline-flex items-center px-4 py-2.5 text-sm font-semibold text-blue-600 transition-all duration-200 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-full after:bg-blue-600' 
        : 'relative inline-flex items-center px-4 py-2.5 text-sm font-medium text-gray-700 transition-all duration-200 hover:text-blue-600 after:absolute after:bottom-0 after:left-0 after:h-0.5 after:w-0 after:bg-blue-600 after:transition-all after:duration-200 hover:after:w-full'
]) }}>
    {{ $slot }}
</a>