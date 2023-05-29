<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['user_name'])) {

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HOME</title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <div class="jumbotron">
        <h1>Hello, <?php echo $_SESSION['name']; ?></h1>
        <a href="logout.php">logout</a>
        </div>
    </div>

    <div class="row">
        <a href="insertdata.php" class="btn btn-success" style="margin-left: 610%;"> ADD Data </a>
    </div>
    
    

    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'login_test');

    $query = "SELECT * FROM student";
    $query_run = mysqli_query($connection, $query);
    ?>
    <table class="table table-bordered" style="background-color: white;">
    <thead class="table-dark">
        <tr>
            <th> ID </th>
            <th> First Name </th>
            <th> Last Name </th>
            <th> Contact </th>
            <th> EDIT </th>
            <th> DELETE </th>
        </tr>
    </thead>

    <?php
    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {

            ?>
            <tbody>
                <tr>
                    <th> <?php echo $row['id']; ?> </th>
                    <th> <?php echo $row['fname']; ?> </th>
                    <th> <?php echo $row['lname']; ?> </th>
                    <th> <?php echo $row['contact']; ?> </th>
                    <th> <a href="" class="btn btn-primary"> EDIT </a></th>
                    <th> <a href="" class="btn btn-danger"> DELETE </a></th>
                </tr>
            </tbody>
            <?php
        }
    }
    else
    {
       echo "No Record Found"; 
    }
    ?>
    </table>
</body>
</html>

<?php
}else{
    header("Location: index.php");
    exit();
}
?>