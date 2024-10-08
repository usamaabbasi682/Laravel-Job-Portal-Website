$(document).ready(function () {

    if ($('#ProfileLimitation').val() == 'unlimited') {
        $('#preview_limit').hide();
    } else {
        $('#preview_limit').show();
    }

    if ($('#selected_feature').val() == 'custom_salary') {
        $('#custom_salary_row').removeClass('d-none');
        $('#salary_range_row').addClass('d-none');
    } else {
        $('#salary_range_row').removeClass('d-none');
        $('#custom_salary_row').addClass('d-none');
    }

    if ($('#applicant_apply').val() == 'Email-Address') {
        $('#emailAddress').removeClass('d-none');
        $('#applyUrl').addClass('d-none');
    }else if ($('#applicant_apply').val() == 'Custom-URL') {
        $('#applyUrl').removeClass('d-none');
        $('#emailAddress').addClass('d-none');
    } else {
        $('#applyUrl').addClass('d-none');
        $('#emailAddress').addClass('d-none');
    }

    $('#unlimited').click(function() {
        $('#preview_limit').hide();
    });
    $('#limited').click(function() {
        $('#preview_limit').show();
    });

    // Create Job Apply URL Code hide and Show
    $('select[name="receive_applications"]').change(function () { 
        var value = $(this).val();

        if (value == 'Email-Address') {
            $('#emailAddress').removeClass('d-none');
            $('#applyUrl').addClass('d-none');
        }else if (value == 'Custom-URL') {
            $('#applyUrl').removeClass('d-none');
            $('#emailAddress').addClass('d-none');
        } else {
            $('#applyUrl').addClass('d-none');
            $('#emailAddress').addClass('d-none');
        }
    });

    $('#salary_range').click(function() {
        $('#salary_range_row').removeClass('d-none');
        $('#custom_salary_row').addClass('d-none');
    });

    $('#custom_salary').click(function() {
        $('#custom_salary_row').removeClass('d-none');
        $('#salary_range_row').addClass('d-none');
    });

    // Company Filters

    $('.company_filter').change(function() {
        $('#company_filter_form').submit();
    });

});