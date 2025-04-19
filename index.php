<?php include('./conn.php');?>

<?php 
$sql = "SELECT * FROM record";
$result = mysqli_query($conn, $sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-SgOJa3DmI69IUzQ2PVdRZhwQ+dy64/BUtbMJw1MZ8t5HZApcHrRKUc4W0kG879m7" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.5/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>
<body>
    <br>

    <div style="display: flex; justify-content: center;">
        <div class="div">
            <form action="" method="POST">
                <div style="display: flex;">
                    <input type="text" placeholder="Enter a task" name="task" class="form-control">
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 15px;">Enter</button>
                </div>
            </form>

            <?php 
            if (isset($_POST['submit'])) {
                $task = $_POST['task'];

                $addTaskSql = "INSERT INTO record(task) VALUES('$task')";

                if (mysqli_query($conn, $addTaskSql)) {
                    echo "<script>Swal.fire({
                    title:'Task Added',
                    text:'The task has been added successfully',
                    icon:'success'
                    }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href='./index.php';
                    }
                    })</script>";
                }
            }
            ?>

        </div>
    </div>
    <br>

    <div style="display: flex; justify-content: center;">
        <table class="table">
            <tr>
                <th style="text-align: center; font-size: 20px; height: 50px; background-color: black; color: white;">Task</th>
                <th style="text-align: center; font-size: 20px; height: 50px; background-color: black; color: white;">Action</th>
            </tr>
            
            <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
                <td style="text-align: center; font-size: 17px; height: 30px;"><?php echo $row['task'];?></td>
                <td style="text-align: center; font-size: 17px; height: 30px;"><a href="./edit.php?id=<?php echo $row['id'];?>"><button class="btn btn-warning">Edit</button></a> <a href="./delete.php?id=<?php echo $row['id'];?>"><button class="btn btn-danger">Delete</button></a></td>
            </tr>
            <?php } ?>

        </table>
    </div>
</body>
</html>