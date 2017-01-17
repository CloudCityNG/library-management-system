<div id="page-wrapper">
	<div class="row" style="padding-top: 25px;padding-bottom: 0px">
		<div class="col-sm-12">

				<?php
					$author = array(
						'name' => 'author',
						'id' => 'auth',
						'value' => 'Add Author',
						'class' => 'btn btn-outline btn-primary btn-lg'
					);
					$branch = array(
						'name' => 'branch',
						'id' => 'bran',
						'value' => 'Add branch',
						'class' => 'btn btn-outline btn-primary btn-lg'
					);
					$topic = array(
						'name' => 'topic',
						'id' => 'top',
						'value' => 'Add topic',
						'class' => 'btn btn-outline btn-primary btn-lg'
					);
					$publication = array(
						'name' => 'publication',
						'id' => 'publication',
						'value' => 'Add Publication',
						'class' => 'btn btn-outline btn-primary btn-lg'
					);

				?>
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<?php
								echo anchor("book/add_branch", form_submit($branch));
							?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<?php
								echo anchor("book/add_topic", form_submit($topic));
							?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<?php
								echo anchor("book/add_author", form_submit($author));
							?>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<?php
								echo anchor("book/add_publication", form_submit($publication));
							?>
						</div>
					</div>
				</div>
				<?php echo form_close(); ?>
		</div>
		<!-- /.col-md-12 col-sm-12 -->
	</div>
