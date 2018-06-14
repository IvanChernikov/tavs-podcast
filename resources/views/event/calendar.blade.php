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
<div class="input-group">
	<div class="input-group-prepend">
		<button class="btn btn-primary btn-block h-100" type="button"
			onclick="calendar.getMonth('{{ $lastMonth->toDateString() }}')">
			<i class="fa fa-arrow-left"></i>
		</button>
	</div>
	<input class="form-control disabled text-center" type="text" 
		value="{{ $date->format('F, Y') }}" disabled>
	<div class="input-group-append">
		<button class="btn btn-primary" type="button"
			onclick="calendar.getMonth('{{ $nextMonth->toDateString() }}')">
			<i class="fa fa-arrow-right"></i>
		</button>
	</div>
</div>
<div class="text-center d-flex flex-row justify-content-around">
	@foreach (['Mon','Tue','Wed','Thu','Fri','Sat','Sun'] as $wd)
	<div class="d-none d-lg-block" style="flex-basis: calc(100% / 7)">{{ $wd }}</div>
	<div class="d-sm-block d-md-block d-lg-none" style="flex-basis: calc(100% / 7)">{{ substr($wd,0, 1) }}</div>
	@endforeach
</div>
@for ($i = 0; $day <= $last; $i++)
	@if ($i % 7 == 0)
<div class="text-center d-flex flex-row justify-content-around">
	@endif
	@php
	$classes = [ 'm-1', 'rounded', 'text-white', 'position-relative'];
	if ($day == $today) {
		$classes[] = 'bg-success';
	} elseif ($day->month == $month) {
		$classes[] = 'bg-primary';
	} else {
		$classes[] = 'bg-secondary';
	}
	@endphp
			
		
		<a class="{{ implode(' ', $classes) }}" href="#{{ $day->toDateString() }}"
			onclick="calendar.getDay('{{ $day->toDateString() }}')"
			style="flex-basis: calc(100% / 7)">
			{{ $day->day }}
		@if (array_key_exists($day->dayOfYear, $events))
			<div class="badge border border-warning badge-warning position-absolute" 
				style="top: -.5rem; right: -.5rem;">
				{{ count($events[$day->dayOfYear]) }}
			</div>
		@endif
		</a>
		@auth
			<!--<div class="{{ implode(' ', $classes) }}" style="flex-basis: calc(100% / 7)">{{ $day->day }}</div>-->
		@endauth

	@if (($i+1) % 7 == 0)
	</div>
	@endif
	@php
		$day->addDay();
	@endphp
@endfor
</div>