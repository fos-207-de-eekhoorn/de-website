@extends('layouts.main')

@section('content')

	@yield('banner')

    <div class="row section section--small-spacing">
        <div class="col-12">
        	@yield('breadcrumbs')

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
	</div>

	@yield('main')

@endsection