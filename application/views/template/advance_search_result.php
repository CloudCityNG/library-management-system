<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h2 class="page-header">All Members</h2>
        </div>
        <!-- /.col-md-12 col-sm-12 -->
    </div>
    <div class="col-sm-12">
        <div class="panel panel-default">
            <div class="panel-heading">
                Database
            </div>
            <!-- /.panel-heading -->
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                        <thead>
                        <tr>
                            <th>Member ID</th>
                            <th>Name</th>
                            <th>Mobile No</th>
                            <th>Residence</th>
                            <th>E-mail</th>
                            <th>City</th>
                            <th>Blood Group</th>
                            <th>Type</th>
                            <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
$count=1;
                        foreach($details->result_array() as $fetchrow){
                            if($count%2==1){
                                $myid=$fetchrow['member_id'];
                                echo "<tr class='odd gradeX'><td>".$fetchrow['member_id']."</td>";
                                echo "<td>".anchor("member/edit_member/$myid",$fetchrow['first_name']."&nbsp;".$fetchrow['last_name'])."</td>";
                                echo "<td>".$fetchrow['contact_1']."</td>";
                                echo "<td>".$fetchrow['contact_2']."</td>";
                                echo "<td>".$fetchrow['email']."</td>";
                                echo "<td>".$fetchrow['address_city']."</td>";
                                echo "<td>".$fetchrow['blood_group']."</td>";
                                echo "<td>".$fetchrow['type']."</td>";
                                echo "<td>".$fetchrow['status']."</td></tr>";
                            }
                            else{
                                echo "<tr class='even gradeC'><td>".$fetchrow['member_id']."</td>";
                                $myid = $fetchrow['member_id'];
                                echo "<td>".anchor("member/edit_member/$myid",$fetchrow['first_name']."&nbsp;".$fetchrow['last_name'])."</td>";
                                echo "<td>".$fetchrow['contact_1']."</td>";
                                echo "<td>".$fetchrow['contact_2']."</td>";
                                echo "<td>".$fetchrow['email']."</td>";
                                echo "<td>".$fetchrow['address_city']."</td>";
                                echo "<td>".$fetchrow['blood_group']."</td>";
                                echo "<td>".$fetchrow['type']."</td>";
                                echo "<td>".$fetchrow['status']."</td></tr>";
                            }$count++;
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>