$(document).ready(function () {
    
    $('#unlimited').click(function() {
        $('#preview_limit').hide();
    });
    $('#limited').click(function() {
        $('#preview_limit').show();
    });

    if ($('#ProfileLimitation').val() == 'unlimited') {
        $('#preview_limit').hide();
    } else {
        $('#preview_limit').show();
    }

});