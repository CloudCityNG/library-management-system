<div id="page-wrapper">
	<div class="container-fluid">
		<h3 class="page-header">Members with Active Account</h3>
	</div>
	<div class="container-fluid">
		<div class="panel-heading">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<th><h5>Member ID</h5></th>
					<th><h5>Name</h5></th>
					<th><h5>Contact</h5></th>
					<th><h5>Fee</h5></th>
					<th><h5>Start</h5></th>
					<th><h5>End</h5></th>
				</thead>
				<tbody>
					<?php if($activeFee=='No records found')
						echo "<h4><strong>No records were found</strong></h4>";
						else{
							
							foreach($activeFee->result_array() as $active){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$active['member_id']."</td>";
								echo "<td>".$active['first_name']." ".$active['last_name']."</td>";
								echo "<td>".$active['contact_1']."<br>".$active['email']."</td>";
								echo "<td>".$active['amount']."</td>";
								echo "<td>".$active['start_date']."</td>";
								echo "<td>".$active['end_date']."</td>";
								echo "</tr>";
							}
						}
					 ?>
				</tbody>
			</table>
			<div class="col-sm-offset-19" style="font-size: 1.3em; letter-spacing: 3px; text-decoration: none">
				<?php echo $this->pagination->create_links();?>
			</div>
		</div>
	</div>
</div>