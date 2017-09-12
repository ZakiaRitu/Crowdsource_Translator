@if($success = Session::get('success'))
<script>
	$(document).ready(function() {
		setTimeout(function() {
			toastr.options = {
				closeButton: true,
				progressBar: true,
				showMethod: 'slideDown',
				timeOut: 4000
			};
			toastr.success('Crowdsource Translator', "<?php echo $success ?>");

		}, 1300);

	});
</script>
@endif

@if($error = Session::get('error'))
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				toastr.options = {
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',
					timeOut: 4000
				};
				toastr.error('Crowdsource Translator', "<?php echo $error ?>");

			}, 1300);

		});
	</script>
@endif

@if($warning = Session::get('warning'))
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				toastr.options = {
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',
					timeOut: 4000
				};
				toastr.warning('Crowdsource Translator', "<?php echo $warning ?>");

			}, 1300);

		});
	</script>
@endif

@if($info = Session::get('info'))
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				toastr.options = {
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',
					timeOut: 4000
				};
				toastr.info('Crowdsource Translator', "<?php echo $info ?>");

			}, 1300);

		});
	</script>
@endif


@if (!$errors->isEmpty())
	@foreach($errors->all() as $error)
	<script>
		$(document).ready(function() {
			setTimeout(function() {
				toastr.options = {
					closeButton: true,
					progressBar: true,
					showMethod: 'slideDown',
					timeOut: 4000
				};
				toastr.error('Crowdsource Translator', "<?php echo $error ?>");

			}, 1300);

		});
	</script>
	@endforeach
@endif