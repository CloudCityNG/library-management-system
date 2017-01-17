<?php
/**
 * Created by PhpStorm.
 * User: thadaninilesh
 * Date: 25/6/15
 * Time: 12:03 AM
 */
?>
<div id="page-wrapper">
	<div class="row" style="padding-top: 25px;padding-bottom: 0px">
		<div class="col-sm-12">

				<?php
					$author = array(
						'name' => 'author',
						'id' => 'author',
						'value' => 'Author',
						'class' => 'btn btn-success btn-lg btn-block'
					);
					$branch = array(
						'name' => 'branch',
						'id' => 'branch',
						'value' => 'Branch',
						'class' => 'btn btn-success btn-lg btn-block'
					);
					$topic = array(
						'name' => 'topic',
						'id' => 'topic',
						'value' => 'Topic',
						'class' => 'btn btn-primary btn-lg btn-block'
					);
					$publication = array(
						'name' => 'publication',
						'id' => 'publication',
						'value' => 'Publication',
						'class' => 'btn btn-primary btn-lg btn-block'
					);
					$add_book = array(
						'name' => 'add_book',
						'id' => 'add_book',
						'value' => 'New Book',
						'class' => 'btn btn-success btn-lg btn-block'
					);
					$view_book = array(
						'name' => 'view_book',
						'id' => 'view_book',
						'value' => 'View book',
						'class' => 'btn btn-primary btn-lg btn-block'
					);

				?>
<div class="row">
	<div class="col-sm-4">
		<div class="form-group">
			<?php
				echo anchor("book/add_branch", form_submit($branch));
			?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php
				echo anchor("book/add_topic", form_submit($topic));
			?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php
				echo anchor("book/add_author", form_submit($author));
			?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php
				echo anchor("book/add_publication", form_submit($publication));
			?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php
				echo anchor("book/add_book", form_submit($add_book));
			?>
		</div>
	</div>
	<div class="col-sm-4">
		<div class="form-group">
			<?php
				echo anchor("book/view_book", form_submit($view_book));
			?>
		</div>
	</div>
</div>
<?php echo form_close(); ?>
</div>
<!-- /.col-md-12 col-sm-12 -->
</div>
