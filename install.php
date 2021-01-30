<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Install BS-CMS. A simple, flat file CMS created by Shane Zentz in 2020.">
    <meta name="author" content="Shane Zentz">
    <!-- Favicon -->
	<link rel="shortcut icon" type="image/x-icon" href="images/favicon.png">

    <title>Install BS-CMS</title>

    	<style>
	body {background-color:#091e33 !important;
	      color:white !important;}
	</style>

    <link rel="canonical" href="">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="starter-template.css" rel="stylesheet">
	<style>
	.buttonHeight {min-height:60px;}
	.btn-primary {background-color:#1a314a !important;border-color:#1a314a !important;}
	</style>
  </head>
 
<body>

<div class="container">
	<div class="row justify-content-center pt-5">
	<div class="col-12 p-3">
	<h1 class="text-center p-2" style="font-size:3.5rem;font-weight:bold">Install BS-CMS</h1>
<form action="admin/post-install.php" method="post" enctype="multipart/form-data" >
<div class="form-group"><h5>Admin Username</h5>
	   <input type="text" class="form-control form-control-lg" name="siteAdmin" placeholder="Site Admin" required>
	   <small id="formDesc" class="form-text">Please enter your sites Admin name.</small>
	 </div>
	 	 <div class="form-group"><h5>Admin Password</h5>
	   <input type="password" class="form-control form-control-lg" name="siteAdminPassword" placeholder="Site Password" required>
	   <small id="formDesc" class="form-text">Please enter your sites Admin Password. Tip(Use Generate Password Button below to generate a strong random password).</small>
	 </div>
	 <div class="form-group"><h5>Site Title (optional)</h5>
	   <input type="text" class="form-control form-control-lg" name="siteTitle">
	   <small id="formDesc" class="form-text">Please enter your sites title or slogan.</small>
	 </div>
	 <div class="form-group"><h5>Favicon (optional)</h5>
	   <input type="file" name="faviconUpload" id="faviconUpload" >
	   <small id="formDesc" class="form-text">Please upload your sites favicon (32px x 32px)</small>
	 </div>
	 <div class="form-group"><h5>Site Logo (optional)</h5>
	   <input type="file" name="logoUpload" id="logoUpload" >
	   <small id="formDesc" class="form-text">Please upload your websites logo. Best size is under 300px x 300px.</small>
	 </div>
	 
	 
	 <div class="form-group">
        <button type="submit" name="submit" class="btn btn-primary btn-lg mr-2 w-100 buttonHeight">Install</button>
    </div>
</form><br clear="all">

<!-- START RANDOM PASSWORD GENERATOR 
<button class="btn btn-primary" type="button" data-toggle="collapse" data-target="#collapsePassword" aria-expanded="false" aria-controls="collapseExample">
    Automatic Password Generator
  </button>-->
  <div class="row">
  <div class="col-sm">
  <button class="btn btn-primary" onclick="gfg_Run()">
    Automatic Password Generator
  </button>
  </div>
  <div class="col-sm">
  <p>Remember to write the password down, or copy/paste to a file</p>
  <textarea id="geeks" rows="2" cols="50">&nbsp;</textarea> 
  </div>
  </div>
  
  
  
<div class="bg-light fixed-bottom text-dark collapse" id="collapsePassword">
    <div class="text-center py-3">
        <p class="mb-0">
            Generate a strong random password! Remember to write the password down, or copy/paste to a file.</p><p><button class="btn btn-primary" onclick ="gfg_Run()">Generate Password</button> 
        </p>
		<!--<p id="geeks">&nbsp;</p> -->
    </div>
	<script> 
        var el_down = document.getElementById("geeks"); 
  
        /* Function to generate combination of password */ 
        function generateP() { 
            var pass = ''; 
            var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' +  
                    'abcdefghijklmnopqrstuvwxyz0123456789@#$!%^&*(){}[]?'; 
              
            for (i = 0; i <= 24; i++) { 
                var char = Math.floor(Math.random() 
                            * str.length + 1); 
                  
                pass += str.charAt(char) 
            } 
              
            return pass; 
        } 
  
        function gfg_Run() { 
            //el_down.innerHTML = generateP();
            var passes = generateP();			
			//alert("Generate a strong random password! Remember to write the password down, or copy/paste to a file."+"\n"+passes);
			el_down.innerHTML = passes;
        } 
    </script> 
</div>


</div>
</div>
</div>

<!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

  </body>
</html>

