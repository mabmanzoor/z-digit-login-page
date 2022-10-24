<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Login Page</title>
	<link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>
	
	<div class="box">
	<div class="form"> 	
	<!-- <h2>Sign in</h2> -->
	<div class="cardheader col-md-12">
                
                <img src="/login/zidigit/logo.png" style="height:80px;margin:auto;">
              </div>
	    <div class="inputBox">
		   <input type="text" required ="required">
		   <span>Username</span>
		   <i></i>
		</div>	


		<div class="inputBox">
			<input type="password" required ="required">
			<span>Password</span>
			<i></i>
		</div>

		<div class="inputBox">
			<input type="select_company" required ="required">
			<!-- <span>Select Company</span> -->
			<label >Select Company</label>
            <select class="form-control js-example-basic-single" searchable="Search here..">
            <!-- <select class="form-select" aria-label="Default select example"> -->
              <option>Select Company</option>
              <option>Retaio</option>
              <option>Z-digits</option>
              <option>Falcon Securities</option>

			<i></i>
		</div>

		<!-- <div class="links">
	    	<a href="#">Forgot Password</a>
			<a href="#">Signup</a>
		</div> -->
			<input type="submit" vale="Login" href="/z-digit/">
				
			
		</div>

		
	
	</div>

</body>
</html>

<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"> </script>
<script> $(document).ready(function() {
    $('.js-example-basic-single').select2();
});
</script>