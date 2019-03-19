// $(document).ready(function(){
//     var maxField = 10; //Input fields increment limitation
//     var addButton = $('.add_button'); //Add button selector
//     var wrapper = $('.field_wrapper'); //Input field wrapper.
//     var next = 0;
//     var fieldHTML = '<div id="field'+ next +'"><section class="form-group col-md-4"><label for="inputCity">Variation Type</label><input type="text" class="form-control" id="vartype[]"></section><section class="form-group col-md-4"><label for="inputState">Price</label><input type="text" class="form-control" id="varprice[]"></section><section class="form-group col-md-3"><label for="inputZip">Stocks</label><input type="text" class="form-control" id="varstocks[]"></section><section class="form-group col-md-1"><label for="">&nbsp;</label><a id="remove' + (next - 1) + '" href="javascript:void(0);" class="btn btn-danger remove_button "><i class="fa fa-close"></i></section></div>'; //New input field html 
//     var x = 1; //Initial field counter is 1
    
//     //Once add button is clicked
//     $(addButton).click(function(){
//         //Check maximum number of input fields
//         if(x < maxField){ 
//             x++; //Increment field counter
//             $(wrapper).append(fieldHTML); //Add field html
//         }
//         next = next + 1;
//     });
    
//     //Once remove button is clicked
//     $(wrapper).on('click', '.remove_button', function(e){
//         e.preventDefault();
//         // $(this).parent('div').remove(); //Remove field html
        
//         var fieldNum = this.id.charAt(this.id.length-1);
//         var fieldID = "#field" + fieldNum;
//         $(this).remove();
//         $(fieldID).remove();
//         console.log(fieldNum);
//         x--; //Decrement field counter
//     });
// });

$(document).ready(function () {
    //@naresh action dynamic childs
    var next = 0;
    $("#add-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><!-- Text input--><div class="form-group col-md-4"><label class="control-label" for="Variation">Variation Type</label>  <div class=""><input id="vartype" name="vartype[]" type="text" placeholder="" class="form-control input-md"></div></div><div class="form-group col-md-4"><label class="control-label" for="Price">Price</label><div class=""><input id="varprice" name="varprice[]" type="number" placeholder="" class="form-control input-md"></div></div><div class="form-group col-md-3"><label class="control-label" for="Stocks">Warehouse Stocks</label><div class=""><input id="varstocks" name="varstocks[]" type="number" placeholder="" class="form-control input-md"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<div class="form-group col-md-1" id="remove' + (next - 1) + '"><label for="">&nbsp;</label><button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" ><i class="fa fa-close"></i></button></div></div>';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                var removeID = "#remove" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
                $(removeID).remove();
            });
    });
    $("#update-more").click(function(e){
        e.preventDefault();
        var addto = "#field" + next;
        var addRemove = "#field" + (next);
        next = next + 1;
        var newIn = '<div id="field'+ next +'" name="field'+ next +'"><!-- Text input--><div class="form-group col-md-4"><label class="control-label" for="Variation">Variation Type</label>  <div class=""><input id="vartype" name="vartype[]" type="text" placeholder="" class="form-control input-md"></div></div><div class="form-group col-md-4"><label class="control-label" for="Price">Price</label><div class=""><input id="varprice" name="varprice[]" type="number" placeholder="" class="form-control input-md"></div></div><div class="form-group col-md-3"><label class="control-label" for="Stocks">Warehouse Stocks</label><div class=""><input id="varstocks" name="varstocks[]" type="number" placeholder="" class="form-control input-md"></div></div></div>';
        var newInput = $(newIn);
        var removeBtn = '<div class="form-group col-md-1" id="remove' + (next - 1) + '"><label for="">&nbsp;</label><button id="remove' + (next - 1) + '" class="btn btn-danger remove-me" ><i class="fa fa-close"></i></button></div></div>';
        var removeButton = $(removeBtn);
        $(addto).after(newInput);
        $(addRemove).after(removeButton);
        $("#field" + next).attr('data-source',$(addto).attr('data-source'));
        $("#count").val(next);  
        
            $('.remove-me').click(function(e){
                e.preventDefault();
                var fieldNum = this.id.charAt(this.id.length-1);
                var fieldID = "#field" + fieldNum;
                var removeID = "#remove" + fieldNum;
                $(this).remove();
                $(fieldID).remove();
                $(removeID).remove();
            });
    });

    $(document).on('click', '.edit-product', function() {
        $('#footer_action_button').text("Update");
        $('#footer_action_button').addClass('glyphicon-check');
        $('#footer_action_button').removeClass('glyphicon-trash');
        $('.actionBtn').addClass('btn-success');
        $('.actionBtn').removeClass('btn-danger');
        $('.actionBtn').addClass('edit');
        $('.modal-title').text('Edit Variation');
        $('.deleteContent').hide();
        $('.form-horizontal').show();
        $('#fid').val($(this).data('id'));
        $('#optionid').val($(this).data('optionid'));
        $('#editvartype').val($(this).data('optionname'));
        $('#editvarprice').val($(this).data('varprice'));
        $('#editvarstocks').val($(this).data('warehousequantity'));
        $('#myModal').modal('show');
        //console.log($(this).data('name') + $(this).data('points'));
    });
    $('.modal-footer').on('click', '.edit', function() {
  
        $.ajax({
            type: 'post',
            url: '/admin/products/updateproductvariation',
            data: {
                //_token:$(this).data('token'),
                '_token': $('input[name=_token]').val(),
                'id': $("#fid").val(),
                'optionid': $("#optionid").val(),
                'vartype': $('#editvartype').val(),
                'varprice': $('#editvarprice').val(),
                'varstocks': $('#editvarstocks').val()
            },
            success: function(data) {
                alert("Variation Updated!");
                location.reload();
            }
        });
    });

});