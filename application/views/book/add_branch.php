<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 25/6/15
 * Time: 12:18 AM
 */
	$bran = array(
		'name' => 'newbranch',
		'id' => 'newbranch',
		'placeholder' => 'Enter Branch',
		"maxlength" => "15",
		"class" => "form-control element-width-3",
		"title" => "New Branch",
		"autocomplete" => "off"
	);
	$submit = array(
		'name' => 'submit',
		'id' => 'submit',
		'value' => 'Submit',
		'class' => 'btn btn-outline btn-success btn-block'
	);
	echo form_open('book/add_branch');
?>
<div class="row">
	<div class="col-sm-12">
		<h3 class="page-header" style="margin-top: 10px">Add Branch</h3>
	</div>
</div>
<div class="row">
	<div class="col-sm-4">
		<?php
			echo form_input($bran);
			echo br();
			echo form_submit($submit);
			echo form_close();
		?>
	</div>
</div>