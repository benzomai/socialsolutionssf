
$(document).ready(function(){   
         
    $('body').append('<div style="" id="loadingDiv"><div class="loader">Loading...</div></div>');
    $(window).on('load', function(){
    setTimeout(removeLoader, 100); //wait for page load PLUS two seconds.
    });
    function removeLoader(){
        $( "#loadingDiv" ).fadeOut(800, function() {
        // fadeOut complete. Remove the loading div
        $( "#loadingDiv" ).remove(); //makes page more lightweight 
    });  
    }

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
    var table = new DataTable('#smmTable');

    $('#smmTable').on('click', 'tr', '.updateBtn', function() {

        console.log(table.row(this).data()[0]);

        $('#updateSmmID').text(table.row(this).data()[0]);
        $('#updateInputName').val(table.row(this).data()[1])
    });

});

