<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div>
                <?php


                $addnew = array(
                'name' => 'addnew',
                'id' => 'addnew',
                'value' => 'Add another member',
                'class' => 'btn btn-info btn-lg'
            );
                $viewdetails = array(
                'name' => 'viewdetails',
                'id' => 'viewdetails',
                'value' => 'View member details',
                'class' => 'btn btn-primary btn-lg'
            );
            ?>
            <div class="row">  
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php
							echo anchor("member/add_member", form_submit($addnew));
                        ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <?php
	                        echo anchor("member/view_member", form_submit($viewdetails));
                        ?>
                    </div>
                </div>
                <div class="col-sm-3">
                    <div class="form-group">
                        <button type="button" class="btn btn-default btn-lg" data-toggle="modal" data-target=".bs-example-modal-lg"><strong>Add Deposit for member id <?php echo $id; ?></strong></button>
                    </div>
                </div>
            </div>

               
                
            </div>
        </div>
        <!-- /.col-md-12 col-sm-12 -->
    </div>
</div>

<!--Deposit Modal-->
<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
  <div class="modal-dialog">
    <div class="modal-content">
      <form method="POST" action="http://localhost/lms/index.php/deposit/addDeposit">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h3 class="modal-title" id="myModalLabel">Enter Deposit Information</h3>
                </div>
                <div class="modal-body">
                    <input type="hidden" value="<?php echo $id; ?>" name="member_id"></input>
                    <div class="form-group">
                        <label for="amount">Amount</label>
                        <input class="form-control" name="amount" type="text" placeholder="Enter deposit amount" />
                    </div>
                    <div class="form-group">
                        <label for="date">Date *</label>
                        <input type="date" name="date" class="form-control" required/>
                    </div>
                    <div class="form-group">
                        <label for="booklet">Booklet No *</label>
                        <input class="form-control" name="booklet" type="text" placeholder="Enter the booklet number" required />
                    </div>
                    <div class="form-group">
                        <label for="receipt">Receipt No *</label>
                        <input class="form-control" type="text" name="receipt" placeholder="Enter the receipt number" required />
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="submitDeposit">Add Deposit</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </form>
    </div>
  </div>
</div>