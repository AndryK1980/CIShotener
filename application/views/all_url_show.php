<?php $this->load->view("header"); ?>

<?php  
    foreach($short_table as $row){
        echo "<li>";
        echo $row['id'];echo $row['url'];echo $row['url_code'];echo $row['short_url'];echo $row['short_date'];//echo $massegeError;
        echo "</li>";
    } 
    ?>
 </ul>

 </body>
</html>