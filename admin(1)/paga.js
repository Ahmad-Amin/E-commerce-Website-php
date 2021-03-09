$(document).ready(function(){

    $('#submit').click(function(){
        var image_name = $('#submit').val();
        if(image_name == ''){
            alert("Please Select Image");
            return false;
        }
        else{
            var extension = $('#submit').val().split('.').pop().toLowerCase();
            if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1){
                alert("Invalid Image File");
                $('#submit').val('');
                return false;
            }
        }
    });

    
    $("#menu-toggle").click(function(e) {
      e.preventDefault();
      $("#wrapper").toggleClass("toggled");
    });
    $("#navbarDropdown").click(function(e){
        e.preventDefault();
        $("#postdiv").fadeToggle();
    });

});
