<?php
   
   /*MySQL has established a connection with DB*/
    
    $con = mysqli_connect('localhost','root','') or die('Unable to connect');
    
    /*Select the Data from DB*/
    
    mysqli_select_db($con,'newdb');
    
    /*These are used to establish a connection*/
    /*Same code is used for other connections.*/

?>




