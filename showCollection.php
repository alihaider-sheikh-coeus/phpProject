
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
  <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="main.js"></script>

</head>
<body>
<div id="nav-placeholder">
</div>

    <form class="example"  >
        <input type="text" placeholder="Search.." name="search" id="search_field">
        <button type="button" id="search_val"><i class="fa fa-search"></i> search</button>
    </form>


<div class="abc">
    <?php
    include 'main.php';

    fetchRecord();
//    include 'edit.php';
    ?>
</div>

<div class="container">



    <!-- The Modal -->
    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <form  method="post" action ="edit.php" enctype="multipart/form-data">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Modal Heading</h4>
                    <button type="button" class="close" data-dismiss="modal">×</button>
                </div>

                <div class="modal-body">
                    <label for="id">id</label>  <input id="id" name="id" type="text"  readonly="readonly" /><br>
                    <label class="name">Name</label>
                    <input type="text" class="modal_name" name="name">
                    <br><label class="isbn">ISBN</label> <input type="text" class="modal_isbn"  name="isbn">
                    <br><label class="publisher">Publihser</label> <input type="text"  class="modal_publisher" name="publisher">
                    <label for="file-upload" class="custom-file-upload">
                        image</label><br>
                    <input id="file-upload" name="file-upload"  type="file"/><br>
                    <img class="modal_img" alt='' border=3 height=100 width=100></div>

                <div class="modal-footer">
                    <button type="submit" name="modal_submit" class="btn btn-primary" id="save">Save</button>
                    <button type="button" class="btn btn-danger" id="hide">Close</button>
                </div>
                </form>
                </div>


            </div>
        </div>
    </div>

</div>


</body>
</html>

