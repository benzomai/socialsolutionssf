
$(window).on('load', function(){
    setTimeout(removeLoader, 0); //wait for page load PLUS two seconds.
    });
    function removeLoader(){
        $( "#loadingDiv" ).fadeOut(400, function() {
        // fadeOut complete. Remove the loading div
        $( "#loadingDiv" ).remove(); //makes page more lightweight 
    });  
}


$(document).ready(function(){   

    var clientTable = new DataTable('#clientTable');
    var userTable = new DataTable('#userTable');
        
    
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

    //updating SMM
    var smmTable = new DataTable('#smmTable');

    $('#smmTable').on('click', 'tr', '.updateBtn', function() {

        $('#updateSmmID').text(smmTable .row(this).data()[0]);
        $('#updateInputName').val(smmTable .row(this).data()[1])

    });

});

