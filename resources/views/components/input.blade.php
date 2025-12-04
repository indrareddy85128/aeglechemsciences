@props(['disabled' => false])

<input {{ $disabled ? 'disabled' : '' }} class="custom-input" style="height: 38px;" {!! $attributes !!}>

<style>
    .custom-input {
        border: 1px solid #d1d5db;
        border-radius: 0.375rem;
        box-shadow: 0 1px 2px rgba(0, 0, 0, 0.05);
        padding: 0.375rem 0.5rem;
        outline: none;
        transition: border-color 0.2s ease, box-shadow 0.2s ease;
        font-size: 1rem;
        width: 100%;
        box-sizing: border-box;
    }

    .custom-input:focus {
        border-color: #F97C09;
        box-shadow: 0 0 0 1px #F97C09;
    }

    .custom-input:disabled {
        background-color: #f9fafb;
        cursor: not-allowed;
        opacity: 0.5;
    }
</style>
