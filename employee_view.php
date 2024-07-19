<?php
$pagename='Master-Employee';
include 'header.php';
$select=mysqli_query($conn,'select * from emp_master');
?>
<link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">
 
<div class="container-fluid">
	<h1 class="h3 mb-4 text-gray-800">Employee Master</h1>
	<div class="card shadow mb-4">
		 <div class="card-body">
			<div class='col-md-12' align='right' style='margin:20px;'>
				<!--<a href='employee_upload.php' class='btn btn-primary'>Upload Employee</a>-->
				<a href='employee_add.php' class='btn btn-primary'>Add Employee</a>
			</div>
			
			<div class="table-responsive">
				<table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" style='font-size:14px;'>
					<thead>
						<tr>
							<th>EMP NO</th>
							<th>EMP NAME</th>
							<th>MAIL ID</th>
							<th>MOBILE</th>
							<th>DOJ</th>
							<th>STATUS</th>
							<th>EDIT</th>
						</tr>
					</thead>
					<tbody>
						<?php
						while($res=mysqli_fetch_array($select))
						{
						?>
						<tr>
							<td><?php echo $res['emp_no'];?></td> 
							<td><?php echo $res['emp_name'];?></td> 
							<td><?php echo $res['mail'];?></td> 
							<td><?php echo $res['mobile'];?></td> 
							<td><?php echo date('d-m-Y',strtotime($res['doj']));?></td> 
							<td><?php if($res['dol']!='9999-12-31') echo 'Inactive'; else echo 'Active';?></td> 
							<td><a href='employee_edit.php?emp_no=<?php echo base64_encode($res['emp_no']);?>'>Edit</a></td> 
						</tr>
						<?php
						}
						?>
					</tbody>
				</table>
			</div> 
	</div> 
</div>
<?php
include 'footer.php';
?>
<!-- Page level plugins -->
<script src="vendor/datatables/jquery.dataTables.min.js"></script>
<script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
<!-- Page level custom scripts -->
<script src="js/demo/datatables-demo.js"></script>