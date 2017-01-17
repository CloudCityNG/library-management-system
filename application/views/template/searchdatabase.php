<div id="page-wrapper">
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <h3 class="page-header">Advanced Search</h3>
        </div>
        <!-- /.col-md-12 col-sm-12 -->
    </div>
    <?php
        $member_id = array(
            "id" => "member_id",
            "name" => "member_id",
            "placeholder" => "Search by Member ID...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Member ID",
            "autocomplete" => "off"
        );
        $name = array(
            "id" => "name",
            "name" => "name",
            "placeholder" => "Search by Name...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Name",
            "autocomplete" => "off"
        );
		$gender = array(
			"name" => "gender",
			"id" => "gender",
			"placeholder" => "Search by male/female",
			"title" => "Gender search",
			"maxlength" => "6",
			"class" => 'form-control element-width-3',
			"autocomplete" => "off"
		);

        $contact = array(
            "id" => "contact",
            "name" => "contact",
            "placeholder" => "Search by Mobile no...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Number",
            "autocomplete" => "off"
        );
        $email = array(
            "id" => "email",
            "name" => "email",
            "placeholder" => "Search by E-mail...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter E-mail",
            "autocomplete" => "off"
        );
        $address_city = array(
            "id" => "address_city",
            "name" => "address_city",
            "placeholder" => "Search by City...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter City",
            "autocomplete" => "off"
        );
        $college = array(
            "id" => "college",
            "name" => "college",
            "placeholder" => "Search by College...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter College",
            "autocomplete" => "off"
        );
        $blood_group = array(
            "id" => "blood_group",
            "name" => "blood_group",
            "placeholder" => "Search by Blood...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Blood Group",
            "autocomplete" => "off"
        );
        $university = array(
            "id" => "university",
            "name" => "university",
            "placeholder" => "Search by University...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter University",
            "autocomplete" => "off"
        );
        /*$status = array(
            "id" => "status",
            "name" => "status",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Status",
            "autocomplete" => "off"
        );
        $branch = array(
            "id" => "branch",
            "name" => "branch",
            "placeholder" => "Search by Branch...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Branch",
            "autocomplete" => "off"
        );
        $type = array(
            "id" => "type",
            "name" => "type",
            "placeholder" => "Search by Type...",
            "maxlength" => "50",
            "class" => "form-control element-width-3",
            "title" => "Enter Type",
            "autocomplete" => "off"
        );*/
    	$current_year = array(
                "id" => "current_year",
                "name" => "current_year",
                "title" => "Enter Current Academic Year",
                "placeholder" => "Search by academic year...",
                "autocomplete" => "off",
                "maxlength" => "1",
                "class" => "form-control element-width-3"
    	);
        
        $search = array(
            'name' => 'search',
            'id' => 'search',
            'value' => 'Search',
            'class' => 'btn btn-primary btn-lg btn-block'
        );
        echo validation_errors();
        echo form_open('searchdatabase_control/advance_search');
    ?>
    <div class="row">
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                    echo form_input($member_id);
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                echo form_input($name);
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
		<?php
                    echo form_input($gender);
		?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                    echo form_input($contact);
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                    echo form_input($email);
                ?>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="form-group">
                <?php
                    echo form_input($address_city);
                ?>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control select-plugin" name="college" id="college">
                    <option value="">Search by College...</option>
                    <?php
                        $sql = "SELECT * FROM college";
                        $query = $this->db->query($sql);
                        print_r($query->result_array());
                        foreach($query->result_array() as $d){
                        ?>   
                         <option value="<?php echo $d['college_id']; ?>"><?php echo $d['college_name']; ?></option><?php
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control select-plugin" name="university" id="university">
                    <option value="">Search by University...</option>
                    <?php 
                        $sql = "SELECT * FROM university";
                        $query = $this->db->query($sql);
                        //print_r($query->result_array());
                        foreach($query->result_array() as $d){
                        ?>   
                         <option value="<?php echo $d['university_id']; ?>"><?php echo $d['university_name']; ?></option><?php
                        }
                    ?>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control select-plugin" name="status" id="status">
                    <option value="">Search by status...</option>
                    <?php foreach($status->result_array() as $stat){
                        extract($stat);
                        echo "<option value='".$status_id."' >".$status_name."</option>";
                    } ?>
                </select>
            </div>
        </div>

        
        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control select-plugin" id="type" name="type">
                    <option value="">Search by type...</option>
                    <option value="Student">Student</option>
                    <option value="Working">Working</option>
                </select>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
            <?php
                echo form_input($current_year);
            ?>
            </div>
        </div>

        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control select-plugin" name="blood_group" id="blood_group">
                    <option value="">Search by Blood Group...</option>
                    <?php
                    foreach($bloodGroup->result_array() as $bg){
                            extract($bg);
                            echo "<option value='".$blood_id."' >".$blood_name."</option>";
                        }
                    ?>
                </select>
            </div>
        </div>


        <div class="col-sm-3">
            <div class="form-group">
                <select class="form-control select-plugin" id="branch" name="branch">
                    <option value="">Select a branch</option>
                    <?php
                        foreach($branch->result_array() as $bran){
                        extract($bran);
                        echo "<option value='".$branch_id."' >".$branch_name."</option>";
                    } ?>
                </select>
            </div>
        </div>
        <div class="col-sm-offset-2 col-sm-8">
            <div class="form-group">
                <?php
                    echo form_submit($search);
                ?>
            </div>
        </div>
    <?php
        echo form_close();
    ?>
</div>