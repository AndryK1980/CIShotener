<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header"); ?>
<body>
<div class="main-container">
               <h1>URL Shortener Data Base</h1>
               <div class="row">
                   <div class="col-md-4 offset-md-4">
                       <div class="form-group input-group-lg">
                           
                           <span class="input-group-btn">
                               <button id="btn-home" class="btn btn-shorten" type="button">Home Page</button>
                           </span>
                       </div>
                   </div>
               </div>
           </div>

<table class="table table-bordered">
  <thead>
    <tr>
      <th scope="col">ID</th>
      <th scope="col">URL</th>
      <th scope="col">URL Code</th>
      <th scope="col">Short URL</th>
      <th scope="col">Date URL Create</th>
    </tr>
  </thead>
  <tbody>
<?php  

    foreach($short_table as $row){
        echo "<tr>";
        echo "<th scope='row'>";echo $row['id'];echo "</th>";
        echo "<td>";echo $row['url'];echo "</td>";
        echo "<td>";echo $row['url_code'];echo "</td>";
        echo "<td>";echo $row['short_url'];echo "</td>";
        echo "<td>";echo $row['short_date'];echo "</td>";
        echo "</tr>";
    } 
    ?>
 </tbody>
</table>

 <script type="text/javascript" src="<?php echo base_url()?>assets/js/shortScript.js"></script>

 </body>
</html>