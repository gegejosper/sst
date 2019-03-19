$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Cancel Order");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').removeClass('cancelpackage');
          $('.actionBtn').removeClass('canceldealer');
          $('.actionBtn').addClass('cancel');
          $('.modal-title').text('Edit')    ;
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#ordernumber').val($(this).data('ordernumber'));
          $('#ornumber').val($(this).data('ornumber'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $('.modal-footer').on('click', '.cancel', function() {
  
          $.ajax({
              type: 'post',
              url: '/cashier/cancelorder',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'ordernumber': $('#ordernumber').val(),
                  'ornumber': $('#ornumber').val(),
                  'reason': $('#reason').val()
              },
              success: function(data) {
                alert("Cancel Order Succefully Updated.");
                location.reload();
            }
          });
      });
      $(document).on('click', '.cancel-package', function() {
        $('#footer_action_button').text("Cancel Order");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('canceldealer');
        $('.actionBtn').removeClass('cancel');
        $('.actionBtn').addClass('cancelpackage');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#ordernumber').val($(this).data('ordernumber'));
        $('#ornumber').val($(this).data('ornumber'));
        $('#myModal').modal('show');
        //console.log($(this).data('name') + $(this).data('points'));
    });
    $('.modal-footer').on('click', '.cancelpackage', function() {

        $.ajax({
            type: 'post',
            url: '/cashier/cancelpackage',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'ordernumber': $('#ordernumber').val(),
                'ornumber': $('#ornumber').val(),
                'reason': $('#reason').val()
            },
            success: function(data) {
                alert("Cancel Order Succefully Updated.");
                location.reload();
          }
        });
    });
    $(document).on('click', '.cancel-dealer', function() {
        $('#footer_action_button').text("Cancel Order");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').removeClass('cancel');
        $('.actionBtn').removeClass('cancelpackage');
        $('.actionBtn').addClass('canceldealer');
        $('.modal-title').text('Edit');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#ordernumber').val($(this).data('ordernumber'));
        $('#ornumber').val($(this).data('ornumber'));
        $('#myModal').modal('show');
        //console.log($(this).data('name') + $(this).data('points'));
    });
    $('.modal-footer').on('click', '.canceldealer', function() {

        $.ajax({
            type: 'post',
            url: '/cashier/canceldealer',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'ordernumber': $('#ordernumber').val(),
                'ornumber': $('#ornumber').val(),
                'reason': $('#reason').val()
            },
            success: function(data) {
            alert("Cancel Order Succefully Updated.");
              location.reload();
          }
        });
    });
  });
  