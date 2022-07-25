<div class="flex items-center space-x-2">
    {!! $slot !!}

    <kbd
        @class([
            $size,
            $textColor,
            $backgroundColor,
            $borderColor,
            'text-sm font-semibold border rounded-lg'
        ])
    >
        Shift
    </kbd>
</div>