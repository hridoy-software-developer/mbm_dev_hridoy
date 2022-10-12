<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />
	<link href="{{ asset('css/app.css') }}" rel="stylesheet" />
	<script src="{{ asset('js/app.js') }}" defer></script>
	<script src="{{ asset('js/jquery.min.js') }}" defer></script>
	<script src="{{ asset('js/popper.min.js') }}" defer></script>
	<script src="{{ asset('js/bootstrap.min.js') }}" defer></script>
	<script src="{{ asset('js/spur.js') }}" defer></script>
</head>
<body>
	@inertia

	<script type="text/javascript">
		window.baseURL = "<?php echo config('app.url') ?>";
	</script>

</body>
</html>