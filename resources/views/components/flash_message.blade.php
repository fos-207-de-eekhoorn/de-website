<div class="flash-message flash-message--{{ $type }}">
    <p class="flash-message__message">
    	@switch($type)
    		@case('success')
        		<span class="fa--before"><i class="fas fa-check"></i></span>
        		@break
    		@case('error')
        		<span class="fa--before"><i class="fas fa-times"></i></span>
        		@break
    		@case('info')
        		<span class="fa--before"><i class="fas fa-info"></i></span>
        		@break
    		@case('warning')
        		<span class="fa--before"><i class="fas fa-exclamation"></i></span>
        		@break
        @endswitch
        {{ $slot }}
    </p>
</div>