@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <!-- Left Col -->
		<div class="col-md-8">
            <div class="card">
                <div class="card-header">Latest Episodes</div>

                <div class="card-body">
					@include('episode.list')
                </div>
            </div>
        </div>
		<!-- Right Col -->
		<div class="col-md-4" id="CalendarContainer">
			{!! $calendar !!}
			
		</div>
    </div>
</div>
@endsection

@push ('js')
<script>
calendar = {
	getMonth: function (date) {
		$.get('{{ route('calendar.month') }}', {
				date: date
			}, function (html) {
				$('#CalendarContainer').html(html); 
			});
	},
	getDay: function (date) {
		$('#EventModal').find('.modal-body')
			.html('<h2 class="text-center"><i class="fa fa-sync fa-spin fa-2x"></i><br>Loading...</h2>')
		$('#EventModal').modal('toggle');
		$.get('{{ route('calendar.day') }}', {
				date: date
			}, function (html) {
				$('#EventModal').find('.modal-body').html(html);
				$('#NewEventForm [name="starts_at"]').val(function () {
					var time = this.value.split('T')[1];
					return `${date}T${time}`;
				});
			});
	}
}
</script>
@endpush

@push ('modal')

@component ('component.modal')
	@slot ('id') EventModal @endslot
	@slot ('title') Schedule @endslot
	
	<h2><i class="fa fa-sync fa-spin"></i> Loading...</h2>
	
	@slot ('footer')
	@endslot
@endcomponent

@endpush
