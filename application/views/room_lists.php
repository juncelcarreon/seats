<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rooms List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>
<body>
	<div class="container">
		<div class="row justify-content-center align-content-center vh-100">
			<div class="col-md-4">
				<div class="card p-4 shadow">
					<h5 class="text-center my-2">Select Room</h5>
				    <div class="row">
				        <div class="col-md-12">
				            <div class="form-group my-2">
								<select class="form-select" id="select-room">
							<?php foreach($param_rooms as $room) { ?>
									<option value="<?= $room->idx ?>"><?= $room->room_name ?></option>
							<?php } ?>
								</select>
				            </div>
				        </div>
				        <div class="col-md-12">
				            <div class="form-group text-center my-1">
				                <button class="btn btn-primary" id="btn-continue">Continue</button>
				            </div>
				        </div>
				    </div>
				</div>
			</div>
		</div>
	</div>
</body>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.min.js" integrity="sha384-cuYeSxntonz0PPNlHhBs68uyIAVpIIOZZ5JqeqvYYIcEL727kskC66kF92t6Xl2V" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script type="text/javascript">
$(function(e) {
	$('#btn-continue').click(function(e) {
		e.preventDefault();

		window.location.href = '<?= base_url() ?>room/view/' + $('#select-room').val();
	});
});
</script>
</html>