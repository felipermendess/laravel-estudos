<div {{ $attributes->merge(['class' => 'mt-5']) }}>
    <div class="class-header">
        {{ $title }}
    </div>
    <div class="class-body">
        {{ $slot }}
    </div>
    <div class="class-footer">
        {{ $plinth }}
    </div>
</div>
