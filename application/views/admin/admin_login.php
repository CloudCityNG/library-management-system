<?php include('public_header.php');?>


<body>
  <div class="container">
    <?php echo form_open ('login/admin_login',['class'=>'form-horizontal']); ?>             <!-- array for other parameters-->
   

    <div class="top">
      <h1 id="title" class="hidden">VSM <span>Library</span></span></h1>
    </div>
    <div class="login-box animated fadeInUp">
      <div class="box-header">
        <h2>Log In</h2>
      </div>
      <label for="username">Username</label>
      <br/>
      <?php echo form_input (['name'=>'username','class'=>'form-control','placeholder'=>'Typer Your Username','value'=>set_value('username')]); ?>         
      <div class="col-lg-6">
    <?php echo form_error('username'); ?>                                   <!-- this is erroe showing for form by div creation -->
    </div> 
      <br/>
      <label for="password">Password</label>
      <br/>
      <?php echo form_password (['name'=>'password','class'=>'form-control','placeholder'=>'Typer Your Passowrd']); ?>
      <div class="col-lg-6">
      <?php echo form_error('password'); ?>                                 <!-- this is erroe showing for form by div creation -->
      </div>  
      <br/>
      <?php echo form_submit(['name'=>'submit','value'=>'Login','class'=>'btn btn-primary']);?>
        <?php echo form_reset(['name'=>'Reset','value'=>'Reset','class'=>'btn btn-default']);?>
      <br/>
      <?php if($error = $this->session->flashdata('login_failed')): ?>    <!-- this semi-colon is 2nd method for endif-->
      <div class="row">
        <div class="col-lg-6">
          <div class="alert-dismissible alert-warning">
          <button type="button" class="close" data-dismiss="alert">&times;</button>
           <h4>Oh snap !! <br><br><?= $error ?></h4>
          </div>
        </div>
      </div>
    <?php endif; ?>
    </div>
  </div>
</body>





<?php include('public_footer.php');?>  

