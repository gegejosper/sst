$(document).ready(function() {
    $(document).on('click', '.addquantity-modal', function() {
          $('#footer_action_button').text("Recieve Stock");
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('addquantity');
          $('.modal-title').text('Receive Quantity');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('.variation').text($(this).data('productoptionname'));
          $('.productname').text($(this).data('productname'));
          $('#fid').val($(this).data('id'));
          $('#skuid').val($(this).data('skuid'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $('.modal-footer').on('click', '.addquantity', function() {
  
          $.ajax({
              type: 'post',
              url: '/admin/purchase/recievequantity',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'requestid': $('#fid').val(),
                  'skuid': $('#skuid').val(),
                  'recievedate': $('#addrecievedate').val(),
                  'recievequantity': $('#recievequantity').val()
              },
              success: function(data) {
                //$('.modal-title').text('Stock Updated');
                location.reload();
                }
          });
      });
  });
  