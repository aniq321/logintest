<?php
session_start();
if (!isset($_SESSION["user"])) {
    header("Location: login.php");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css">
    <title>User Dashboard</title>
</head>
<body>
    <div class="container">
        <h1>Dashboard Pekerja</h1>
        <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>
    <br>
    <div class="row">
        <a href="insertdata.php" class="btn btn-success" style="padding-left: 10px;"> ADD Data </a>
    </div>
    
    

    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'pekerja');

    $query = "SELECT * FROM workers";
    $query_run = mysqli_query($connection, $query);
    ?>
    <table class="table table-bordered" style="background-color: white;">
    <thead class="table-dark">
        <tr>
            <th> ID </th>
            <th> NAMA PEKERJA </th>
            <th> NO KP </th>
            <th> NO HP </th>
            <th> JANTINA </th>
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
                    <th> <?php echo $row['nama_pekerja']; ?> </th>
                    <th> <?php echo $row['no_kp']; ?> </th>
                    <th> <?php echo $row['no_hp']; ?> </th>
                    <th> <?php echo $row['jantina']; ?> </th>
                
                <form action="updatedata.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <th> <input type="submit" name="edit" class="btn btn-success" value="EDIT"> </th>
                </form>

                <form action="delete.php" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                    <th> <input type="submit" name="delete" class="btn btn-danger" value="DELETE"> </th>
                </form>
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