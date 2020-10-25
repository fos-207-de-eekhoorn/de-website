<section class="section section--extra-small-spacing banner banner--{{ $banner->color }}">
	<img src="{{ asset('/img/banners/' . $banner->color . '-' . $banner->pattern . '-' . $banner->strength . '.png') }}" alt="{{ $page_title }}" class="banner__image">

	<h1 class="banner__title @if(isset($page_sub_title)) banner__title--with-sub-title @endif">
		{{ $page_title }}
		@if(isset($page_sub_title))<br>
			<span class="banner__sub-title">{!! $page_sub_title !!}</span>
		@endif
	</h1>
</section>