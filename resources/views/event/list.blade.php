<h2>{{ $date }}</h2>
<div class="list-group list-group-flush">

@foreach ($events as $event)
	@include ('event.list-item')
@endforeach
</div>