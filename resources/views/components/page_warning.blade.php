<div class="container page-warning @if (isset($type)) page-warning--{{ $type }} @endif">
    @if (isset($type))
        @if ($type === 'error')
            <div class="page-warning__icon icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        @endif
    @endif

    <p class="page-warning__warning text--align-center">
        {{ $slot }}
    </p>

    @if (isset($type))
        @if ($type === 'error')
            <div class="page-warning__icon icon">
                <i class="fas fa-exclamation-triangle"></i>
            </div>
        @endif
    @endif
</div>