$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Add Stock");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Edit');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#addpurchasedate').val($('#purchasedate').val());
          $('#addpurchasenumber').val($('#purchasenumber').val());
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $(document).on('click', '.delete-modal', function() {
          $('#footer_action_button').text(" Delete");
          $('#footer_action_button').removeClass('glyphicon-check');
          $('#footer_action_button').addClass('glyphicon-trash');
          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').addClass('delete');
          $('.modal-title').text('Delete');
          $('.did').text($(this).data('id'));
          $('.deleteContent').show();
          $('.form-horizontal').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: 'purchase/addquantity',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'purchasenumber': $('#addpurchasenumber').val(),
                  'date': $('#addpurchasedate').val(),
                  'quantity': $('#quantity').val(),
                  'price': $('#price').val(),
                  'prodquantityid': $('#fid').val()
              },
              success: function(data) {
                $('.modal-title').text('Stock Updated');
                $('#CartInfo').modal('show');
                }
          });
      });
      $("#add").click(function() {
  
          $.ajax({
              type: 'post',
              url: 'branchs/addbranchs',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'branch_name': $('input[name=branch_name]').val(),
                  'cashier': $('select[name=cashier]').val()
              },
              success: function(data) {
                  if ((data.errors)){
                    $('.error').removeClass('hidden');
                      $('.error').text(data.errors.name);
                  }
                  else {
                      $('.error').addClass('hidden');
                      $('#table').append("<tr class='item" + data.id + "'><td>" + data.branch_name + "</td><td>" + data.cashier_id + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.branch_name + " data-cashier='" + data.cashier + "'><i class='btn-icon-only icon-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "'><i class='btn-icon-only icon-remove'> </i></a></td></tr>");
                  }
              },
  
          });
          $('#name').val('');
      });
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: 'branchs/deletebranchs',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text()
              },
              success: function(data) {
                  $('.item' + $('.did').text()).remove();
              }
          });
      });
  });
  