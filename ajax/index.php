<!DOCTYPE html>
<html>
<head>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


</head>
<body>

<form id="foo">
   <label for="bar">A bar</label>
   <input id="bar" name="bar" type="text" value="" /> 

   <input type="submit" value="Send" />
</form>
<p id="result"></p>


<div id="rows"></div>


<script>
// Variable to hold request
var request;
readRows();
// Bind to the submit event of our form
$("#foo").submit(function(event){

   // Prevent default posting of form - put here to work in case of errors
   event.preventDefault();

   // Abort any pending request
   if (request) {
       request.abort();
   }
   // setup some local variables
   var $form = $(this);

   // Let's select and cache all the fields
   var $inputs = $form.find("input, select, button, textarea");

   // Serialize the data in the form
   var serializedData = $form.serialize();

   // fistname= "afg",lastname = "" ////    bar="Value"

   // Let's disable the inputs for the duration of the Ajax request.
   // Note: we disable elements AFTER the form data has been serialized.
   // Disabled form elements will not be serialized.
   $inputs.prop("disabled", true);

   // Fire off the request to /form.php
   request = $.ajax({
       url: "form.php",
       type: "post",
       data: serializedData // "bar"=>"serri"
   });

   // Callback handler that will be called on success
   request.done(function (response){
       // Log a message to the console
       document.getElementById("result").innerHTML= response;
       readRows();
   });

   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   // Callback handler that will be called regardless
   // if the request failed or succeeded
   request.always(function () {
       // Reenable the inputs
       $inputs.prop("disabled", false);
   });
});

function readRows(){


   // Fire off the request to /form.php
   request = $.ajax({
       url: "read.php"          });

   // Callback handler that will be called on success
   request.done(function (response){
       // Log a message to the console
       document.getElementById("rows").innerHTML= response;
   });

   // Callback handler that will be called on failure
   request.fail(function (jqXHR, textStatus, errorThrown){
       // Log the error to the console
       console.error(
           "The following error occurred: "+
           textStatus, errorThrown
       );
   });

   // Callback handler that will be called regardless
   // if the request failed or succeeded
   request.always(function () {
       // Reenable the inputs
   });
}


</script>
</body>
</html>