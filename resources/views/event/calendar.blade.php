@php
use Carbon\Carbon;
use App\Models\Event;

$date->startOfDay();

$today = new Carbon();
$today->startOfDay();
$month = $date->month;
$next = $month + 1;
$last = $date->copy()->addMonth();
$last->day = 1;
$last->addDays(7 - $last->dayOfWeek);
$day = $date->copy()->firstOfMonth();
$day->day = 1;
$day->subDays($day->dayOfWeek - 1);

$nextMonth = $date->copy()->addMonth();
$lastMonth = $date->copy()->subMonth();

@endphp
<div class="row">
	<div class="col">
	{{ $date->format('F, Y') }}
	</div>
</div>
<hr>
<div class="row">
	<div class="col-md-auto col-6 px-1 order-1 order-md-0">
		<button class="btn btn-primary btn-block h-100" type="button"
			onclick="calendar.getMonth('{{ $lastMonth->toDateString() }}')">
			<i class="fa fa-arrow-left"></i>
		</button>
	</div>
	<div class="col-md col-12 order-0 order-md-1">
		<div class="row text-center">
			<div class="col p-0 m-1">Mon</div>
			<div class="col p-0 m-1">Tue</div>
			<div class="col p-0 m-1">Wed</div>
			<div class="col p-0 m-1">Thu</div>
			<div class="col p-0 m-1">Fri</div>
			<div class="col p-0 m-1">Sat</div>
			<div class="col p-0 m-1">Sun</div>
		</div>
	@for ($i = 0; $day <= $last; $i++)
		@if ($i % 7 == 0)
		<div class="row text-center">
		@endif
		@php
		$classes = ['col', 'p-0', 'm-1', 'rounded', 'text-white'];
		if ($day == $today) {
			$classes[] = 'bg-success';
		} elseif ($day->month == $month) {
			$classes[] = 'bg-primary';
		} else {
			$classes[] = 'bg-secondary';
		}
		@endphp
				
			@auth
				<a class="{{ implode(' ', $classes) }}" href="#{{ $day->toDateString() }}"
					onclick="calendar.getDay('{{ $day->toDateString() }}')">
					{{ $day->day }}
				@if (array_key_exists($day->toDateString(), $events))
					<div class="badge border border-warning badge-warning position-absolute" 
						style="top: -.5rem; right: -.5rem;">
						{{ count($events[$day->toDateString()]) }}
					</div>
				@endif
				</a>
			@else
				<div class="{{ implode(' ', $classes) }}">{{ $day->day }}</div>
			@endauth
	
		@if (($i+1) % 7 == 0)
		</div>
		@endif
		@php
			$day->addDay();
		@endphp
	@endfor
	</div>
	<div class="col-md-auto col-6 px-1 order-2">
		<button class="btn btn-primary btn-block h-100" type="button"
			onclick="calendar.getMonth('{{ $nextMonth->toDateString() }}')">
			<i class="fa fa-arrow-right"></i>
		</button>
	</div>
</div>