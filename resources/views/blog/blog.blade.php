@extends('layouts.main')

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
		<div class="col-12 col-md-4 col-lg-3">
			<h3>Filter</h3>
		</div>

		<div class="col-12 col-md-8 col-lg-9">
			<div class="row blog-posts">
				@forelse ($posts as $post)
					<div class="col-12 col-md-4 blog-posts__post blog-post">
						<a href="{{ url('/blog/' . str_replace('?', '', str_replace(' ', '-', strtolower($post->title)))) }}" class="blog-post__inner">
							<img src="{{ $post->image->path }}" class="blog-post__image">

							<div class="blog-post__details">
								<p class="blog-post__date">
								   {{ Carbon\Carbon::create($post->live_at)->format('jS \\of F Y') }} 
								</p>

								<h2 class="blog-post__title">
									{{ $post->title }}
								</h2>

								<h5 class="blog-post__subtitle">
									{{ $post->subtitle }}
								</h5>
							</div>
						</a>
					</div>
				@empty
					<div class="col-12 col-md-4 col-lg-3 blog-posts__post blog-post">
						<h2 class="text--align-center margin-bottom--none">
							Eerste post komt binnenkort!
						</h2>
					</div>
				@endforelse
			</div>
		</div>
	</div>

	<script src="https://unpkg.com/masonry-layout@4/dist/masonry.pkgd.min.js"></script>

	<script>
		$('.blog-posts').masonry({
			itemSelector: '.blog-post',
		});
	</script>

@endsection
