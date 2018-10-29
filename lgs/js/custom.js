
$(document).ready(function(){
    $('#category').on("change",function () {
        var categoryId = $(this).find('option:selected').val();
            $.ajax({
                url: "ajax.php",
                type: "POST",
                data: "categoryId="+categoryId,
                success: function (response) {
                    console.log(response);
                    $("#sub-category").html(response);
                }
            });
    });

    });
