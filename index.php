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
    <?php include './navbar.php'; ?>
    <?php include './db.php'; ?>
    
    <?php
    if (isset($_POST["submt"])) {
        $title = $_POST["title"];
        $description = $_POST["desc"];
        $sql = "insert into data_notes(title,description) values( '$title','$description')";
        $res = mysqli_query($conn, $sql);
    }
    ?>

    <div class="container my-3">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <form class="form" method="POST">
                    <div class="mb-3">
                        <label for="title" class="form-label">Title</label>
                        <input type="text" placeholder="Enter title" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" name="title">
                        <label for="desc" class="form-label">Description</label>
                        <textarea class="form-control" id="desc" rows="3" placeholder="Enter Description"
                            name="desc"></textarea><br>
                        <button type="submit" class="btn btn-primary" name="submt">Add Note</button>
                </form>

            </div>

        </div>
    </div>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <h1>Your Notes</h1>
                <div class="card my-20">
                    <?php
                    $sql_q = 'select *from data_notes';
                    $res = mysqli_query($conn, $sql_q);
                    $noNotes = true;
                    while ($row = mysqli_fetch_assoc($res)) {
                        $noNotes = false;
                        echo '<div class="card" my-3>
                       
                        <div class="card-body">
                          <h5 class="card-title">' . $row["title"] . ' </h5>
                          <p class="card-text">' . $row["description"] . ' </p>
                          
                          <a href="./edit_modal.php?id=' . $row["serial"] . '" class="btn btn-primary">Edit</a>
                          <a href="./delete.php?id=' . $row["serial"] . '" class="btn btn-danger">Delete</a>
                        </div>
                      </div> ';

                    }

                    if ($noNotes) {
                        echo '<div class="card" my-3>
                       
                        <div class="card-body">
                          <h5 class="card-title">Message</h5>
                          <p class="card-text">No Notes are availiable </p>
                         
                        </div>
                      </div>';
                    }

                    ?>

                </div>
            </div>

        </div>

    </div>

<script>
          
    </script>

</body>

</html>