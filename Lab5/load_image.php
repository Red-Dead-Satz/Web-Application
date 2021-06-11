<?php
    require("connect.php");
    if(isset($_REQUEST['id'])) 
    {
        $id =  $_REQUEST["id"];
        $query = "SELECT img FROM documentary WHERE sno='$id'";
        $result = mysqli_query($con, $query) or die("<b>Error:</b> Problem on Retrieving Image<br/>" . mysqli_error($con));
        $row = mysqli_fetch_array($result);
        header("content-type: image/jpeg");
        echo $row["img"];
    }
    else
    {
        echo "error";
    }
?>