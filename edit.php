<?php
include "db_connection.php";
$name = $_POST['name'];
$isbn = $_POST['isbn'];
$publisher = $_POST['publisher'];
$id = $_POST['id'];
if(isset($_POST['modal_submit']))
{
    editRecord( $name,$publisher,$isbn,$id);
    header("Location: showCollection.php");
}
function editRecord($name,$publisher,$isbn,$id)
{
    echo "in edit record";
    $conn = OpenConn();
    if(isset($_FILES['file-upload']) ){

        $bookImage = $_FILES['file-upload']['name'];
        $bookTemp = $_FILES['file-upload']['tmp_name'];
        move_uploaded_file($bookTemp, "uploads/" . $bookImage);
        $update = "UPDATE books SET name = '".$name."', publisher= '".$publisher."',isbn= '".$isbn."', image='".$bookImage."' WHERE id = '".$id."'  ";
        $conn->query($update);


    echo "Error updating record: " . $conn->error;
        }
    else {
        $update = "UPDATE books SET name = '" . $name . "', publisher= '" . $publisher . "',isbn= '" . $isbn . "' WHERE id = '" . $id . "'  ";
        $conn->query($update);

    }
    CloseCon($conn);
}