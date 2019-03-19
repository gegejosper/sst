$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Recieve Stock");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Add Receive Quantity');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: '/checker/receiving/stocks',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'distributionrecordid': $('#fid').val(),
                  'recievequantity': $('#recievequantity').val()
              },
              success: function(data) {
                //$('.modal-title').text('Stock Updated');
                location.reload();
                }
          });
      });
  });
  