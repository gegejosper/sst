$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Update Package Price');
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#packageedit_name').val($(this).data('name'));
          $('#editdescription').append($(this).data('description'));
          $('#packagepriceedit').val($(this).data('price'));
          $('#packagedealerspriceedit').val($(this).data('dprice'));
          $('#dealerpackagepriceedit').val($(this).data('dealersprice'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: '/admin/packages/editbranchpackage',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'packagename': $('#packageedit_name').val(),
                  'packageprice': $('#packagepriceedit').val(),
                  'dealersprice': $('#packagedealerspriceedit').val()
              },
              success: function(data) {
                  //$('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.packagename + "</td><td>" + data.packageprice + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.packagename + " data-description='" + data.description + " data-price='" + data.packageprice +"'><i class='btn-icon-only icon-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' data-name='" + data.supplier_name + " data-address='" + data.supplier_address + "'><i class='btn-icon-only icon-remove'> </i></a></td></tr>");
                  //console.log("success");
                  location.reload();
                }
          });
      });
      $(document).on('click', '.branchedit-modal', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('brancheditedit');
        $('.modal-title').text('Update Package Price');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#packageedit_name').val($(this).data('name'));
        $('#packagepriceedit').val($(this).data('price'));
        $('#dealerpackagepriceedit').val($(this).data('dealersprice'));
        $('#myModal').modal('show');
        //console.log($(this).data('name') + $(this).data('points'));
    });  
    $('.modal-footer').on('click', '.brancheditedit', function() {

        $.ajax({
            type: 'post',
            url: '/cashier/packages/editbranchpackage',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'packagename': $('#packageedit_name').val(),
                'packageprice': $('#packagepriceedit').val(),
                'dealerpackageprice': $('#dealerpackagepriceedit').val()
            },
            success: function(data) {
                location.reload();
              }
        });
    });
  });
  