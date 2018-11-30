$(document).ready(function() {

    $("#display").click(function() {

        $.ajax({
            type: "GET",
            url: "bingo.php",
            success: function(response){
                $("#responsecontainer").html(response);

            }

        });
    });
});


