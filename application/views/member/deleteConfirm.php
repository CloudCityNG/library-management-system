<div id="page-wrapper">
	<div class="row">
		<div class="page-header">
			<h2>Delete Confirmation</h2>
		</div>
	</div>
	<div class="col-md-offset-2 col-md-8 col-sm-12">
		<div class="panel panel-info">
			<div class="panel-heading">
				<div class="panel-title"><h3>Verify Member Details</h3></div>
			</div>
			<div class="panel-body">
				<?php foreach($details->result_array() as $fetchrow){ ?>
				<?php
					$amount = $fetchrow['amount'];
					$date = $fetchrow['date'];
					$booklet = $fetchrow['booklet'];
					$receipt = $fetchrow['receipt'];
				?>
				<h3>Member ID: <?php echo $fetchrow['member_id']; ?>&emsp;<button type='button' class='btn btn-sm btn-default' data-toggle='modal' data-target='#myModal'><strong>Deposit Information</strong></button></h3>
				<hr>
				<h2><?php echo $fetchrow['first_name'].' '.$fetchrow['middle_name'].' '.$fetchrow['last_name']; ?></h2>
				<hr>
				<h4>Date of Joining</h4>
				<h4><?php echo $fetchrow['date_of_joining']; ?></h4>
				<hr>
				<h4><?php echo $fetchrow['gender']; ?></h4>
				<hr>
				<?php if($fetchrow['status']=='1'){
					echo "<h4 style='color: green'><strong>Active</strong></h4><hr>";
				}
				else{
					echo "<h4 style='color: red'><strong>Inactive</strong></h4><hr>";
				}
				?>
				<?php if($fetchrow['status']=='1'){ ?>
				<a href="<?php echo PATH ?>member/deleteMember/<?php echo $fetchrow['member_id']; ?>"><button class="btn btn-danger btn-lg btn-block">Return Deposit and Delete Member</button></a>
				<?php }
				else{
					echo "<h4>This member is already deleted</h4>";
				}
			}
				?>
			</div>
		</div>
	</div>
</div>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h3 class="modal-title" id="myModalLabel">Deposit Information</h3>
      </div>
      <div class="modal-body">
        <h4>Amount: <?php echo $amount;?></h4>
        <h4>Date: <?php echo $date;?></h4>
        <h4>Booklet No: <?php echo $booklet;?></h4>
        <h4>Receipt No: <?php echo $receipt;?></h4>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
