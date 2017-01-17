<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 8/7/15
 * Time: 10:42 AM
 */
?>
	<!--<script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script>
		$(function() {
			$( "#datepicker" ).datepicker();
			$( "ISO 8601 - yy-mm-dd" ).change(function() {
				$( "#datepicker" ).datepicker( "option", "dateFormat", $( this ).val() );
			});
		});
	</script>-->
	<div class="row">
		<div class="col-sm-12">
			<h3 class="page-header" style="margin-top: 10px">Add Magazine</h3>
			<div class="alert alert-dismissable alert-success">
				<?php
					if(isset($last_id)){
						foreach($last_id->result_array() as $fetchrow){
							echo "<b>".$fetchrow['magazine_name']."</b> was given Magazine ID <b>".$fetchrow['magazine_id']."</b>";
						}
					}
				?>
			</div>
		</div>
		<!--col-sm-12 -->
	</div>

<?php if(isset($submit)){
	echo $success;
}
else{
	$type1 = array(
		"name" => "type",
		"id" => "type",
		"value" => "Magazine",
		'checked' => TRUE,
		'class' => 'radio-inline'
	);

	$cost = array(
		"id" => "cost",
		"name" => "cost",
		"value" => set_value('cost'),
		"placeholder" => "Purchase Cost",
		"maxlength" => "15",
		"class" => "form-control element-width-3",
		"title" => "Purchase Cost",
		"autocomplete" => "off"
	);

	$title = array(
		"id" => "title",
		"name" => "title",
		"value" => set_value('title'),
		"placeholder" => "Magazine Title",
		"maxlength" => "50",
		"class" => "form-control element-width-3",
		"title" => "Title",
		"autocomplete" => "off"
	);

	$submit = array(
		'name' => 'submit',
		'id' => 'submit',
		'value' => 'Add Magazine',
		'class' => 'btn btn-success btn-lg btn-block'
	);

	echo form_open('book/add_magazine');
	?>

	<div class="row">
		<div class="col-sm-2">
			<?php
				echo form_label("<h5>Book Type&nbsp;</h5>","type");
				echo br();
				echo form_label("<h5>Magazine &nbsp;&nbsp;</h5>","type1");
				echo form_radio($type1);
			?>
		</div>
		<div class="col-sm-10">
			<?php echo form_label('<h5>Novel Title</h5>','title');
				echo form_input($title);
			?>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<?php echo form_label('<h5>Author:</h5>','author'); ?>
			<select class="form-control select-plugin" name="author" id="author">
				<option value>Please select an Author</option>
				<?php foreach($author->result_array() as $auth){
					extract($auth);
					echo "<option value='".$author_id."'>".$author_name."</option>";
				} ?>
			</select>
		</div>
		<div class="col-sm-6">
			<?php echo form_label('<h5>Publications:</h5>','publication'); ?>
			<select class="form-control select-plugin" name="publication" id="publication">
				<option value>Please select a publication</option>
				<?php foreach($publication->result_array() as $pub){
					extract($pub);
					echo "<option value='".$p_id."'>".$publication_name."</option>";
				} ?>
			</select>
		</div>
	</div>

	<div class="row">
		<div class="col-sm-6">
			<?php echo form_label('<h5>Purchase Cost:</h5>','cost');
				echo form_input($cost);
			?>
		</div>

		<div class="col-sm-6">
			<?php echo form_label('<h5>Purchase Date:</h5>','date'); ?>

			<input type="date" name="date" id="datepicker" class="form-control">
		</div>
	</div>

	<div class="row">
		<div class="col-sm-offset-3 col-sm-6">
			<div class="form-group">
				<?php
					echo br(1);
					echo form_submit($submit);
				?>
			</div>
		</div>
	</div>

	<?php
	echo form_close();
}
?>