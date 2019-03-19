$(document).ready(function() {
    $(document).on('click', '.updatecart', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Add Quantity');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#reqid').val($(this).data('reqid'));
          $("#productimg").attr("src",'/productimg/'+$(this).data('pic'));
          $('#productedit_name').text($(this).data('name'));
          $('#productamount').text($(this).data('amount'));
          $('#amount').val($(this).data('amount'));
          $('#quantity').val($(this).data('quantity'));
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
            url: '/assistant/orderupdatequantity',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'item_id': $("#fid").val(),
                'amount': $("#amount").val(),
                'reqid': $("#reqid").val(),
                'quantity': $('#quantity').val()
            },
            success: function(data) {
              //$('.modal-title').text('Product Added');
              //$('#CartInfo').modal('show');
              location.reload();
              //   $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.product_name + "</td><td>" + data.description + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.supplier_name + " data-address='" + data.supplier_address + "'><i class='btn-icon-only icon-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' data-name='" + data.supplier_name + " data-address='" + data.supplier_address + "'><i class='btn-icon-only icon-remove'> </i></a></td></tr>");
              //   console.log("success");
              }
        });
    });
      $("#add").click(function() {
  
          $.ajax({
              type: 'post',
              url: 'products/addproducts',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'product_name': $('input[name=product_name]').val(),
                  'description': $('textarea[name=description]').val()
              },
              success: function(data) {
                  if ((data.errors)){
                    $('.error').removeClass('hidden');
                      $('.error').text(data.errors.name);
                  }
                  else {
                      $('.error').addClass('hidden');
                      $('#table').append("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.product_name + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-info' data-id='" + data.id + "' data-name='" + data.supplier_name + " data-address='" + data.supplier_address + "'><i class='btn-icon-only icon-pencil'> </i></button></td></tr>");
                  }
              },
  
          });
          $('#name').val('');
      });

    
      $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: 'suppliers/deletesuppliers',
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
  