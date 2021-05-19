<?php
include "main.php";

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>book.com</title>
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="main.js"></script>
</head>
<body>
<div id="nav-placeholder">
</div>


<div id="form">
    <h2>Book details</h2>
    <form  method="post" enctype="multipart/form-data">
        <p>
            <label for="inputName">Name:<sup>*</sup></label>
            <input type="text" name="name" id="inputName">
        </p>
        <p>
            <label for="publisher">Publisher:</label>
            <input type="text" name="Publisher" id="publisher">
        </p>
        <p>
            <label for="isbn">ISBN:</label>
            <input type="text" name="isbn" id="isbn">
        </p>
        <p>
            <label for="imageUpload" class="custom-file-upload">
                image
            </label>
            <input id="imageUpload" name="imageUpload" type="file"/>

        </p>
        <div id="formButton">
            <input type="submit" name="submit" id="submit" value="Submit">
            <input type="reset" value="Reset">
        </div>

    </form>


</div>

</body>
</html>