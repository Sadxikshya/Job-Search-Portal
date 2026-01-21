{{-- @props(['active' => false, ])

<a {{ $attributes->merge(['class' => $active ? 'bg-gray-900 text-white' : 'text-gray-300 hover:bg-gray-700 hover:text-white']) }}>
    {{ $slot }}
</a> --}}


@props(['active' => false])

<a {{ $attributes->merge([
    'class' => $active 
        ? 'inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition-colors duration-200' 
        : 'inline-flex items-center px-4 py-2 bg-white text-gray-700 font-semibold rounded-lg border border-gray-300 shadow-sm hover:bg-gray-50 hover:border-gray-400 transition-colors duration-200'
]) }}>
    {{ $slot }}
</a>