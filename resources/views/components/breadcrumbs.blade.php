<div class="breadcrumbs">
	@if (isset($childs))
		@foreach ($childs as $child)
			<a href="{{ url($child->link) }}">{{ $child->name }}</a> /
		@endforeach
	@endif
	<span class="breadcrumbs__current">{{ $current }}</span>
</div>