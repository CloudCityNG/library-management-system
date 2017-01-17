

<div id="page-wrapper">
	<div class="row">
			<div class="page-header">
				<h3>VSM Library</h3>
			</div>
	</div>
	<div class="col-sm-12">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="text-align: center">
                            <h3>Transaction History</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                    <th><h4>Transaction ID</h4></th>
					<th><h4>Member ID</h4></th>
					<th><h4>Book ID</h4></th>
					<th><h4>Book Type</h4></th>
					<th><h4>Issue Date</h4></th>
					<th><h4>Return Date</h4></th>
					<th><h4>Returned Date</h4></th>
					
					
				</thead>
				<tbody>
					<?php if($transactionHistory=='No records found')
						echo "<h2>No records found!</h2>";
						else{
							
							foreach($transactionHistory->result_array() as $d){
								echo "<tr class='odd gradeX'>";
								echo "<td>".$d['t_id']."</td>";
								echo "<td>".$d['member_id']."</td>";
								echo "<td>".$d['book_id']."</td>";
								echo "<td>".$d['book_type']."</td>";
								echo "<td>".date('d-m-Y', strtotime($d['issue_date']))."</td>";
								echo "<td>".date('d-m-Y', strtotime($d['return_date']))."</td>";
								echo "<td>".date('d-m-Y', strtotime($d['returned_on']))."</td>";
								echo "</tr>";
							}
						}
					 ?>
				</tbody>

                </table>
                </div>
         </div>
				<div class="panel-footer">
					<div class="col-sm-offset-19" style="font-size: 1.3em; letter-spacing: 3px; font-style: italic; text-decoration: none">

					<?php echo $this->pagination->create_links();?>

						</div>
					</div>
                   </div>
                </div>
            </div>

