$(document).ready(function() {
    $(document).on('click', '.updatepass', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Update Password');
          $('.errorContent').hide();
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
        //   $('#useredit_usertype').val($(this).data('usertype'));
          //console.log($(this).data('pass'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: '/cashier/updatepass',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'password': $('#useredit_pass').val()
              },
              success: function(data) {
                  alert("Password Successfully Updated!");
                  location.reload();
              }         
          });
           
      });
      $.ajax().done(function(response){
    //check if response has errors object
    if(response.errors){

    // do what you want with errors, 

    }
});
      
  });
  