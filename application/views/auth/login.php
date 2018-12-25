<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header"); ?>
<body>


<div class="main-container">           
<h1><?php echo lang('login_heading');?></h1>
<p><?php echo lang('login_subheading');?></p>

<div id="infoMessage"><?php echo $message;?></div>
<div class="row">
<div class="col-md-4 offset-md-4">
<div class="form-group input-group-lg">
        <?php echo form_open("index.php/auth/login");?>
            <?php echo form_input($identity);?>
            <?php echo form_input($password);?>
        <p>
            <?php echo lang('login_remember_label', 'remember');?>
            <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
        </p>

        <p><?php echo form_submit('submit', lang('login_submit_btn'),"class='btn btn-shorten'");?></p>

        <?php echo form_close();?>
        <p><a href="create_user"><?php echo lang('index_create_user_link');?></a></p>
        </div>
</div>   

</div>
</div>
</body>
</html>