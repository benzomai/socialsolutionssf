 $(document).ready(function(){   
    //passing data from row to modal to delete
    $(".delete").on('click',function(){
        let id = $(this).attr('data-id');
        $('#id').val(id);
      });

    //deleting user
    $('#deleteUser').submit(function () {

        if ($('#confirmDelete').val() == "DELETE") {
            $('.unconfirm-delete').addAttr('hidden');
            //toast
            $("#toastAlert").addClass("bg-danger");  
            $("#toastHeader").text("Success!");
            $("#toastBody").text("User successfully delete!");
            $("#toastAlert").toast('show');

            window.setTimeout(1200);
            
            return true;
        } else {

            $('.unconfirm-delete').removeAttr('hidden');
            console.log("Nope!");
            return false;
        }
    });

});

