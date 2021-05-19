$(document).ready(function () {
    $("#nav-placeholder").load("navBar.html");
    $("#submit").click(function(event){

        alert("book is created successfully");

    });

   $("#hide").click(function(){
        $('#myModal').modal('hide');
    });
    $(document).on("click", "#delete", function() {
        var result = confirm("Want to delete?");
        if (result) {
            var del_id = $(this).parent().parent().find('.book_id').text();
            var image = $(this).parent().parent().find('.image').text();
            var $ele = $(this).parent().parent();
            $.ajax({
                url: "delete.php",
                type: "POST",
                cache: false,
                data: { del_id :del_id,image:image},
                success: function(dataResult){
                    console.log(del_id);
                    $ele.fadeOut().remove();
                }
            });
        }
    });
    $(document).on("click", "#edit", function() {
        $('#myModal').modal('show');
        var id = $(this).parent().parent().find('.book_id').text();
        var isbn = $(this).parent().parent().find('.isbn').text();
        var name = $(this).parent().parent().find('.name').text();
        var publisher = $(this).parent().parent().find('.publisher').text();
        // var image = $(this).parent().parent().find('#book_img').src;
        var image = $(this).parent().parent().find(".book_img").map(function (){
            return this.src;
        }).get();
        $("#id").val(id);
        $( ".modal_name" ).val(name);
        $( ".modal_isbn" ).val(isbn);
        $( ".modal_publisher" ).val(publisher);
        $(".modal_img").attr('src',image);
    });

});

$(document).on("click", "#search_val", function() {

    var searchVal = $("#search_field").val();
    if(searchVal == "")
    {
        alert("search field is empty");
    }
    else{
        $(".abc").html("");
        $.ajax({
            url: "search.php",
            type: "POST",
            cache: false,
            data: {searchVal:searchVal},
            success: function(dataResult){
              $(".abc").html(dataResult);
            }
        });

    }
});
