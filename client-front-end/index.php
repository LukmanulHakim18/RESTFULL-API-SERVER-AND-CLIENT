<!DOCTYPE html>
<html>
<head>
	<title>Belajar Menggunakan API Client Toko Mobil Pak Ali</title>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
		<br />

		<h3 align="center">REST API Client Toko Mobil Pak Ali</h3>
		<br />
		<div align="right" style="margin-bottom:5px;">
			<button type="button" name="add_button" id="add_button" class="btn btn-success btn-xs">Add</button>
		</div>
		<form class="form-inline .mx-sm-3 mb-2">
			<div class="form-group mx-sm-3 mb-2">
				<label  class="sr-only">Brand</label>
				<input type="text" class="form-control" id="serch_merek" value="" name="serch_merek"placeholder="Brand">
			</div>
			<div class="form-group .mx-sm-3 mb-2">
				<label  class="sr-only">Tipe</label>
				<input type="text" class="form-control" id="serch_tipe" value="" name="serch_tipe" placeholder="Type">
			</div>
			<button type="button" name="serch_button" id="serch_button" class="btn btn-primary mb-2">Serch</button>
		</form>
		<br>
		<div class="table-responsive">
			<table class="table table-bordered table-striped">
				<thead>
					<tr>
						<th>Nomor Rangka</th>
						<th>No Polisi</th>
						<th>Merek</th>
						<th>Tipe</th>
						<th>Tahun</th>
						<th width="15%">Aksi</th>
					</tr>
				</thead>
				<tbody></tbody>
			</table>
		</div>
	</div>
</body>
</html>

<div id="apicrudModal" class="modal fade" role="dialog">
	<div class="modal-dialog">
		<div class="modal-content">
			<form method="post" id="api_crud_form">
				<div class="modal-header">
					<button type="button" class="close" data-dismiss="modal">&times;</button>
					<h4 class="modal-title">Add Data</h4>
				</div>
				<div class="modal-body">
					<div class="form-group">
						<label>Nomor Rangka</label>
						<input type="text" name="no_rangka" id="no_rangka" class="form-control" />
					</div>
					<div class="form-group">
						<label>No Polisi</label>
						<input type="text" name="no_polisi" id="no_polisi" class="form-control" />
					</div>
					<div class="form-group">
						<label>Merek</label>
						<input type="text" name="merek" id="merek" class="form-control" />
					</div>
					<div class="form-group">
						<label>Tipe</label>
						<input type="text" name="tipe" id="tipe" class="form-control" />
					</div>
					<div class="form-group">
						<label>Tahun</label>
						<input type="text" name="tahun" id="tahun" class="form-control" />
					</div>
				</div>
				<div class="modal-footer">
					<input type="hidden" name="hidden_id" id="hidden_id" />
					<input type="hidden" name="action" id="action" value="insert" />
					<input type="submit" name="button_action" id="button_action" class="btn btn-info" value="Insert" />
					<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
				</div>
			</form>
		</div>
	</div>
</div>


<script type="text/javascript">


	$(document).ready(function(){

		fetch_data();

		function fetch_data()
		{	
			$.ajax({
				url:"fetch.php",
				success:function(data)
				{
					$('tbody').html(data);
				}
			})
		}

		$('#serch_button').click(function(){
			var merek =$('#serch_merek').val();
			var tipe =$('#serch_tipe').val();
			var uri="fetch_custom.php?merek="+merek+"&type="+tipe+"";
				
				$.ajax({
				url:uri,
				success:function(data)
				{
					$('tbody').html(data);
				}
			})
		});	

		$('#add_button').click(function(){
			$('#hidden_id').val("");
			$('#no_rangka').val("");
			$('#no_polisi').val("");
			$('#merek').val("");
			$('#tipe').val("");				
			$('#tahun').val("");	
			$('#action').val('insert');
			$('#button_action').val('Insert');
			$('.modal-title').text('Add Data');
			$('#apicrudModal').modal('show');
		});

		$('#api_crud_form').on('submit', function(event){
			event.preventDefault();
			if($('#no_rangka').val() == '')
			{
				alert("Masukan No rangka");
			}
			else if($('#no polisi').val() == '')
			{
				alert("Masukan no polisi");
			}
			else if($('#merek').val() == '')
			{
				alert("Masukan Merek");
			}
			else if($('#tipe').val() == '')
			{
				alert("Masukan Tipe");
			}
			else if($('#tahun').val() == '')
			{
				alert("Masukan tahun");
			}
			else
			{
				var form_data = $(this).serialize();
				$.ajax({
					url:"action.php",
					method:"POST",
					data:form_data,
					success:function(data)
					{
						fetch_data();
						$('#api_crud_form')[0].reset();
						$('#apicrudModal').modal('hide');

						if(data == 'input')
						{
							alert("Data Inserted menggunakan PHP API");
						}
						if(data == 'update')
						{
							alert("Data Updated menggunakan PHP API");
						}
					}
				});
			}
		});

		$(document).on('click', '.edit', function(){
			var id = $(this).attr('id');
			var action = 'fetch_single';
			$.ajax({
				url:"action.php",
				method:"POST",
				data:{id:id, action:action},
				dataType:"json",
				success:function(data)
				{
					$('#hidden_id').val(id);
					$('#no_rangka').val(data.data[0].no_rangka);
					$('#no_polisi').val(data.data[0].no_polisi);
					$('#merek').val(data.data[0].merek);
					$('#tipe').val(data.data[0].tipe);				
					$('#tahun').val(data.data[0].tahun);	
					$('#action').val('update');
					$('#button_action').val('Update');
					$('.modal-title').text('Edit Data');
					$('#apicrudModal').modal('show');

				}
			})
		});

		$(document).on('click', '.delete', function(){
			var id = $(this).attr("id");
			var action = 'delete';
			if(confirm("Are you sure you want to remove this data using PHP API?"))
			{

				$.ajax({
					url:"action.php",
					method:"POST",
					data:{id:id, action:action},
					success:function(data)
					{
						fetch_data();
						alert("Data Deleted using PHP API");
					}
				});
			}
		});

	});
</script>