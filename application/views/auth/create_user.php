<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header"); ?>
<body>
<div class="main-container">
<h1><?php echo lang('create_user_heading');?></h1>
<p><?php echo lang('create_user_subheading');?></p>
<div id="infoMessage"><?php echo $message;?></div>

<div class="row">
<div class="col-md-4 offset-md-4">
<div class="form-group input-group-lg">
<?php echo form_open("index.php/auth/create_user");?>
            <?php echo form_input($first_name);?>
            <?php echo form_input($last_name);?>
      <?php
      if($identity_column!=='email') {
          echo '<p>';
          echo lang('create_user_identity_label', 'identity');
          echo '<br />';
          echo form_error('identity');
          echo form_input($identity);
          echo '</p>';
      }
      ?>
            <?php echo form_input($company);?>
            <?php echo form_input($email);?>
            <?php echo form_input($phone);?>
            <?php echo form_input($password);?>
            <?php echo form_input($password_confirm);?>
      <p><?php echo form_submit('submit', lang('create_user_submit_btn'),"class='btn btn-shorten'");?></p>

<?php echo form_close();?>
</div>
</div>
</div>
</div>
</body>
</html>