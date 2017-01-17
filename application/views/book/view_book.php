<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 25/6/15
 * Time: 12:48 PM
 */
?>

	<div class="row">
		<div class="page-header">
			<h3>VSM Library</h3>
		</div>
	</div>
	<div class="col-sm-12">
		<div class="panel panel-success">
			<div class="panel-heading" style="text-align: center">
				<h3>Book Database</h3>
			</div>
			<!-- /.panel-heading -->
			<div class="panel-body">
				<div class="table-responsive">
					<table class="table table-striped table-bordered table-hover" id="dataTables-example">
						<thead>
							<tr>
								<th>Sr. No</th>
								<th>Book ID</th>
								<th>Title</th>
								<th>BookType</th>
								<th>Cost</th>
								<!--<th>Blood Group</th>-->
								<th>Purchase Date</th>
								<!--<th>Status</th>-->
							</tr>
						</thead>
						<tbody>
							<?php
								$i=1;
								foreach($details->result_array() as $fetchrow){
									//$myid=$fetchrow['book_id'];
									$name="";
									$id="";
									if($fetchrow['book_type']=="Educational"){
										$name = $fetchrow['book_id'];
										$id = $fetchrow['book_name'];
									}
									else if($fetchrow['book_type']=="Novel"){
										$name = $fetchrow['novel_id'];
										$id = $fetchrow['novel_name'];
									}
									else if($fetchrow['book_type']=="Magazine"){
										$name = $fetchrow['magazine_id'];
										$id = $fetchrow['magazine_name'];
									}
									echo "<tr class='odd gradeX'>
									<td>".$i++."</td><td>".$id."</td>";
									echo "<td>".$name."</td>";
									echo "<td>".$fetchrow['book_type'];
									echo "<td>Rs. ".$fetchrow['cost'];
									//echo "<td>".$fetchrow['blood_group']."</td>";
									echo "<td>".date('d-m-Y', strtotime($fetchrow['purchase_date']))."</td>";
								}
							?>
						</tbody>
					</table>
				</div>
			</div>
			<div class="panel-footer">
				<div class="col-sm-offset-9" style="font-size: 1.3em; letter-spacing: 3px; font-style: italic; text-decoration: none">
					<?php echo $this->pagination->create_links();?>
				</div>
			</div>
		</div>
	</div>
