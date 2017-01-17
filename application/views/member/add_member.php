
        <div id="page-wrapper">
            <div class="row">
                <div class="col-sm-12">
                    <h3 class="page-header">Add Member</h3>
					<div class="alert alert-dismissable alert-success">
						<?php
							if(isset($last_id)){
								foreach($last_id->result_array() as $fetchrow){
									echo "<b>".$fetchrow['first_name']." ".$fetchrow['last_name']."</b> was given Member ID <b>".$fetchrow['member_id']."</b>";
								}
							}
						?>
					</div>

                </div>
                <!-- /.col-md-12 col-sm-12 -->
            </div>
            <script type="text/javascript">
                function setCity() {
                    //jQuery('#city').html('Dombivli');
                    var set = document.getElementById('city');
                    set.value = "Dombivli";
                    //alert("hello");
                }
            </script>
<?php if(isset($submit)){
    echo $success;
}
else{
            
            $first_name = array(
                "id" => "first_name",
                "name" => "first_name",
                "value" => set_value('first_name'),//"value" => $fetchrow['first_name'];
                "placeholder" => "Firstname",
                "maxlength" => "50",
                "class" => "form-control element-width-3",
                "title" => "Enter First Name",
                "autocomplete" => "off"
            );

            $last_name = array(
                "id" => "last_name",
                "name" => "last_name",
                "value" => set_value('last_name'),
                "placeholder" => "Lastname",
                "maxlength" => "50",
                "class" => "form-control element-width-3",
                "title" => "Enter Last Name",
                "autocomplete" => "off"
            );

            $middle_name = array(
                "id" => "middle_name",
                "name" => "middle_name",
                "value" => set_value('middle_name'),
                "placeholder" => "Middle name",
                "maxlength" => "50",
                "class" => "form-control element-width-3",
                "title" => "Enter Middle Name",
                "autocomplete" => "off"
            );

            $email = array(
                "id" => "email",
                "name" => "email",
                "value" => set_value('email'),
                "placeholder" => "myself@example.com",
                "maxlength" => "50",
                "class" => "form-control element-width-3",
                "title" => "Enter Email",
                "autocomplete" => "off"
            );

            $address_1 = array(
                "id" => "address_1",
                "name" => "address_1",
                "value" => set_value('address_1'),
                "placeholder" => "Building",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Enter Building",
                "autocomplete" => "off"
            );

            $address_2 = array(
                "id" => "address_2",
                "name" => "address_2",
                "value" => set_value('address_2'),
                "placeholder" => "Street Address",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Enter Street Address",
                "autocomplete" => "off"
            );
            $city = array(
                "id" => "city",
                "name" => "city",
                "value" => set_value('city'),
                "placeholder" => "Enter city / town",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Enter City",
                "autocomplete" => "off"
            );
            $pincode = array(
                "id" => "pincode",
                "name" => "pincode",
                "value" => set_value('pincode'),
                "placeholder" => "Eg. 400001",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Enter Pincode",
                "autocomplete" => "off"
            );

            $contact_1 = array(
                "id" => "contact_1",
                "name" => "contact_1",
                "value" => set_value('contact_1'),
                "type" => "tel",
                "placeholder" => "Eg. 09876543210",
                "maxlength" => "20",
                "class" => "form-control element-width-3",
                "title" => "Enter mobile",
                "autocomplete" => "off"
            );

            $contact_2 = array(
                "id" => "contact_2",
                "name" => "contact_2",
                "value" => set_value('contact_2'),
                "placeholder" => "Eg. 022-23456789",
                "maxlength" => "20",
                "class" => "form-control element-width-3",
                "title" => "Enter Residence",
                "autocomplete" => "off"
            );
            
            $gender1 = array(
                "name" => "gender",
                "id" => "gender",
                "value" => "Male",
                'checked' => TRUE,
                'class' => 'radio-inline'
                
            );
            $gender2  = array(
                "name" => "gender",
                "id" => "gender",
                "value" => "Female",
                'class' => 'radio-inline',
                'checked' => FALSE
            );

			$current_year = array(
				"id" => "current_year",
				"name" => "current_year",
				"value" => set_value('current_year'),
				"placeholder" => "Current year",
				"class" => "form-control element-width-3",
				"title" => "Current Academic year",
				"autocomplete" => "off"
			);

            $company = array(
                "id" => "company",
                "name" => "company",
                "value" => set_value('company'),
                "placeholder" => "Enter Company Name",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Company name",
                "autocomplete" => "off"
            );
            
            $designation = array(
                "id" => "designation",
                "name" => "designation",
                "value" => set_value('designation'),
                "placeholder" => "Designation",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Designation",
                "autocomplete" => "off"
            );
            
            $domain_of_work = array(
                "id" => "domain_of_work",
                "name" => "domain_of_work",
                "value" => set_value('domain_of_work'),
                "placeholder" => "Work Domain",
                "maxlength" => "100",
                "class" => "form-control element-width-3",
                "title" => "Work Domain",
                "autocomplete" => "off"
            );

            $submit = array(
                'name' => 'submit',
                'id' => 'submit',
                'value' => 'Submit',
                'class' => 'btn btn-success btn-lg btn-block'
            );
            echo form_open('member/add_member');
            ?>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Firstname &nbsp;*</h5>","first_name");
                        echo form_input($first_name);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Middlename &nbsp;*</h5>","middle_name");
                        echo form_input($middle_name);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Lastname &nbsp;*</h5>","last_name");
                        echo form_input($last_name);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>E-mail &nbsp;*</h5>","email");
                        echo form_input($email);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Mobile &nbsp;*</h5>","mobile");
                        echo form_input($contact_1);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Residence</h5>","residence");
                        echo form_input($contact_2);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Gender&nbsp;*</h5>","gender");
                        echo br();
                        echo form_label("<h5>Male &nbsp;&nbsp;</h5>","gender1");
                        echo form_radio($gender1);
                        echo "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
                        echo form_label("<h5>Female &nbsp;&nbsp; </h5>","gender2");
                        echo form_radio($gender2);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                    echo form_label("<h5>Date of Birth&nbsp;*</h5>","dob");
                    ?>
                    <input type="text" name="date_of_birth" id="dob" class="form-control datepicker">
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php echo form_label("<h5>Blood Group</h5>","blood_group"); ?>
                    <select class="form-control select-plugin" id="blood_group" name="blood_group">
						<option value="">Select a blood group</option>
						<?php foreach($blood->result_array() as $bg){
							extract($bg);
							echo "<option value='".$blood_id."' >".$blood_name."</option>";
						} ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Address 1 &nbsp;*</h5>","address_1");
                        echo form_input($address_1);
                    ?>
                </div>
            </div>
            <div class="col-sm-12">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Address 2 &nbsp;*</h5>","address_2");
                        echo form_input($address_2);
                    ?>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php echo form_label("<h5>City&nbsp;</h5>","city"); ?>
                    <div class="input-group">
                        <?php
                            echo form_input($city);
                        ?>
                        <div class="input-group-btn">
                            <button type="button" id="setCityD" class="btn btn-primary btn-outline" onclick="setCity()">Dombivli?</button>
                        </div>

                    </div>

                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php echo form_label("<h5>State&nbsp;*</h5>","state"); ?>
                    <select class="form-control select-plugin" id="state" name="state">
						<?php foreach($state->result_array() as $st){
							extract($st);
							echo "<option value='".$state_id."' >".$state_name."</option>";
						} ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Pincode &nbsp;*</h5>","pincode");
                        echo form_input($pincode);
                    ?>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <div class="col-sm-3">
                <div class="form-group">
                    <?php echo form_label("<h5>Branch</h5>","branch"); ?>
                    <select class="form-control select-plugin" id="branch" name="branch">
						<option value="">Select a branch</option>
						<?php foreach($branch->result_array() as $bran){
							extract($bran);
							echo "<option value='".$branch_id."' >".$branch_name."</option>";
						} ?>
                    </select>
                </div>
            </div>
			<div class="col-sm-3">
				<div class="form-group">
					<?php
						echo form_label("<h5>Current year&nbsp</h5>","current_year");
						echo form_input($current_year);
					?>
				</div>
			</div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?php echo form_label("<h5>College</h5>","college"); ?>
                    <select class="form-control select-plugin" id="college" name="college">
						<option value="">Select a college</option>
						<?php foreach($college->result_array() as $clg){
							extract($clg);
							echo "<option value='".$college_id."' >".$college_name."</option>";
						} ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?php echo form_label("<h5>University</h5>","university"); ?>
                    <select class="form-control select-plugin" id="university" name="university">
						<option value="">Select a university</option>
						<?php foreach($university->result_array() as $uni){
							extract($uni);
							echo "<option value='".$university_id."' >".$university_name."</option>";
						} ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?php
                    	echo form_label("<h5>Year of Passing&nbsp;*</h5>","yop");
                    ?>
                    <input type="month" name="year_of_passing" id="yop" class="form-control">
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?php
                    echo form_label("<h5>Type&nbsp;*</h5>","type");
                    ?>
                    <select class="form-control select-plugin" id="type" name="type">
						<option value="Student">Student</option>
						<option value="Working">Working</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?php
                        echo form_label("<h5>Status&nbsp;*</h5>","status");
                    ?>
                    <select class="form-control select-plugin" name="status" id="status">
						<?php foreach($status->result_array() as $stat){
							extract($stat);
							echo "<option value='".$status_id."' >".$status_name."</option>";
						} ?>
                    </select>
                </div>
            </div>
            <div class="col-sm-3">
                <div class="form-group">
                    <?php
                    echo form_label("<h5>Course</h5>","course");
                    ?>
                    <select class="form-control select-plugin" name="course" id="course">
						<option value="">Select a Course</option>
						<option value="Degree">Degree</option>
                    	<option value="Diploma">Diploma</option>
                    </select>
                </div>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-12">
            <h3 class="page-header">Working Professional</h3>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                echo form_label("<h5>Company</h5>","company");
                echo form_input($company);
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                echo form_label("<h5>Designation</h5>","designation");
                echo form_input($designation);
                ?>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="form-group">
                <?php
                echo form_label("<h5>Domain of Work</h5>","domain_of_work");
                echo form_input($domain_of_work);
                ?>
            </div>
        </div>
        <?php echo br(5);?>
        <div class="col-sm-offset-3 col-sm-6">
            <div class="form-group">
                <?php
                    echo form_submit($submit);
                ?>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="form-group">
               <?php echo form_close();} ?>
            </div>
        </div>
    </div>
</div>
