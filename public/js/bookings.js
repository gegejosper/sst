$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').removeClass('delete');
          $('.actionBtn').removeClass('cancel');
          $('.actionBtn').removeClass('disapprove');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Edit');
          $('.deleteContent').hide();
          $('.disapproveContent').hide();
          $('.cancelContent').hide();
          $('.form-horizontal').show();
          $('.approvedSuccess').hide();
          $('.form-approve').hide();
          $('#fid').val($(this).data('id'));
          $('#productedit_name').val($(this).data('name'));
          $('#editdescription').append($(this).data('description'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $(document).on('click', '.approve-modal', function() {
        $('#footer_action_button').text("Send Quotation");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').removeClass('delete');
        $('.actionBtn').removeClass('cancel');
        $('.actionBtn').removeClass('disapprove');
        $('.actionBtn').addClass('sendqoute');
        $('.modal-title').text('Approve');
        $('.deleteContent').hide();
        $('.disapproveContent').hide();
        $('.cancelContent').hide();
        $('.form-horizontal').hide();
        $('.approvedSuccess').hide();
        $('.form-approve').show();
        $('#fid').val($(this).data('id'));
        $('#bookingemail').val($(this).data('email'));
        $('#productedit_name').val($(this).data('name'));
        $('#editdescription').append($(this).data('description'));
        $('#myModal').modal('show');
        //console.log($(this).data('name') + $(this).data('points'));
    });
      $(document).on('click', '.delete-modal', function() {
          $('#footer_action_button').text(" Delete");
          $('#footer_action_button').removeClass('glyphicon-check');
          $('#footer_action_button').addClass('glyphicon-trash');
          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').removeClass('disapprove');
          $('.actionBtn').removeClass('cancel');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').addClass('delete');
          $('.modal-title').text('Delete');
          $('.did').text($(this).data('id'));
          $('.deleteContent').show();
          $('.disapproveContent').hide();
          $('.cancelContent').hide();
          $('.form-horizontal').hide();
          $('.form-approve').hide();
          $('.approvedSuccess').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
        $(document).on('click', '.disapprove-modal', function() {
            $('#footer_action_button').text("Disapprove");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').removeClass('cancel');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('disapprove');
            $('.modal-title').text('Disapprove');
            $('.disid').text($(this).data('id'));
            $('.disapproveContent').show();
            $('.form-horizontal').hide();
            $('.cancelContent').hide();
            $('.deleteContent').hide();
            $('.form-approve').hide();
            $('.approvedSuccess').hide();
            $('.dname').html($(this).data('name'));
            $('#myModal').modal('show');
        });

        $(document).on('click', '.cancel-modal', function() {
            $('#footer_action_button').text("Disapprove");
            $('#footer_action_button').removeClass('glyphicon-check');
            $('#footer_action_button').addClass('glyphicon-trash');
            $('.actionBtn').removeClass('btn-success');
            $('.actionBtn').removeClass('delete');
            $('.actionBtn').addClass('btn-danger');
            $('.actionBtn').addClass('cancel');
            $('.modal-title').text('Cancel');
            $('.disid').text($(this).data('id'));
            $('.cancelContent').show();
            $('.form-horizontal').hide();
            $('.disapproveContent').hide();
            $('.deleteContent').hide();
            $('.form-approve').hide();
            $('.approvedSuccess').hide();
            $('.dname').html($(this).data('name'));
            $('#myModal').modal('show');
        });
        
  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: 'products/editproducts',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'product_name': $('#productedit_name').val(),
                  'description': $('#editdescription').val()
              },
              success: function(data) {
                  $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.id + "</td><td>" + data.product_name + "</td><td>" + data.description + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.supplier_name + " data-address='" + data.supplier_address + "'><i class='btn-icon-only icon-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' data-name='" + data.supplier_name + " data-address='" + data.supplier_address + "'><i class='btn-icon-only icon-remove'> </i></a></td></tr>");
                  console.log("success");
                }
          });
          
      });
        $('.modal-footer').on('click', '.sendqoute', function() {
            // console.log("success");
            // $('#approve').modal('show');
            // $('.approvedSuccess').show();
            // alert('Success');
            $.ajax({
                type: 'post',
                url: '/admin/bookings/approve',
                data: {
                    //_token:$(this).data('token'),
                    '_token': $('input[name=_token]').val(),
                    'id': $("#fid").val(),
                    'email': $("#bookingemail").val(),
                    'qoutrate': $('#qoutrate').val(),
                    'qoutdesc': $('#qoutdesc').val()
                },
                success: function(data) {
                    $('#approve').modal('show');
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
              url: '/admin/bookings/delete',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text()
              },
              success: function(data) {
                  $('.item' + $('.did').text()).remove();
              }
          });
          console.log($('.did').text());
      });
      $('.modal-footer').on('click', '.disapprove', function() {
        $.ajax({
            type: 'post',
            url: '/admin/bookings/disapprove',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.disid').text()
            },
            success: function(data) {
                //$('.status' + $('.disid').text('disapprove'));
                //console.log(data);
                location.reload();
            }
        });
      });
      $('.modal-footer').on('click', '.cancel', function() {
        $.ajax({
            type: 'post',
            url: '/admin/bookings/cancel',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.disid').text()
            },
            success: function(data) {
                //$('.status' + $('.disid').text('disapprove'));
                //console.log(data);
                location.reload();
            }
        });
      });
  });
  