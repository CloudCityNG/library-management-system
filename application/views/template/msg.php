<?php
if (isset($success)) {
    ?>
    <div class="row">
        <div class="col-xs-offset-3 col-xs-8">
            <div class="form-group">
                <div class="alert alert-dismissable alert-success" style="margin-top: 10px">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <span style="font-size: 1.1em"><?php echo $success; ?></span>
                </div>
            </div>
        </div>
    </div>
<?php
}
if (isset($error)) {
    ?>
    <div class="row">
        <div class="col-xs-offset-3 col-xs-8">
            <div class="form-group">
    			<div class="alert alert-dismissable alert-danger" style="margin-top: 10px">
    				<span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
    				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
    				<span style="font-size: 1.1em"><?php echo $error; ?></span>
    			</div>
            </div>
        </div>
    </div>
<?php
}
if($this->session->userdata('success')!=''){
    ?>
    <div class="row">
        <div class="col-xs-offset-3 col-xs-8">
            <div class="form-group">
                <div class="alert alert-dismissable alert-success" style="margin-top: 10px">
                    <span class="glyphicon glyphicon-ok" aria-hidden="true"></span>
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <span style="font-size: 1.1em"><?php echo $this->session->userdata('success'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->session->unset_userdata('success');
}
if($this->session->userdata('error')!=''){
    ?>
    <div class="row">
        <div class="col-xs-offset-3 col-xs-8">
            <div class="form-group">
                <div class="alert alert-dismissable alert-danger" style="margin-top: 10px">
                    <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
                    <button type="button" class="close" data-dismiss="alert"></button>
                    <span style="font-size: 1.1em"><?php echo $this->session->userdata('error'); ?></span>
                </div>
            </div>
        </div>
    </div>
    <?php
    $this->session->unset_userdata('error');
}
if (validation_errors()) {
?>
<div class="row">
    <div class="col-xs-offset-3 col-xs-8">
        <div class="form-group">
            <div class="alert alert-dismissable alert-warning" style="margin-top: 10px">
                <button type="button" class="close" data-dismiss="alert"></button>
                <span style="font-size: 1.1em"><?php echo validation_errors(); ?></span>
            </div>
        </div>
    </div>
</div>
<?php
}
?>