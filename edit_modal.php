
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Bootstrap demo</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/5.0.0-alpha2/css/bootstrap.min.css">
   
    <style>
        .form {
            border: 2px solid #ced4da;
            border-radius: 8px;
            padding: 30px;

        }
    </style>
</head>

<body>
<?php
    if (isset($_POST["submt"])) {
        include "./db.php";
        $id=$_GET["id"]; 
        $description = $_POST["desc"];
        $sql = " update data_notes set description='$description' where serial=$id";
        $res = mysqli_query($conn, $sql);
        
        header("location:./index.php");
    }
    ?>

    <div class="container my-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form" method="POST">
                    <div class="mb-3">
                        
                        <label for="desc" class="form-label">Update Your Description here</label>
                        <textarea class="form-control" id="desc" rows="3" placeholder="Update Description"
                            name="desc"></textarea><br>
                        <button type="submit" class="btn btn-primary" name="submt">Update</button>
                </form>

            </div>

        </div>
    </div>