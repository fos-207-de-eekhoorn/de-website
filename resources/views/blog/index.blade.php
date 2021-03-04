@extends('layouts.app')

@section('content')

	@component('components.banner', [
		'banner' => (object)[
			'color' => 'blue-light',
			'pattern' => '1',
			'strength' => 'dark',
		],
		'page_title' => 'Blog',
	])
	@endcomponent

	{{-- Blog posts --}}
	{{-- ================================================================ --}}
	<div class="row">
		<div class="col-12">
			@if (session('error_post_not_found'))
				@component('components.flash_message', [
					'type' => 'error',
				])
					Deze post is niet gevonden.
				@endcomponent
			@endif
		</div>

		<div class="col-12 col-md-4 col-lg-3 section section--small-spacing">
			<input type="checkbox" id="filters" class="toggle-on-mobile__checkbox" hidden>

			<h3 class="toggle-on-mobile__label">
				<label for="filters">
					<span class="fa--before icon"><i class="fas fa-filter"></i></span>
					Filters
					<span class="fa--after toggle-on-mobile__caret"><i class="fas fa-caret-down"></i></span>
				</label>
			</h3>

			<div class="toggle-on-mobile">
				<h5 class="large-margin-top">Categoriën</h5>
				@foreach($categories as $category)
					<section class="form__section form__section--small-margin-bottom">
						<input type="checkbox" id="category-{{ $category->id }}" class="js-filter" value="category-{{ strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $category->name)) }}">
						<label for="category-{{ $category->id }}" class="fa--after">
							{{ $category->name }}
						</label>
					</section>
				@endforeach

				<h5 class="large-margin-top">Tags</h5>
				@foreach($tags as $tag)
					<section class="form__section form__section--small-margin-bottom">
						<input type="checkbox" id="tag-{{ $tag->id }}" class="js-filter" value="tag-{{ $tag->name }}">
						<label for="tag-{{ $tag->id }}" class="fa--after">
							{{ $tag->name }}
						</label>
					</section>
				@endforeach
			</div>
		</div>

		<div class="col-12 col-md-8 col-lg-9 section section--small-spacing">
			<div class="row blog-posts">
				@forelse ($blog_posts as $blog_post)
					<div class="col-12 col-md-4 blog-posts__post blog-post @foreach ($blog_post->tag_names as $tag) tag-{{ $tag }}@endforeach category-{{ strtolower(preg_replace('/[^a-zA-Z0-9]/', '', $blog_post->category_name)) }}">
						<a href="{{ route('blog.post', ['blog_post' => $blog_post->slug]) }}" class="blog-post__inner">
							<img src="{{ $blog_post->image->path }}" class="blog-post__image">

							<div class="blog-post__details">
								<p class="blog-post__date">
								   {{ Carbon\Carbon::create($blog_post->live_at)->isoFormat('DD MMMM YYYY') }} 
								</p>

								<h2 class="blog-post__title">
									{{ $blog_post->title }}
								</h2>

								<h5 class="blog-post__subtitle">
									{{ $blog_post->subtitle }}
								</h5>
							</div>
						</a>
					</div>
				@empty
					<div class="col-12 blog-posts__post blog-post">
						<h2 class="text--align-center margin-bottom--none">
							Eerste post komt binnenkort!
						</h2>
					</div>
				@endforelse
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/isotope-layout@3/dist/isotope.pkgd.min.js"></script>

	<script>
		// Filter functionallity
		var $blogPosts = $('.blog-posts'),
			$blogPost = $('.blog-post'),
			$filterInput = $('.js-filter');

		$blogPosts.isotope({
			itemSelector: '.blog-post',
			layoutMode: 'masonry'
		});

		$filterInput.on('change', filterPosts);

		function filterPosts() {
			var searchQuery = [],
				urlCategories = [],
				urlTags = [],
				url = '/blog';

			$('.js-filter:checked').each(function() {
				var value = $(this).val(),
					valueArray = value.split(/-(.+)/);
				searchQuery.push('.' + value);

				if (valueArray[0] === 'category') urlCategories.push(valueArray[1]);
				else if (valueArray[0] === 'tag') urlTags.push(valueArray[1]);
			});

			$blogPosts.isotope({ filter: searchQuery.join(', ') });

			if (urlCategories.length > 0 || urlTags.length > 0) url += '?';
			if (urlCategories.length > 0) {
				url += 'categories=' + urlCategories.join(',');

				if (urlTags.length > 0) url += '&';
			}
			if (urlTags.length > 0) url += 'tags=' + urlTags.join(',');

			window.history.pushState('', '', url);
		}

		// Init filters from GET
		var urlParams = new URLSearchParams(window.location.search),
			urlTags = urlParams.has('tags') ? urlParams.get('tags').split(',') : [],
			urlCategories = urlParams.has('categories') ? urlParams.get('categories').split(',') : [];

		$filterInput.each(function() {
			var value = $(this).val().split(/-(.+)/);
			if (value[0] === 'category') {
				if (urlCategories.indexOf(value[1]) !== -1) $(this).attr('checked', 'checked');
			} else if (value[0] === 'tag') {
				if (urlTags.indexOf(value[1]) !== -1) $(this).attr('checked', 'checked');
			}
		});

		filterPosts();
	</script>

@endsection
