<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style1.css">
    <title>ADD DATA</title>
</head>
<body>
    <div class="container">
        <div class="jumbotron">
            <h2>FORM</h2>
            <hr>
            <form action="" method="post">
                <div class="form-group">
                    <label for=""> NAMA PEKERJA : &nbsp</label> 
                    <input type="text" name="nama_pekerja" class="form-control" placeholder="Masukkan Nama anda" required>
                </div>
                <div class="form-group">
                    <label for=""> NO KP : &nbsp</label>
                    <input type="text" name="no_kp" class="form-control" placeholder="Masukkan No Kp anda" required>
                </div>
                <div class="form-group">
                    <label for=""> JANTINA : &nbsp</label>
                    <input type="text" name="jantina" class="form-control" placeholder="Masukkan Jantina anda" required>
                </div>
                <div class="form-group">
                    <label for=""> NO HP : &nbsp</label>
                    <input type="text" name="no_hp" class="form-control" placeholder="Masukkan No Hp anda" required>
                </div>

                <button type="submit" name="insert" class="btn btn-primary"> Save Data </button>

                <a href="home.php" class="btn btn-danger"> CANCEL </a>
            </form>
        </div>
    </div>
</body>
</html>

<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'pekerja');

if(isset($_POST['insert']))
{
    $nama_pekerja = $_POST['nama_pekerja'];
    $no_kp = $_POST['no_kp'];
    $jantina = $_POST['jantina'];
    $no_hp = $_POST['no_hp'];

    $query = "INSERT INTO workers(`nama_pekerja`,`no_kp`,`jantina`,`no_hp`) VALUES ('$nama_pekerja','$no_kp','$jantina','$no_hp')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>
