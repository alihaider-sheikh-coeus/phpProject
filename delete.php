<?php
include "db_connection.php";
isset($_POST['del_id']) ? deleteReocrd($_POST['del_id'],$_POST['image']) : var_dump("unable to delete");

function deleteReocrd($id,$image)
{

    $conn = OpenConn();
    $sql = "DELETE FROM books WHERE id =" . $id;
    $result = $conn->query($sql);
    unlink( "uploads/".$_POST['image'] );
    CloseCon($conn);
}