$(document).ready(function() {


      var toValidate = $('#boxid, #fname, #lname, #email, #contactnum, #address, #ornumber'),
        valid = false;
        toValidate.keyup(function () {
            if ($(this).val().length > 0) {
                $(this).data('valid', true);
            } else {
                $(this).data('valid', false);
            }
            toValidate.each(function () {
                if ($(this).data('valid') == true) {
                    valid = true;
                } else {
                    valid = false;
                }
            });
            if (valid === true) {
                $('input[type=submit]').prop('disabled', false);
            }else{
                $('input[type=submit]').prop('disabled', true);        
            }
        });
        
      $(document).on('click', '.submit-modal', function() {
        $('#footer_action_button').text("Process");
        $('#footer_action_button').removeClass('glyphicon-check');
        $('#footer_action_button').addClass('glyphicon-trash');
        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').addClass('delete');
        $('.modal-title').text('Process Package Order');
        $('.did').text($(this).data('id'));
        $('.deleteContent').show();
        $('.form-horizontal').hide();
        $('.errorContent').hide();
        
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });
    $('.modal-footer').on('click', '.delete', function() {
        $.ajax({
            type: 'post',
            url: '/cashier/processpackageorder',
            data: {
                '_token': $('input[name=_token]').val(),
                'boxid': $('input[name=boxid]').val(),
                'fname': $('input[name=fname]').val(),
                'lname': $('input[name=lname]').val(),
                'email': $('input[name=email]').val(),
                'contactnum': $('input[name=contactnum]').val(),
                'address': $('input[name=address]').val(),
                'packageid': $('input[name=packageid]').val(),
                'dataBranchID': $('input[name=dataBranchID]').val(),
                'userId': $('input[name=userId]').val(),
                'ordernumber': $('input[name=ordernumber]').val(),
                'ornumber': $('input[name=ornumber]').val(),
                'packapagePrice': $('input[name=packapagePrice]').val()
            },
            success: function(data) {
                window.location.href = "/cashier/packageprocesssuccess/" + $('input[name=boxid]').val();
            }
        });
    });
  });
  