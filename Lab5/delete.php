<?php
    require("connect.php");
    if(isset($_REQUEST['deletedocu']) && isset($_REQUEST['id'])) 
    {
        $id =  $_REQUEST["id"];
        $query = "DELETE FROM documentary WHERE sno='$id'";
        mysqli_query($con, $query);
        header("location: admin.php");
    }
    else
    {
        echo "error";
    }
?>