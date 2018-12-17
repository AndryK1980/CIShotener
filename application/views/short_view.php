<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<?php $this->load->view("header"); ?>
<!-- <form action="http://localhost:8035/citest/index.php/short/insert" method="post">
    <label for="url">Enter your url</label>
    <input id="url-field" type="text" name="url"/></td>
    <label for="userUrlCode">Enter your short url</label>
    <input id="short-url-field" type="text" name="userUrlCode"/></td>
    <input id="btn-shorten" type="submit" value="send">
</form>
 -->
 <body>
    <div class="main-container">
               <h1>URL Shortener</h1>
               <div class="row">
                   <div class="col-md-4 offset-md-4">
                       <div class="form-group input-group-lg">
                           <input id="url-field"  name="url" type="text" class="form-control form-control-input" placeholder="Paste your link">
                           <input id="short-url-field" name="userUrlCode" type="text" class="form-control form-control-input" placeholder="Paste your short url">
                           <span class="input-group-btn">
                               <button id="btn-shorten" class="btn btn-shorten" type="button">SHORTEN</button>
                               <button id="btn-data-base" class="btn btn-shorten" type="button">Data Base</button>
                           </span>
                       </div>
                   </div>
                   
                   <div class="short-url-link-container col-md-6 offset-md-3">
                       <a id="short-url-link" href=""></a>
                   </div>
               </div>
           </div>

 <div id="myModalErr" class="modal fade">
        <div class="modal-dialog">
            <div class="modal-content short-model-content">
                <div class="modal-header">
                        <h4 class="modal-title">Error</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                   
                </div>
                <div class="modal-body">
                        <span id="massege-err" class="modal-body-text"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
 <script type="text/javascript" src="<?php echo base_url()?>assets/js/shortScript.js"></script>
 <!-- <?php //echo base_url()?>assets/js/jquery-3.1.1.js -->
 </body>
</html>