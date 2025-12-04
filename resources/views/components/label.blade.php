@props(['value'])

<label {{ $attributes->merge(['class' => 'custom-label']) }}>
    {{ $value ?? $slot }}
    <span class="required-star">*</span>
</label>
<style>
    .custom-label {
        display: block;
        font-weight: 500;
        font-size: 0.875rem;
        color: #000000;
        margin-bottom: 0.25rem;
    }

    .required-star {
        color: red;
    }
</style>
