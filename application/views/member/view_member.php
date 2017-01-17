<div id="page-wrapper">
	<div class="row">
			<div class="page-header">
				<h3>VSM Library</h3>
			</div>
	</div>
	<div class="col-sm-12">
                    <div class="panel panel-success">
                        <div class="panel-heading" style="text-align: center">
                            <h3>Member Database</h3>
                        </div>
                        <!-- /.panel-heading -->
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th><h5>Member ID</h5></th>
                                            <th><h5>Name</h5></th>
                                            <th><h5>Delete Member</h5></th>
                                            <th><h5>Contact Details</h5></th>
                                            <th><h5>Address</h5></th>
                                            <th><h5>Type</h5></th>
                                            <th><h5>Status</h5></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
										if($details!='Please enter data to search for!'){
											foreach($details->result_array() as $fetchrow){
												$myid=$fetchrow['member_id'];
												echo "<tr class='odd gradeX'><td>".$fetchrow['member_id']."</td>";

												echo "<td>".anchor("member/edit_member/$myid",$fetchrow['first_name']."&nbsp;"
                                                    .$fetchrow['middle_name']."&nbsp;".$fetchrow['last_name'])."</td>";

                                                echo "<td><a href=".PATH."member/delete_confirm/".$myid.">
                                                    <i class='fa fa-times' aria-hidden='true'></i></a></td>";

												echo "<td>".$fetchrow['contact_1']."<br>".$fetchrow['contact_2'].
                                                     "<br>".$fetchrow['email']."</td>";

												echo "<td>".$fetchrow['address_building']."<br>".$fetchrow['address_street'].
                                                     "<br>".$fetchrow['address_city']." ".$fetchrow['address_pin']."</td>";

												//echo "<td>".$fetchrow['blood_group']."</td>";

												echo "<td>".$fetchrow['type']."</td>";

												if($fetchrow['status']==1){$status='Active';}else{$status='Inactive';}

												   echo "<td>".$status."</td></tr>";

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