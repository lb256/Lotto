
$(document).ready(function() {

    $("#convert").click(function() {

        $.ajax({
            type: "POST",
            url: "bingo.php",
            data: {value2: 8E8},
            dataType: "text",
            success: function(response){
                $("#responsecontainer").html(response);

            }

        });
    });
});