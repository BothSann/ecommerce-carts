<button {{ $attributes->merge(['type' => 'submit', 'class' => 'btn btn-primary mt-4']) }}>
    {{ $slot }}
</button>
