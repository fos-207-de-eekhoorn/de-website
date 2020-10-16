@extends('layouts.main')

@section('content')

    {{-- List --}}
    {{-- ================================================================ --}}
    <section class="section section--small-padding cs-grey-light">
        <div class="container">
            <div class="row">
                <div class="col-12">
					<nav class="admin-blog-nav">
						<ul class="admin-blog-nav__list">
							<li class="admin-blog-nav__list-item">
								<a href="{{ url('/admin/blog/posts') }}" class="admin-blog-nav__link{{ Request::is('admin/blog/posts*') ? ' admin-blog-nav__link--active' : '' }}">
									Posts
								</a>
							</li>

							<li class="admin-blog-nav__list-item">
								<a href="{{ url('/admin/blog/categories') }}" class="admin-blog-nav__link{{ Request::is('admin/blog/categories*') ? ' admin-blog-nav__link--active' : '' }}">
									Categories
								</a>
							</li>

							<li class="admin-blog-nav__list-item">
								<a href="{{ url('/admin/blog/tags') }}" class="admin-blog-nav__link{{ Request::is('admin/blog/tags*') ? ' admin-blog-nav__link--active' : '' }}">
									Tags
								</a>
							</li>
						</ul>
					</nav>
				</div>

				@yield('main')
			</div>
		</div>
	</section>

	@yield('extra-sections', '');

@endsection