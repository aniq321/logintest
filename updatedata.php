<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <title>UPDATE DATA</title>
</head>
<body>
    <?php
    $connection = mysqli_connect("localhost","");
    $db = mysqli_select_db($connection, 'login_test');

    $id = $_POST['id'];

    $query = "SELECT * FROM student WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array())
        {
           ?>
           <div class="container">
            <div class="jumbotron">
                <h2> EDIT </h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label for=""> First Name </label>
                    <input type="text" name="fname" class="form-control" value="<?php echo $row['fname'] ?> placeholder="Enter First Name" required>
                </div>
                <div class="form-group">
                    <label for=""> Last Name </label>
                    <input type="text" name="lname" class="form-control" value="<?php echo $row['lname'] ?> placeholder="Enter Last Name" required>
                </div>
                <div class="form-group">
                    <label for=""> Contact </label>
                    <input type="text" name="contact" class="form-control" value="<?php echo $row['contact'] ?> placeholder="Enter Contact" required>
                </div>

                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                <a href="home.php" class="btn btn-danger"> CANCEL </a>
            </form>
            </div>
           </div>

           <?php
        }

    }
    else
    {
        echo '<script> alert("No Record Found"); </script>';
    }
    ?>
</body>
</html>