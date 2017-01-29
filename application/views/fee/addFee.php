<script src="<?php echo JS . "jquery-1.7.1.min.js"; ?>"></script>
<script src="<?php echo JS . "jquery-ui-1.8.17-custom-min.js"; ?>"></script>
<script type="text/javascript">
	$(document).ready(function(){
		$("#memberType").change(function(){
			var type=$("#memberType").val();
			console.log(type);
			if(type=='expired'){
				$.ajax({
					type:"post",
					url:"<?php echo PATH; ?>fee/getExpiredList",
					data:"type="+type,
					success:function(data){
						$("#dueList").html(data);
					}
				});
			}
			else if(type=='new'){
				$.ajax({
					type:"post",
					url:"<?php echo PATH; ?>fee/getNewList",
					data:"type="+type,
					success:function(data){
						$("#dueList").html(data);
					}
				});
			}
		});
	});
</script>

<div id="page-wrapper">
	<div class="container-fluid">
		<h3 class="page-header">
			Add Fees
		</h3>
	</div>

	<div class="container-fluid">
		<div class="row">
			<div class="col-md-12">
			<form action="<?php echo PATH.'fee/addFee'; ?>" method="POST" role="form">
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="memberType"><h5>Select Type *</h5></label>
							<select class="form-control select-plugin" name="memberType" id="memberType">
								<option><h5>Please select a value</h5></option>
								<option value="expired">Renew account</option>
								<option value="new">New Member</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="dueList"><h5>Select member *</h5></label>
							<select class="form-control" name="dueList" id="dueList">
								<option>Please select a value</option>
							</select>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="amount"><h5>Amount *</h5></label>
							<input class="form-control" name="amount" id="amount" type="text" value="<?php echo $fee; ?>" disabled/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="date"><h5>Start Date *</h5></label>
							<input class="form-control datepicker" name="date" id="date" type="text" required/>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="period"><h5>Period *</h5></label>
							<input class="form-control" name="period" id="period" type="text" required/>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="booklet"><h5>Booklet No *</h5></label>
							<input class="form-control" name="booklet" id="booklet" type="text" required/>
						</div>
					</div>
					<div class="col-md-4 col-xs-12">
						<div class="form-group">
							<label for="receipt"><h5>Receipt No *</h5></label>
							<input class="form-control" name="receipt" id="receipt" type="text" required/>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-offset-2">
						<div class="col-md-4 col-xs-12">
							<button class="btn btn-success btn-block" name="submitFee" type="submit">Add Received Fees</button>
						</div>
						<div class="col-md-4 col-xs-12">
							<button class="btn btn-default btn-block btn-outline" name="resetsubmitFee" type="reset">Reset form</button>
						</div>
					</div>
				</div>


			</form>
			</div>
		</div>
	</div>
</div>