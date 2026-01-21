{{-- <button {{$attributes->merge(['class'=>'rounded-md bg-indigo-600 px-3 py-2 text-sm font-semibold text-white shadow-xs hover:bg-indigo-500 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-indigo-600','type'=>'submit']) }}>
    {{$slot}}
</button> --}}

<button {{ $attributes->merge([
    'class' => 'inline-flex items-center px-4 py-2 bg-blue-600 text-white font-semibold rounded-lg shadow-sm hover:bg-blue-700 transition-colors duration-200 focus-visible:outline-2 focus-visible:outline-offset-2 focus-visible:outline-blue-600',
    'type' => 'submit'
]) }}>
    {{ $slot }}
</button>