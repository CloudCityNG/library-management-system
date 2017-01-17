<div id="page-wrapper">
	<div class="row">
		<div class="col-sm-12">
			<div>
				<?php
					$bran = array(
						"id" => "bran",
						"name" => "bran",
						//"value" => $fetchrow['first_name'];
						"placeholder" => "Add Branch",
						"maxlength" => "50",
						"class" => "form-control element-width-3",
						"title" => "Enter Branch",
						"autocomplete" => "off"
					);
					$top = array(
						"id" => "top",
						"name" => "top",
						"placeholder" => "Add Topic",
						"maxlength" => "50",
						"class" => "form-control element-width-3",
						"title" => "Enter Topic",
						"autocomplete" => "off"
					);
					$auth = array(
						"id" => "auth",
						"name" => "auth",
						"placeholder" => "Add Author",
						"maxlength" => "50",
						"class" => "form-control element-width-3",
						"title" => "Enter Author",
						"autocomplete" => "off"
					);
					$pub = array(
						"id" => "pub",
						"name" => "pub",
						"placeholder" => "Add Publication",
						"maxlength" => "50",
						"class" => "form-control element-width-3",
						"title" => "Enter Publication",
						"autocomplete" => "off"
					);


					$author = array(
						'name' => 'author',
						'id' => 'author',
						'value' => 'Add Author',
						'class' => 'btn btn-info btn-lg'
					);
					$branch = array(
						'name' => 'branch',
						'id' => 'branch',
						'value' => 'Add branch',
						'class' => 'btn btn-info btn-lg'
					);
					$topic = array(
						'name' => 'topic',
						'id' => 'topic',
						'value' => 'Add topic',
						'class' => 'btn btn-primary btn-lg'
					);
					$publication = array(
						'name' => 'publication',
						'id' => 'publication',
						'value' => 'Add Publication',
						'class' => 'btn btn-primary btn-lg'
					);
//					echo form_open('book/add_detail');
				?>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<?php
								echo form_label("Branch:",'bran');
								echo form_input($bran);
								echo form_submit($branch);
							?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<?php echo form_label('Branch:','brantop'); ?>
							<select class="form-control" name="brantop" id="brantop">
								<option value>Please Select Branch</option>
								<?php foreach($branch->result_array() as $brantopic){
									extract($brantopic);
									echo "<option value='".$branch_id."' >".$branch_name."</option>";
								} ?>
							</select>
							<?php
								echo form_label("Topic:","top");
								echo form_input($top);
								echo form_submit($topic);
							?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<?php echo form_label('Branch:','branauth'); ?>
							<select class="form-control" name="branauth" id="branauth">
								<option value>Please Select Branch</option>
								<?php foreach($branch->result_array() as $branauthor){
									extract($branauthor);
									echo "<option value='".$branch_id."' >".$branch_name."</option>";
								} ?>
							</select>
							<?php echo form_label('Topic:','topauth'); ?>
							<select class="form-control" name="topauth" id="topauth">
								<option value>Please Select Branch</option>
								<?php foreach($topic->result_array() as $topauthor){
									extract($topauthor);
									echo "<option value='".$branch_id."' >".$branch_name."</option>";
								} ?>
							</select>
							<?php
								echo form_label("Author:","auth");
								echo form_input($auth);
								echo form_submit($author);
							?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<?php
								echo form_label("Publication","pub");
								echo form_input($pub);
								echo form_submit($publication);
							?>
						</div>
					</div>
				</div>


				<?php// echo form_close(); ?>
			</div>
		</div>
		<!-- /.col-md-12 col-sm-12 -->
	</div>
</div>