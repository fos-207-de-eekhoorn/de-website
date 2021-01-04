<div class="flash-message flash-message--{{ $type }}">
    <div class="flash-message__message">
        <span class="flash-message__icon icon">
			<i class="{{ config('style.flash_message.'.$type) }}"></i>
		</span>

        <span>{{ $slot }}</span>
    </div>
</div>