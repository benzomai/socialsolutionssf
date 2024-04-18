 $(document).ready(function(){   
    //passing data from row to modal to delete
    $(".delete").on('click',function(){
        let id = $(this).attr('data-id');
        let name = $(this).attr('data-name');
        $('#user-name').text(name);
        $('#id').val(id);
      });

    //selecting type of user on adding user modal
    

    //deleting user
    $('#deleteUser').submit(function () {

        if ($('#confirmDelete').val() == "DELETE") {
            $('.unconfirm-delete').addAttr('hidden');
            //toast
            $("#toastAlert").toast('show');
            $("#toastAlert").addClass("bg-danger");  
            $("#toastHeader").text("Success!");
            $("#toastBody").text("User successfully delete!");

            window.setTimeout(1200);
            
            return true;
        } else {

            $('.unconfirm-delete').removeAttr('hidden');
            console.log("Nope!");
            return false;
        }
    });

});

