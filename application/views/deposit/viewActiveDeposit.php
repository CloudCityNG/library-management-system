<div id="page-wrapper">
	<div class="container-fluid">
		<h3 class="page-header">Active Deposit History</h3>
	</div>
	<div class="container-fluid">
		<div class="table-responsive">
			<table class="table table-striped table-bordered table-hover" id="dataTables-example">
				<thead>
					<th><h4>Member ID</h4></th>
					<th><h4>Name</h4></th>
					<th><h4>Contact</h4></th>
					<th><h4>Deposit Amount</h4></th>
					<th><h4>Date</h4></th>
				</thead>
				<tbody>
					<?php if($activeDeposit=='No records found')
						echo "<h2>No records were found!</h2>";
						else{
							
							foreach($activeDeposit->result_array() as $d){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$d['member_id']."</td>";
								echo "<td>".$d['first_name']." ".$d['last_name']."</td>";
								echo "<td>".$d['contact_1']."<br>".$d['email']."</td>";
								echo "<td>".$d['amount']."</td>";
								echo "<td>".date('d-m-Y', strtotime($d['date']))."</td>";
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