$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Add to List");
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Distribution');
          $('.deleteContent').hide();
          $('.generateContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $(document).on('click', '.distri-modal', function() {
        $('#footer_action_button').text("Add to List");
       
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('distri');
        $('.modal-title').text('Distribution');
        $('.deleteContent').hide();
        $('.generateContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#skuid').val($(this).data('skuid'));
        $('#quantity').prop('max',$(this).data('max'));
        $('#quantity').prop('placeholder',$(this).data('max'));
        $('.max').text($(this).data('max'));
        $('.variation').text($(this).data('productoptionname'));
        $('.productname').text($(this).data('productname'));
        $('#myModal').modal('show');
        //console.log($(this).data('name') + $(this).data('points'));
    });
    $(document).on('click', '.delete-modal', function() {
          $('#footer_action_button').text(" Delete");

          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').addClass('btn-danger');
          $('.actionBtn').addClass('delete');
          $('.modal-title').text('Delete');
          $('.did').text($(this).data('id'));
          $('.deleteContent').show();
          $('.generateContent').hide();
          $('.form-horizontal').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
      $(document).on('click', '.delete-modalAdmin', function() {
        $('#footer_action_button').text(" Delete");

        $('.actionBtn').removeClass('btn-success');
        $('.actionBtn').addClass('btn-danger');
        $('.actionBtn').addClass('deleteAdmin');
        $('.modal-title').text('Delete');
        $('.did').text($(this).data('id'));
        $('#productid').val($(this).data('productid'));
        $('#skuid').val($(this).data('skuid'));
        $('#removequantity').val($(this).data('quantity'));
        $('.deleteContent').show();
        $('.generateContent').hide();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.generate-modal', function() {
        $('#footer_action_button').text("Generate");        
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').addClass('generate');
        $('.modal-title').text('Generate Delivery');
        $('.distributionnumber').text($(this).data('distributionnumber'));
        $('.generateContent').show();
        $('.deleteContent').hide();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });
    $(document).on('click', '.generate-modalAdmin', function() {
        $('#footer_action_button').text("Generate");       
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').addClass('generateAdmin');
        $('.modal-title').text('Generate Delivery');
        $('.distributionnumber').text($(this).data('distributionnumber'));
        $('.generateContent').show();
        $('.deleteContent').hide();
        $('.form-horizontal').hide();
        $('.dname').html($(this).data('name'));
        $('#myModal').modal('show');
    });
  
     
      $('.modal-footer').on('click', '.distri', function() {
       var quantity = parseInt($('#quantity').val());
       var maxquantity = parseInt($('#quantity').attr('max'));
       console.log("Value: " + $('#quantity').val());
       console.log("Max: " + $('#quantity').attr('max'));
        if( maxquantity >= quantity){
            $.ajax({
                type: 'post',
                url: '/admin/distribution/adddistributionrecord',
                data: {
                
                    '_token': $('input[name=_token]').val(),
                    'distributionnumber': $('#adddistributionnumber').val(),
                    'date': $('#adddistributionnumberdate').val(),
                    'branchid': $('#addbranchid').val(),
                    'sku_id': $('#skuid').val(),
                    'quantity': $('#quantity').val(),
                    'prodquantityid': $('#fid').val()
                },
                success: function(data) {
                location.reload();
                }
            });
        }
        else {
            $('.modal-title').text('Distribution Error');
            $('#distributionerror').modal('show');
            console.log("Value: " + $('#quantity').val());
            console.log("Max: " + $('#quantity').attr('max'));

        }
    });
    $('.modal-footer').on('click', '.delete', function() {
          $.ajax({
              type: 'post',
              url: '/accounting/distribution/deletedistributionrecord',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text(),
                  
              },
              success: function(data) {
                location.reload();
              }
          });
    });
    $('.modal-footer').on('click', '.deleteAdmin', function() {
        $.ajax({
            type: 'post',
            url: '/admin/distribution/deletedistributionrecord',
            data: {
                '_token': $('input[name=_token]').val(),
                'id': $('.did').text(),
                'productid': $('#productid').val(),
                'skuid': $('#skuid').val(),
                'removequantity': $('#removequantity').val()
            },
            success: function(data) {
              location.reload();
            }
        });
  });
$('.modal-footer').on('click', '.generateAdmin', function() {
        $.ajax({
            type: 'post',
            url: '/admin/distribution/generatedistribution',
            data: {
                '_token': $('input[name=_token]').val(),
                'distributionnumber': $('.distributionnumber').text()
            },
            success: function(data) {
                window.location.href = '/admin/distribution/history/' + $('.distributionnumber').text(); 
            }
        });
    });
  });
  