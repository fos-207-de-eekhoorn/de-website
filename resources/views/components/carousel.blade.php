<section class="section section--small-spacing carousel">
	@foreach($images as $image)
		<img src="{{ ((object)$image)->image }}" alt="{{ ((object)$image)->alt }}" class="carousel__banner">
	@endforeach

	<h1 class="carousel__title @if(isset($page_sub_title)) carousel__title--with-sub-title @endif">
		{{ $page_title }}
		@if(isset($page_sub_title))<br>
			<span class="carousel__sub-title">{{ $page_sub_title }}</span>
		@endif
	</h1>
</section>