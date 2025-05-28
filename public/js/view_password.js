$(document).ready(function() {
    $("#toggle_view_senha").on('click', function(event) {
        event.preventDefault();
        if($('#senha').attr("type") == "text"){
            $('#senha').attr('type', 'password');
            $('#simbol').addClass( "fa-eye-slash" );
            $('#simbol').removeClass( "fa-eye" );
        }else if($('#senha').attr("type") == "password"){
            $('#senha').attr('type', 'text');
            $('#simbol').removeClass( "fa-eye-slash" );
            $('#simbol').addClass( "fa-eye" );
        }
    });
});