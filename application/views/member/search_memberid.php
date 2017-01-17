<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <?php foreach($detail->result_array() as $row){ ?>
            <h2 class="page-header">Member ID <?php echo $row['member_id'];?> </h2>
        </div>
        <!-- /.col-md-12 col-sm-12 -->
    </div>
    <div class="col-sm-12">
        <div class="panel panel-default">

            <div class="panel-heading">
                <h4>
                    <?php $mid = $row['member_id'];
                    echo anchor("member/edit_member/$mid",$row['first_name']." ".$row['middle_name']." ".$row['last_name']) ?></h4>
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover">

        <tr>
            <th>Contact</th><td><?php echo $row['contact_1'];
                if($row['contact_2']!=NULL){echo ", ".$row['contact_2'];} ?></td>
        </tr>

        <tr>
            <th>Address</th><td><?php echo $row['address_building'].",<br>".$row['address_street'].",<br>".$row['address_city']." - ".$row['address_pin'].",<br>".$row['state_name'];?></td>
        </tr>
        <tr>
            <th>Date of birth</th><td><?php echo $row['date_of_birth'];?></td>
        </tr>
                        <tr>
                            <th>Gender</th><td><?php echo $row['gender'];?></td>
                        </tr>
                        <tr>
                            <th>Blood Group</th><td><?php echo $row['blood_name'];?></td>
                        </tr>
                        <tr>
                            <th>E-mail</th><td><?php echo $row['email'];?></td>
                        </tr>
                        <tr>
                            <th>Date of joining</th><td><?php echo $row['date_of_joining'];?></td>
                        </tr>
                        <tr>
                            <th>Type</th><td><?php echo $row['type'];?></td>
                        </tr>
                        <tr>
                            <th>Status</th><td><?php if($row['status']==0){$status='Inactive';}else{$status='Active';}echo $status;?></td>
                        </tr>
                        <tr>
                            <th>Course</th><td><?php echo $row['course'];?></td>
                        </tr>
                        <tr>
                            <th>Branch</th><td><?php echo $row['branch_name'];?></td>
                        </tr>

                        <tr>
                            <th>College</th><td><?php echo $row['college_name'];?></td>
                        </tr>
                        <tr>
                            <th>University</th><td><?php echo $row['university_name'];?></td>
                        </tr>
                        <tr>
                            <th>Year of Passing</th><td><?php echo $row['year_of_passing'];?></td>
                        </tr>
                        <tr>
                            <th>Company</th><td><?php echo $row['company'];?></td>
                        </tr>
                        <tr>
                            <th>Designation</th><td><?php echo $row['designation'];?></td>
                        </tr>
                        <tr>
                            <th>Domain of work</th><td><?php echo $row['domain_of_work'];?></td>
                        </tr>


    <?php }

?>
