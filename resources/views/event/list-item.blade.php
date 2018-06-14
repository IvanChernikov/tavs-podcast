<div class="list-group-item">
	<button class="btn btn-info" onclick="$(this).next().toggle()">{{ $event->name }}</button>
	<div class="border" style="display:none">
		<p>{{ $event->description }}</p>
		<p>{{ $event->starts_at }}</p>
		<p>{{ $event->type }}</p>
	</div>
</div>