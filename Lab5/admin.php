<?php
    require("connect.php");
    if(isset($_SESSION['email']))
    {
        if(isset($_POST['adddocu']) && isset($_FILES['image'])) 
        {

            $type = $_REQUEST['type'];
            if (count($_FILES) > 0) {
                if (is_uploaded_file($_FILES['image']['tmp_name'])) 
                {
                    $imgData = addslashes(file_get_contents($_FILES['image']['tmp_name']));
                    $sql = "INSERT INTO documentary(type, img) VALUES('$type','$imgData')";
                    mysqli_query($con, $sql);
                }
            }
        }
        
?>

<html>

    <head>
        <link href="https://fonts.googleapis.com/css?family=Didact+Gothic&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <link href="css/style.css" rel="stylesheet" type="text/css">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta charset="UTF-8">
        <title>Documentaries</title>
    </head>
    
    <body>

        <div class="container text-center">
            <h1><b><u>Admin Panel</u></b></h1>
            <br>
            <br>
            
            <br>
            <br>
            <br>
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header" style="border:0px;">
                            <h6 class="modal-title" id="exampleModalLabel"><b>+ Add New Documentary</b></h6>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form autocomplete="off" method="POST" action="" enctype="multipart/form-data">
                                
                                <div class="form-group">
                                    <input type="text" class="form-control" name="type" id="type" placeholder="Type" required>
                                </div>
                                <div class="form-group">
                                    <input type="file" class="form-control" name="image" id="image" required>
                                </div>
                                <div class="form-group">
                                    <center>
                                        <button type="submit" class="btn btn-primary" style="vertical-align:middle" id="addDocumentary" name="adddocu"><span> SUBMIT </span></button>
                                    </center>
                                </div>
                            </form>
                            
                        </div>
                    </div>
                </div>
            </div>
           

            <div class="container">
                <div class="row">
                <?php
                $query = "SELECT * FROM documentary";
                $result = mysqli_query($con, $query) or die(mysqli_error($con));
                while($row = mysqli_fetch_array($result))
                {
                ?>
                <div class="col-5 d-flex align-items-center" style="border: 2px solid black; margin-top: 10px;">
                    <img class="img-fluid img-thumbnail" src="load_image.php?id=<?php echo $row["sno"]; ?>" style="border:none;width:200px;height:auto;">
                    &emsp;
                    &emsp;
                    <div class="d-flex flex-column align-items-start">
                        <h4><b><?php echo $row["type"]; ?></b></h4>
                        &emsp;&emsp;
                        <form method="POST" action="delete.php">
                            <input type="hidden" value="<?php echo $row["sno"];?>" name="id">
                            <button type="submit" class="btn btn-primary" style="vertical-align:middle" id="deletedocumentary" name="deletedocu"><span> DELETE </span></button>
                        </form>
                    </div>
                </div>
                <div class="col-1"></div>
                <br>
                <br>
                <?php
                }
                ?>
                </div>
            </div>
            <br />
            <br />
            <br />
            <a data-toggle="modal" data-target="#exampleModal"><h3>+ Add New Documentary</h3></a>
            <br />
            <br />
            <br />

        </div>


    </body>

</html>

<?php
    }
    else
    {
        header("location: login.php");
    }
?>