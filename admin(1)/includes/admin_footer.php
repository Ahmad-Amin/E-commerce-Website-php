</div>
<!-- /#page-content-wrapper -->

</div>

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script>
$("#menu-toggle").click(function(e) {
e.preventDefault();
$("#wrapper").toggleClass("toggled");
if($('#wrapper').hasClass("toggled")){
    $('#menu-toggle').text("Show Menu");
}
else{
    $("#menu-toggle").text("Hide Menu");
}
});
$("#navbarDropdown").click(function(e){
  e.preventDefault();
  $("#postdiv").fadeToggle();
});

</script>
<script src="./ckeditor/ckeditor.js" ></script>
<script>

    CKEDITOR.replace('body',{
        filebrowserUploadUrl: 'ckeditor/ck_upload.php',
        filebrowserUploadMethod: 'form'
    });

</script>


</body>

</html>
