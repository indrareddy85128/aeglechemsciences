<button type="submit" class="custom-button">
    {{ $slot }}
</button>

<style>
    .custom-button {
        display: inline-flex;
        align-items: center;
        padding: 0.5rem 1rem;
        background-color: #295FA9;
        border: none;
        border-radius: 0.375rem;
        font-weight: 600;
        font-size: 0.75rem;
        color: #ffffff;
        text-transform: uppercase;
        letter-spacing: 0.05em;
        cursor: pointer;
        transition: all 0.15s ease-in-out;
    }

    .custom-button:hover {
        background-color: #F97C09;
    }

    .custom-button:focus {
        background-color: #295FA9;
        outline: 2px solid #295FA9;
        outline-offset: 2px;
    }

    .custom-button:active {
        background-color: #295FA9;
    }

    .custom-button:disabled {
        opacity: 0.5;
        cursor: not-allowed;
    }
</style>
