<div class="col-xs-6 col-md-4 blog-sidebar">
	<h2>Archives</h2>
	<ul>
		@foreach ($archives as $archive)
			<li>
				<a href="?year={{$archive->year}}&month={{$archive->month}}"/>
				{{ $archive->year }}
				{{ $archive->month }}
				({{ $archive->published }})
				</a>
			</li>
		@endforeach
	</ul>
</div>
