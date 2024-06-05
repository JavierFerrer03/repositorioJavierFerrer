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

        // iniciar el código ajax
        $.ajax({
            url: 'index.php?accion=getchat',
            type: 'POST',
            data: 'text=' + $value,
            success: function(result) {
                // Usar setTimeout para retrasar la respuesta del bot en 2 segundos (2000 ms)
                setTimeout(function() {
                    $replay = '<div class="bot-inbox inbox"><div class="icon"><i class="fas fa-user"></i></div><div class="msg-header"><p>' + result + '</p></div></div>';
                    $(".form").append($replay);
                    // cuando el chat baja, la barra de desplazamiento llega automáticamente al final
                    $(".form").scrollTop($(".form")[0].scrollHeight);
                }, 2000); // Retraso de 2 segundos
            }
        });
    });
});