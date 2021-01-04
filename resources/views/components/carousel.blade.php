{{-- Carousel

	Types of carousel:
		* normal
		* full-width
--}}

<div class="carousel--{{ $name }} slick--{{ $type ?? 'normal' }} slick-slider">
	@foreach($images as $image)
	    <img src="{{ $image }}">
    @endforeach
</div>

<script>
	// Carousel setup
    $(document).ready(function() {
        $('.carousel--{{ $name }}').slick({
            dots: true,
            infinite: true,
            autoplay: true,
            autoplaySpeed: 3000,
        	@if($type === 'normal')
	            slidesToShow: 2,
	            centerMode: true,
	            variableWidth: true,
	        @elseif($type === 'full-width')
	            slidesToShow: 1,
            @endif
	        slidesToScroll: 1,
        });
    });
</script>