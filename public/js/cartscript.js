$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Add to Cart");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Add Quantity');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $("#productimg").attr("src",'/productimg/'+$(this).data('pic'));
          $('#productedit_name').text($(this).data('name'));
          $('#productamount').text($(this).data('amount'));
          $('#amount').val($(this).data('amount'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: '/cart/addproducts',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'item_id': $("#fid").val(),
                  'amount': $("#amount").val(),
                  'quantity': $('#quantity').val()
              },
              success: function(data) {
                $('.modal-title').text('Product Added');
                $('#CartInfo').modal('show');
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
  