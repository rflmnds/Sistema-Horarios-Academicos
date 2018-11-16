$(document).ready(function() {
    $("#toggle_view_senha").on('click', function(event) {
        event.preventDefault();
        if($('#senha').attr("type") == "text"){
            $('#senha').attr('type', 'password');
            $('#toggle_view_senha').addClass( "glyphicon-eye-close" );
            $('#toggle_view_senha').removeClass( "glyphicon-eye-open" );
        }else if($('#senha').attr("type") == "password"){
            $('#senha').attr('type', 'text');
            $('#toggle_view_senha').removeClass( "glyphicon-eye-close" );
            $('#toggle_view_senha').addClass( "glyphicon-eye-open" );
        }
    });
});