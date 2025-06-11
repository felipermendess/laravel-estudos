<button>
    <!-- {{ $nameButton }} -->

    <!-- return $key === 'loading'; -->

    <!-- {{ $attributes->filter(function($value, $key) {
        return $value === 'true';
    }) }} -->

    <!-- {{ $attributes->whereDoesntStartWith('waiting') }} -->

    <!-- {{ $attributes->whereStartsWith('class') }} -->

    {{ $attributes->get('class') }}
    {{ $attributes->has('class') ? 'true' : 'false' }}
</button>
