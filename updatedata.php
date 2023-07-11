<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE DATA</title>
    <link rel="stylesheet" href="style1.css">
</head>
<body>
    <?php
    $connection = mysqli_connect("localhost","root","");
    $db = mysqli_select_db($connection, 'pekerja');

    $id = $_POST['id'];

    $query = "SELECT * FROM workers WHERE id='$id' ";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        while($row = mysqli_fetch_array($query_run))
        {
           ?>
           <div class="container">
            <div class="jumbotron">
                <h2> EDIT </h2>
                <hr>
                <form action="" method="post">
                    <input type="hidden" name="id" value="<?php echo $row['id'] ?>">
                <div class="form-group">
                    <label for=""> NAMA PEKERJA </label>
                    <input type="text" name="nama_pekerja" class="form-control" value="<?php echo $row['nama_pekerja'] ?>" placeholder="Masukkan Nama anda" required>
                </div>
                <div class="form-group">
                    <label for=""> NO KP </label>
                    <input type="text" name="no_kp" class="form-control" value="<?php echo $row['no_kp'] ?>" placeholder="Masukkan No Kp anda" required>
                </div>
                </div>
                      <div class="form-group">
                        <label for=""> JANTINA : &nbsp</label>
                        <select class="form-control" name="jantina">
                            <option selected disabled>Select</option>
                            <option value="Lelaki">Lelaki</option>
                            <option value="Perempuan">Perempuan</option>
                        </select>
                    </div>
                <div class="form-group">
                    <label for=""> NO HP </label>
                    <input type="text" name="no_hp" class="form-control" value="<?php echo $row['no_hp'] ?>" placeholder="Masukkan No Hp anda" required>
                </div>

                <button type="submit" name="update" class="btn btn-primary"> Update Data </button>

                <a href="home.php" class="btn btn-danger"> CANCEL </a>
            </form>
            <?php
            if(isset($_POST['update']))
            {
                $nama_pekerja = $_POST['nama_pekerja'];
                $no_kp = $_POST['no_kp'];
                $jantina = $_POST['jantina'];
                $no_hp = $_POST['no_hp'];

                $query = "UPDATE workers SET nama_pekerja='$nama_pekerja', no_kp='$no_kp', jantina='$jantina', no_hp='$no_hp' WHERE id='$id' ";
                $query_run = mysqli_query($connection, $query);

                if($query_run)
                {
                    echo '<script> alert("Data Update"); </script>';
                    header("location:home.php");
                }
                else
                {
                    echo '<script> alert("Data Not Updated"); </script>';
                }
            }
            ?>
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