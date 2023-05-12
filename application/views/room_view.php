<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Rooms List</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
	<style type="text/css">
	#parentDiv {
	  width: 100%;
	  height: 450px;
	  border: 1px solid black;
	  position: relative;
	}

	#draggableDiv {
	  width: 100px;
	  height: 100px;
	  background: url('<?= base_url('assets/images/icon.png') ?>');
	  position: absolute;
	  top: 50px;
	  left: 50px;
	  cursor: move;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center align-content-center mt-4">
			<div class="col-md-12">
				<div class="float-end">
					<a href="<?= base_url("room/edit/{$param_room->idx}") ?>" class="btn btn-outline-success my-2 btn-sm">
						<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
							<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                        </svg>
						&nbsp;Edit Room
					</a>
				</div>
			</div>
		</div>

		<div class="row justify-content-center align-content-center mt-4">
			<div class="col-md-12">
	            <div class="card">
	                <div class="card-header bg-danger text-light">
	                    <h5 class="mb-0"><?= $param_room->room_name ?></h5>
	                </div>
	                <div class="card-body">
	                    <div class="row">
	                        <div class="col-md-12">
								<div id="parentDiv">
									<div id="draggableDiv"></div>
								</div>
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
<script src="https://code.jquery.com/ui/1.13.0/jquery-ui.min.js"></script>
<script type="text/javascript">
$(function(e) {
	$("#draggableDiv").draggable({
		containment: "parent"
	});
});
</script>
</html>