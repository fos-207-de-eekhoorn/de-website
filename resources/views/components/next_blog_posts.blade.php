<div class="row @if (isset($align) && $align === 'center') justify-content-center @endif">
    @forelse ($next_blog_posts as $next_post)
        <div class="col-12 @if(isset($columns) && $columns == 2) col-md-6 @endif section section--extra-small-spacing">
            <div class="blog-post-small">
                <a href="{{ route('blog.post', ['blog_post' => $next_post->slug]) }}" class="blog-post-small__inner">
                    <div class="blog-post-small__image aspect-ratio">
                        <div class="aspect-ratio__container">
                            <img src="{{ $next_post->image->path }}" class="aspect-ratio__inner">
                        </div>
                    </div>

                    <div class="blog-post-small__info">
                        <h5 class="blog-post-small__title">{{ $next_post->title }}</h5>
                        <p class="blog-post-small__date">
                            <span class="fa--before icon"><i class="fas fa-calendar-day"></i></span>{{ Carbon\Carbon::parse($next_post->live_at)->isoFormat('DD MMMM YYYY') }}
                        </p>
                    </div>
                </a>
            </div>
        </div>
    @empty
        <div class="col-12">
            <p class="@if (isset($align) && $align === 'center') text--align-center @endif">
                Nieuwe posts komen binnenkort!
            </p>
        </div>
    @endforelse
</div>

@if (isset($with_link) && $with_link)
    <p class="text--align-right small-margin-top no-margin-bottom">
        <a href="{{ route('blog') }}" class="text--align-right">
            Alle posts<span class="fa--after"><i class="fas fa-angle-right"></i></span>
        </a>
    </p>
@endif