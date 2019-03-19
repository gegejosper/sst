$(document).ready(function() {


    var toValidate = $('#howmany, #fname, #lname, #email, #contactnum, #address, #ornumber'),
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
      $('#howmany').on('input',function() {
        var Inputs = '';
        for (var i = 0; i < $("#howmany").val(); i++) {
          Inputs += '<input name="boxid[]" placeholder="Please input Box ID Number(s)" size="50"/>';
        }
        $('#boxquantity').html(Inputs);
      });
    $(document).on('click', '.submit-modal', function() {
      $('#footer_action_button').text("Process");
      $('#footer_action_button').removeClass('glyphicon-check');
      $('#footer_action_button').addClass('glyphicon-trash');
      $('.actionBtn').removeClass('btn-success');
      $('.actionBtn').addClass('btn-success');
      $('.actionBtn').addClass('process');
      $('.modal-title').text('Process Package Order');
      $('.did').text($(this).data('id'));
      $('.deleteContent').show();
      $('.form-horizontal').hide();
      $('.errorContent').hide();
      
      $('.dname').html($(this).data('name'));
      $('#myModal').modal('show');
  });
  $('.modal-footer').on('click', '.process', function() {  
    var boxid = $('input[name="boxid[]"]').map(function(){ 
        return this.value; }).get();
    $.ajax({
          type: 'post',
          url: '/cashier/processdealerpackageorder',
          dataType: 'json',
          data: {
              '_token': $('input[name=_token]').val(),
              'quantity': $('input[name=quantity]').val(),
              'boxid[]' : boxid,
              'dealerid': $('select[name=dealer]').val(),
              'packageid': $('input[name=packageid]').val(),
              'dataBranchID': $('input[name=dataBranchID]').val(),
              'ordernumber': $('input[name=ordernumber]').val(),
              'ornumber': $('input[name=ornumber]').val(),
              'packapagePrice': $('input[name=packapagePrice]').val()
          },
          success: function(response) {
            window.location.href = "/cashier/packagenewdealerprocesssuccess/" + response.dealerid +"/" + response.ordernumber;
          }
      });
  });
});
