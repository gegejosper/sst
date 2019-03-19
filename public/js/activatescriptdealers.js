$(document).ready(function() {
    $(document).on('click', '.edit-modal', function() {
          $('#footer_action_button').text("Update");
          $('#footer_action_button').addClass('glyphicon-check');
          $('#footer_action_button').removeClass('glyphicon-trash');
          $('.actionBtn').addClass('btn-success');
          $('.actionBtn').removeClass('btn-danger');
          $('.actionBtn').addClass('edit');
          $('.modal-title').text('Edit');
          $('.errorContent').hide();
          $('.deleteContent').hide();
          $('.form-horizontal').show();
          $('#fid').val($(this).data('id'));
          $('#useredit_name').val($(this).data('name'));
          $('#useredit_pass').val($(this).data('password'));
          $('#useredit_email').val($(this).data('email'));
          $('#useredit_usertype').val($(this).data('usertype'));
          //console.log($(this).data('pass'));
          $('#myModal').modal('show');
          //console.log($(this).data('name') + $(this).data('points'));
      });
      $(document).on('click', '.activate-modal', function() {
          $('#footer_action_button').text("Activate");
          $('#footer_action_button').removeClass('glyphicon-check');
          $('#footer_action_button').addClass('glyphicon-trash');
          $('.actionBtn').removeClass('btn-success');
          $('.actionBtn').addClass('btn-info');
          $('.actionBtn').addClass('activate');
          $('.modal-title').text('Activate Account');
          $('.did').text($(this).data('id'));
          $('.activateContent').show();
          $('.successContent').hide();
          $('.form-horizontal').hide();
          $('.dname').html($(this).data('name'));
          $('#myModal').modal('show');
      });
  
      $('.modal-footer').on('click', '.edit', function() {
  
          $.ajax({
              type: 'post',
              url: 'users/editusers',
              data: {
                  //_token:$(this).data('token'),
                  '_token': $('input[name=_token]').val(),
                  'id': $("#fid").val(),
                  'name': $('#useredit_name').val(),
                  'email': $('#useredit_email').val(),
                  'password': $('#useredit_pass').val(),
                  'usertype': $('#useredit_usertype').val()
              },
              success: function(data) {
                  $('.item' + data.id).replaceWith("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.email + "</td><td>please refresh</td><td>" + data.usertype + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.name + " data-password='" + data.password + "' data-usertype='" + data.usertype + "' data-email='" + data.email + "' ><i class='btn-icon-only icon-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "' ><i class='btn-icon-only icon-remove'> </i></a></td></tr>");
                  console.log("success");
              }         
          });
           
      });
      $.ajax().done(function(response){
    //check if response has errors object
    if(response.errors){

    // do what you want with errors, 

    }
});
      $("#add").click(function() {
  
          $.ajax({
              type: 'post',
              url: 'users/addusers',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'name': $('input[name=name]').val(),
                  'email': $('input[name=email]').val(),
                  'password': $('input[name=password]').val(),
                  'usertype': $('select[name=usertype]').val()
              },
              success: function(data) {
                  if ((data.errors)){
                    //$('.error').removeClass('hidden');
                      //$('.error').text(data.errors.name);
                      //alert("Hello! I am an alert box!!");
                      $('.errorContent').show();
                      $('.actionBtn').hide();
                      $('.modal-title').text('Error');
                      $('.activateContent').hide();
                      $('.form-horizontal').hide();
                      $('#myModal').modal('show');
                  }
                  else {
                      $('.error').addClass('hidden');
                      $('#table').append("<tr class='item" + data.id + "'><td>" + data.name + "</td><td>" + data.email + "</td><td>" + data.password + "</td><td>" + data.usertype + "</td><td class='td-actions'><button class='edit-modal btn btn-small btn-success' data-id='" + data.id + "' data-name='" + data.name + " data-password='" + data.password + "' data-usertype='" + data.usertype + "' data-email='" + data.email + "' ><i class='btn-icon-only icon-pencil'> </i></button><a class='delete-modal btn btn-danger btn-small' data-id='" + data.id + "'><i class='btn-icon-only icon-remove'> </i></a></td></tr>");
                  }
              },
  
          });
         
      });
      $('.modal-footer').on('click', '.activate', function() {
          $.ajax({
              type: 'post',
              url: '/cashier/dealers/activate',
              data: {
                  '_token': $('input[name=_token]').val(),
                  'id': $('.did').text()
              },
              success: function(data) {
                // $('.successContent').show();
                // $('.actionBtn').hide();
                // $('.modal-title').text('Success');
                // $('.activateContent').hide();
                // $('.form-horizontal').hide();
                // $('#myModal').modal('show');
                location.reload();
              }
          });
      });
  });
  