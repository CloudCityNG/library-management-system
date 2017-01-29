<div id="page-wrapper">
	<div class="container-fluid">
		<h3 class="page-header">
			Add Received Deposit
		</h3>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-sm-12">
				<form method="POST" action="<?php echo URL . "index.php/deposit/addDeposit"; ?>">
					<div class="row">
						<div class="form-group col-md-12">
							<label for="member_id"><h5>Select Member *</h5></label>
							<select class="form-control select-plugin" name="member_id" id="member_id" required>
			                    <option value="">Select Member</option>
			                    <?php foreach($member->result_array() as $m){
			                        extract($m);
			                        echo "<option value='".$member_id."' >".$first_name.' '.$middle_name.' '.$last_name."</option>";
			                    } ?>
		                	</select>
		                	<p class="help-block">Select the member whose deposit is to be added</p>
						</div>

						<div class="form-group col-md-3 col-sm-6 col-xs-12">
							<label for="amount"><h5>Amount *</h5></label>
							<input class="form-control" type="text" name="amount" id="amount" readonly placeholder="Enter the amount" value="<?php echo $deposit; ?>" />
						</div>

						<div class="form-group col-md-3 col-sm-6 col-xs-12">
							<label for="date"><h5>Date *</h5></label>
							<input class="form-control datepicker" type="text" name="date" id="date" required placeholder="Enter the date of reception" />
						</div>

						<div class="form-group col-md-3 col-sm-6 col-xs-12">
							<label for="booklet"><h5>Booklet No *</h5></label>
							<input class="form-control" type="text" name="booklet" id="booklet" required placeholder="Enter the Booklet No" />
						</div>

						<div class="form-group col-md-3 col-sm-6 col-xs-12">
							<label for="receipt"><h5>Receipt No *</h5></label>
							<input class="form-control" type="text" name="receipt" id="receipt" required placeholder="Enter the Receipt No" />
						</div>

					</div>

					<div class="row">
						
						<div class="form-group col-md-offset-3 col-md-6 col-sm-12">
							<button class="btn btn-block btn-success" type="submit" name="submitDeposit">Add Deposit</button>
						</div>

					</div>
				</form>
			</div>
		</div>
	</div>

</div>