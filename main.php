<?php
include "db_connection.php";

$name = $_POST['name'];
$isbn = $_POST['isbn'];
$publisher = $_POST['Publisher'];
if (isset($_POST['submit']) && $name != "" && $isbn != "" && $publisher != "") {

    createBook($name, $isbn, $publisher);
} else {
//    echo "all fields are required";
}
function createBook($name, $isbn, $publisher)
{
    $conn = OpenConn();
    $bookImage = $_FILES['imageUpload']['name'] . date('d-m-Y_H-i-s') .".jpg";
//    echo $bookImage;
    $bookTemp = $_FILES['imageUpload']['tmp_name'];
    if (move_uploaded_file($bookTemp, "uploads/" . $bookImage)) {
        $sql = "INSERT INTO books (name, publisher, isbn,image)
        VALUES ('$name','$publisher','$isbn','$bookImage')";
        if ($conn->query($sql) === TRUE) {
//            echo "book inserted successfully!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
    CloseCon($conn);
}

function fetchRecord()
{
    $conn = OpenConn();

    $sql = "SELECT id,name,publisher,isbn,image FROM books order by id desc ";
    $result = $conn->query($sql);
//    echo $result;
    $results_per_page = 5;
    $number_of_result = mysqli_num_rows($result);

    //determine the total number of pages available
    $number_of_page = ceil($number_of_result / $results_per_page);
    //determine which page number visitor is currently on
    if (!isset ($_GET['page'])) {
        $page = 1;
    } else {
        $page = $_GET['page'];
    }

    //determine the sql LIMIT starting number for the results on the displaying page
    $page_first_result = ($page - 1) * $results_per_page;
    $query = "SELECT * FROM books LIMIT " . $page_first_result . ',' . $results_per_page;
    $result = mysqli_query($conn, $query);

    if ($result->num_rows > 0) {
        echo "<table><tr><th>id</th><th>Name</th><th>Publihser</th><th>ISBN</th><th>Image</th><th>Action</th></tr>";
        while ($row = $result->fetch_assoc()) {
            $image = $row['image'];
            $image_src = "uploads/" . $image;
            echo "<tr><td class='book_id'>" . $row["id"] . "</td>
<td class='name'>" . $row["name"] . "</td>
<td class='publisher'>" . $row["publisher"] . "</td>
<td class='isbn'>" . $row["isbn"] . "</td>
<td class='image'><img class ='book_img' src='" . $image_src . "' alt='' border=3 height=100 width=100></td> 
<td> <button class='edit' id='edit' >edit</button> 
     <button class='delete'  id='delete' >delete</button> 
                </td></tr>";
        }
        echo "</table>";
    } else {
        //echo "0 results";
    }
    for ($page = 1; $page <= $number_of_page; $page++) {
        echo '<a class="pagination"  href = "showCollection.php?page='  . $page . '">' . $page . ' </a>';;
    }
    CloseCon($conn);
}


?>
