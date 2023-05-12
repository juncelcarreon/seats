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

	.draggable {
	  width: 75px;
	  height: 75px;
	  background: url('<?= base_url('assets/images/icon.png') ?>') no-repeat;
	  background-size: 100% 100%;
	  position: absolute;
	  top: 0;
	  right: 0;
	  cursor: move;
	  display: flex;
	  align-items: center;
	  justify-content: center;
	}

	.text {
	  color: #fff;
	  font-size: 14px;
	  font-weight: bold;
	  background: #000;
	  padding:5px;
	}

	#customMenu {
	  display: none;
	  width: 100px;
	  position: absolute;
	  background-color: #f1f1f1;
	  border: 1px solid #ccc;
	  box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.2);
	  font-size: 14px;
	  padding: 0;
	  z-index: 9999999;
	}

	#customMenu ul {
	  list-style: none;
	  padding: 0;
	  margin: 0;
	}

	.menu-item {
 	 padding: 8px 12px;
	  cursor: pointer;
	}

	.menu-item:hover {
	  background-color: #ddd;
	}
	</style>
</head>
<body>
	<div class="container">
		<div class="row justify-content-center align-content-center mt-4">
			<div class="col-md-12">
				<div class="float-end">
					<a href="javascript:;" class="btn btn-outline-success my-2 btn-sm" data-bs-toggle="modal" data-bs-target="#addTable">
						<svg xmlns="http://www.w3.org/2000/svg" width="15" height="15" fill="currentColor" class="bi bi-pencil" viewBox="0 0 16 16">
							<path d="M12.146.146a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1 0 .708l-10 10a.5.5 0 0 1-.168.11l-5 2a.5.5 0 0 1-.65-.65l2-5a.5.5 0 0 1 .11-.168l10-10zM11.207 2.5 13.5 4.793 14.793 3.5 12.5 1.207 11.207 2.5zm1.586 3L10.5 3.207 4 9.707V10h.5a.5.5 0 0 1 .5.5v.5h.5a.5.5 0 0 1 .5.5v.5h.293l6.5-6.5zm-9.761 5.175-.106.106-1.528 3.821 3.821-1.528.106-.106A.5.5 0 0 1 5 12.5V12h-.5a.5.5 0 0 1-.5-.5V11h-.5a.5.5 0 0 1-.468-.325z"></path>
                        </svg>
						&nbsp;Add Table
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
								<?php foreach($param_seats as $seat) { ?>
									<div class="draggable" id="draggable<?= $seat->idx ?>" data-new="0" data-name="<?= $seat->seat_name ?>" style="<?= $seat->style ?>"><span class="text"><?= $seat->seat_name ?></span></div>
								<?php } ?>
								</div>
								<div id="customMenu">
									<ul>
									    <li class="menu-item" data-rotation="0">Top</li>
									    <li class="menu-item" data-rotation="180">Bottom</li>
									    <li class="menu-item" data-rotation="90">Right</li>
									    <li class="menu-item" data-rotation="-90">Left</li>
									    <li class="menu-item">Rename</li>
									</ul>
								</div>
	                        </div>
	                    </div>
	                </div>
	            </div>
	        </div>
		</div>
	</div>
	<div class="modal fade" id="addTable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999;">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Table Name</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
		        <div class="col-md-12">
		            <div class="form-group my-2">
						<input type="text" class="form-control" id="tableName" placeholder="R101">
		            </div>
		        </div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-add">Add</button>
	      </div>
	    </div>
	  </div>
	</div>

	<div class="modal fade" id="editTable" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" style="z-index: 999999999;">
	  <div class="modal-dialog">
	    <div class="modal-content">
	      <div class="modal-header">
	        <h1 class="modal-title fs-5" id="exampleModalLabel">Table Name</h1>
	        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
	      </div>
	      <div class="modal-body">
	      	<div class="row">
		        <div class="col-md-12">
		            <div class="form-group my-2">
						<input type="text" class="form-control" id="tableEdit" placeholder="R101">
		            </div>
		        </div>
	      	</div>
	      </div>
	      <div class="modal-footer">
	        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
	        <button type="button" class="btn btn-primary" id="btn-update">Update</button>
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
var draggableCount = $('.draggable').length + 1;
function createDraggable(table_name = "") {
  var draggableId = "draggable" + draggableCount;
  var draggableElement = $("<div>", {
    class: "draggable",
    id: draggableId
  }).append($("<span>", { class: "text", text: table_name }));

  draggableElement.css({
  	position: "absolute",
  	top: "100px",
  	left: "100px"
  })
	draggableElement.draggable({
		containment: "parent"
	});

	draggableElement.on("contextmenu", function(e) {
      e.preventDefault();

      var customMenu = $("#customMenu");
      customMenu.css({
        top: (e.clientY - 100) + "px",
        left: (e.clientX - 100) + "px"
      });
      customMenu.show();
      customMenu.attr('data-draggable', $(this).attr('id'));
      customMenu.attr('data-name', $(this).attr('data-name'));
    });

	draggableElement.attr('data-new', 1);
	draggableElement.attr('data-name', table_name);

  $("#parentDiv").append(draggableElement);
  draggableCount++;
}
$(function(e) {
	$(".draggable").draggable({
		containment: "parent"
	});

    $(".draggable").on("contextmenu", function(e) {
      e.preventDefault();

      var customMenu = $("#customMenu");
      customMenu.css({
        top: (e.clientY - 100) + "px",
        left: (e.clientX - 100) + "px"
      });
      customMenu.show();
      customMenu.attr('data-draggable', $(this).attr('id'));
      customMenu.attr('data-name', $(this).attr('data-name'));
    });

    $(".menu-item").on("click", function() {
      var draggableId = $("#customMenu").attr('data-draggable');
      var name = $("#customMenu").attr("data-name");
      var rotation = $(this).data("rotation");

      if(rotation === undefined) {
      	$('#editTable').modal('show');
      	$('#editTable').attr('data-id', draggableId);
      	$('#tableEdit').val(name);
      	$("#customMenu").hide();
      	return false;
      }

      $("#"+draggableId).css("transform", "rotate(" + rotation + "deg)");
      $("#customMenu").hide();
    });

    $(document).on("click", function() {
      $("#customMenu").hide();
    });

    $('#btn-add').click(function(e) {
    	e.preventDefault();

    	if($('#tableName').val() == "") {
    		alert('Add Table Name');

    		$('#tableName').addClass('border-danger');
    		$('#tableName').focus();

    		return false;
    	}

    	createDraggable($('#tableName').val());

    	$('#addTable').modal('hide');
    	$('#tableName').val("");
    });

    $('#btn-update').click(function(e) {
    	e.preventDefault();

    	if($('#tableEdit').val() == "") {
    		alert('Add Table Name');

    		$('#tableEdit').addClass('border-danger');
    		$('#tableEdit').focus();

    		return false;
    	}

    	$('#'+$('#editTable').attr('data-id')).find('span').text($('#tableEdit').val());

    	$('#editTable').modal('hide');
    	$('#tableEdit').val("");
    });
});
</script>
</html>