@props(['active'])

@php
    $classes =
        $active ?? false
            ? 'block w-full ps-3 pe-4 py-2 border-l-4 border-[#F97C09] text-start text-base font-medium text-[#F97C09] bg-[#FFF4E6] focus:outline-none focus:text-[#F9720B] focus:bg-[#FFE8D5] transition duration-150 ease-in-out'
            : 'block w-full ps-3 pe-4 py-2 border-l-4 border-transparent text-start text-base font-medium text-gray-600 hover:text-gray-800 hover:bg-gray-50 hover:border-gray-300 focus:outline-none focus:text-gray-800 focus:bg-gray-50 focus:border-gray-300 transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
