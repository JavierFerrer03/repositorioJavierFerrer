$(document).ready(function() {
    $(".image__chat").click(function() {
        $("#chatBotWrapper").toggleClass("show");
    });
});

$(document).ready(function() {
    $("#send-btn").on("click", function() {
        $value = $("#data").val();
        $msg = '<div class="user-inbox inbox"><div class="msg-header"><p>' + $value + '</p></div></div>';
        $(".form").append($msg);
        $("#data").val('');

        $.ajax({
            url: 'index.php?accion=getchat',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                setTimeout(function() {
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                    $(".form").append($replay);
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }, 2000);
            }
        });
    });
});