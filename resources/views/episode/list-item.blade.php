<div class="list-group-item">
	<h2>{{ $episode->name }}</h2>
	<p class="text-muted">{{ $episode->posted_at->diffForHumans() }}</p>
	<p>{{ $episode->description }}</p>
	<div class="embed-responsive embed-responsive-16by9">
	<iframe class="embed-responsive-item" src="https://www.youtube.com/embed/{{ $episode->yid }}" 
		frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
	</div>
</div>