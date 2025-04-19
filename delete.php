<?php
include('./conn.php');

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $deleteTaskSql = "DELETE FROM record WHERE id = '$id'";

    if (mysqli_query($conn, $deleteTaskSql)) {
        echo "<script>window.location.href='./index.php'</script>";
    }
}
?>