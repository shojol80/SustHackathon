<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style>
/* Center the loader */
#loader {
  position: absolute;
  left: 50%;
  top: 50%;
  z-index: 1;
  width: 150px;
  height: 150px;
  margin: -75px 0 0 -75px;
  border: 16px solid #f3f3f3;
  border-radius: 50%;
  border-top: 16px solid #3498db;
  width: 120px;
  height: 120px;
  -webkit-animation: spin 2s linear infinite;
  animation: spin 2s linear infinite;
}

@-webkit-keyframes spin {
  0% { -webkit-transform: rotate(0deg); }
  100% { -webkit-transform: rotate(360deg); }
}

@keyframes spin {
  0% { transform: rotate(0deg); }
  100% { transform: rotate(360deg); }
}

/* Add animation to "page content" */
.animate-bottom {
  position: relative;
  -webkit-animation-name: animatebottom;
  -webkit-animation-duration: 1s;
  animation-name: animatebottom;
  animation-duration: 1s
}

@-webkit-keyframes animatebottom {
  from { bottom:-100px; opacity:0 } 
  to { bottom:0px; opacity:1 }
}

@keyframes animatebottom { 
  from{ bottom:-100px; opacity:0 } 
  to{ bottom:0; opacity:1 }
}

#myDiv {
  display: none;
  text-align: center;
}
</style>


</head>
<body>

<div class="container">
  <h2>Horizontal form</h2>
  <form class="form-horizontal">


    <div class="form-group">
      <label class="control-label col-sm-2" for="email">File:</label>
      <div class="col-sm-10">
       <input type="file" name="sampleFile" id="fileToUpload">
      </div>
    </div>

    <div class="form-group">        
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" class="btn btn-default">Submit</button>
      </div>
    </div>
  </form>
</div>

<div id="loader" style="display:none;"></div>

<div class="alert alert-success" id="myDiv"> 

</div>

 <script>
   //form Submit action
   $("form").submit(function(evt){	
document.getElementById("loader").style.display = "block"; 
      evt.preventDefault();
      var formData = new FormData($(this)[0]);
   $.ajax({
       url: 'http://113.11.120.208/upload',
       type: 'POST',
       data: formData,
       async: false,
       cache: false,
       contentType: false,
       enctype: 'multipart/form-data',
       processData: false,
       success: function (response) {

		var url="http://113.11.120.208/do_ocr?src="+response;
		var jqxhr = $.getJSON(url, function(data) {
			var a = JSON.stringify(data);

			document.getElementById("loader").style.display = "none"; 
document.getElementById("myDiv").style.display = "block"; 

console.log(a);

$("#myDiv").html(a);   
           
		})

       }
   });
   return false;
 });
</script>



</body>
</html>

