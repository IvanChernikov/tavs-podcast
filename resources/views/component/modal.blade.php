<div class="modal" tabindex="-1" role="dialog"
	id="{{ trim($id) }}">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">
				{{ $title }}
				</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true"><i class="fa fa-times"></i></span>
			</button>
			</div>
			<div class="modal-body">
			{{ $slot }}
			</div>
			<div class="modal-footer">
			{{ $footer }}
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>