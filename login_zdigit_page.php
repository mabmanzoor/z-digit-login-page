<?php $path_to_root = "."; 
  $js = "<script language='JavaScript' type='text/javascript'>
function defaultCompany()
{
  document.forms[0].company_login_name.options[".user_company()."].selected = true;
}
</script>";

  add_js_file('login.js');
  // Display demo user name and password within login form if allow_demo_mode option is true
  if ($SysPrefs->allow_demo_mode == true)
  {
      $demo_text = _("Login as user: demouser and password: password");
  }
  else
  {
    $demo_text = _("Please login here");
      if (@$SysPrefs->allow_password_reset) {
          $demo_text .= " "._("or")." <a href='$path_to_root/index.php?reset=1'>"._("request new password")."</a>";
      }
  }

  if (check_faillog())
  {
    $blocked = true;

      $js .= "<script>setTimeout(function() {
        document.getElementsByName('SubmitUser')[0].disabled=0;
        document.getElementById('log_msg').innerHTML='$demo_text'}, 1000*".$SysPrefs->login_delay.");</script>";
      $demo_text = '<span class="redfg">'._('Too many failed login attempts.<br>Please wait a while or try later.').'</span>';
  } elseif ($_SESSION["wa_current_user"]->login_attempt > 1) {
    $demo_text = '<span class="redfg">'._("Invalid password or username. Please, try again.").'</span>';
  }

  flush_dir(user_js_cache());
  if (!isset($def_coy))
    $def_coy = 0;
  $def_theme = "default";

  $login_timeout = $_SESSION["wa_current_user"]->last_act;

  $title = $login_timeout ? _('Authorization timeout') : $SysPrefs->app_title." ".$version." - "._("Login");
  $encoding = isset($_SESSION['language']->encoding) ? $_SESSION['language']->encoding : "iso-8859-1";
  $rtl = isset($_SESSION['language']->dir) ? $_SESSION['language']->dir : "ltr";
  $onload = !$login_timeout ? "onload='defaultCompany()'" : "";
  ?>
<!DOCTYPE html>
<html lang="en">
<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>ZDIGIT</title>
  <!-- General CSS Files -->
  <link rel="stylesheet" href="<?= $path_to_root?>/themes/default/login1.css">
  <link rel="stylesheet" href="<?= $path_to_root?>/themes/default/app.min.css">
  <link rel="stylesheet" href="<?= $path_to_root ?>/themes/default/bootstrap-social/bootstrap-social.css">
  <!-- Template CSS -->
  <link rel="stylesheet" href="<?= $path_to_root?>/themes/default/login1.css">
  <link rel="stylesheet" href="<?=$path_to_root?>/themes/default//style.css">
  <link rel="stylesheet" href="<?=$path_to_root?>/themes/default//components.css">
  <!-- Custom style CSS -->
  <link rel="stylesheet" href="<?= $path_to_root?>/themes/default/login1.css">
  <link rel="stylesheet" href="<?=$path_to_root?>/themes/default//custom.css">
  <link rel='shortcut icon' type='image/x-icon' href='<?= $path_to_root ?>/Logos/apple-icon.png' />
</head>

<style type="text/css">
  @import url('https: //fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700;800;900&display=swap');

*{
  margin: 0;
  padding: 0;
  box-sizing: border-box;
  font-family: 'Poppins', sans-serif;
}

body{
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
  background: #23242ae8;
  height: 180px;
}

/*box size*/
.box{
  position: relative;
  width: 380px;
  height: 500px;
  background: #4d9bd6;;
  border-radius: 8px;
  overflow: hidden;
  height: 550px;
  box-shadow: 6px 6px 10px 0px grey;
  margin-left: -66%;
}

.box::before{
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 380px;
  height: 420px;
  background: linear-gradient(0deg,transparent,green,green);
  transform-origin: bottom right;
  animation: animate 6s linear infinite;
}

.box::after{
  content: '';
  position: absolute;
  top: -50%;
  left: -50%;
  width: 100px;
  height: 420px;
  background: linear-gradient(0deg,transparent,#971daf,#971daf);
  transform-origin: bottom right;
  animation: animat 6s linear infinite;
  animation-delay: -3s;
}

@keyframes animate{
  0%
  {
    transform: rotate(0deg);
  }
  100%
  {
    transform: rotate(360deg);
  }
}

.form{
  position: absolute;
  inset: 4px;
  border-radius: 8px;
  background: #28292d;
  z-index: 10;
  padding: 50px 40px;
  display: flex;
  flex-direction: column;
}

.form h2{
  color: green;
  font-weight: 500;
  text-align: center;
  letter-spacing: 0.1em;
}

.inputBox{
  position: relative;
  width: 300px;
  margin-top: 20px;
  margin-left: -100px;
}
.inputBox input{
  position: relative;
  width: 100%;
  padding: 20px 10px 10px;
  background: transparent;
  border: none;
  outline: none;
  color: #23242a;
  font-size: 1em;
  letter-spacing: 0.05em;
  z-index: 10;
}

.inputBox span{
  position: absolute;
  left: 0;
  padding: 20px 0px 10px;
  font-size: 1em;
  color: #8f8f8f;
  pointer-events: none;
  letter-spacing: 0.05em;
  transition: 0.5s ;
}

.inputBox input:valid ~ span,
.inputBox input:focus~ span
{
  color: /*blue*/ #509DD9;
  transform: translateX(0px) translateY(-34px);
  font-size: 0.75em;
}
.inputBox i{
  position: absolute;
  left: 0;
  bottom: 0;
  width: 100%;
  height: 2px;
  background: #509DD9;
  border-radius: 4px;
  transition: 0.5s;
  pointer-events: none;
  z-index: 9;
}

.inputBox input:valid ~ i,
.inputBox input:focus~ i
{
  height: 44px;
}

.links{
  display: flex;
  justify-content: space-between;
}

.links a{
  margin: 10px 0;
  font-size: 0.75em;
  color: #8f8f8f;
  text-decoration: none;
}

.links a:hover,
.links a:nth-child(2)
{
  color: #45f3ff;
}

input[type="submit"]
{
  border: none;
  outline: none;
  background: #5D9734;
  padding: -11px -25px;
  width: 190px;
  margin-top: 69px;
  border-radius: 31px;
  font-weight: 600;
  cursor: pointer;
  margin-left: 53px;
}


input[type="submit"]:active
{
  opacity: 0.8s;
}

.cardheader img{
  display: flex;
  margin-top: 20%;
  margin: -5px;
}


/*select company*/
label {
    color: #8f8f8f;
}

select.form-control.js-example-basic-single {
    background: #509DD9;
}

input[type="select_company"] {
    display: flex;
     margin: auto; 
    margin-top: -16px;
}


    /*select options*/

    .form-control option {
    background: #008000b0;
}

.form-group button
{
  margin-top: 20px;
  padding: 5px;

}

.card-body {
    -ms-flex: 1 1 auto;
    -webkit-box-flex: 1;
    flex: 1 1 auto;
    padding: 1.25rem;
    width: 233px;
    margin-left: -30px;
}
.theme-white .btn-primary {
    background-color: #6777ef;
    border-color: transparent !important;
    color: #fff;
    margin-top: 51px;
    /* padding: 2px 0px 8px; */
    margin-left: -44px;
}

</style>
<style>
    table
    {
        display:none;
    }
    .main-footer
    {
        display:none;
    }
    .footer-left
    {
      display: none;
    }
    
</style>
<body>
  <div class="box">
  <div class="form">
  <div class="loader"></div>
  <div id="app">
    <section class="section">
      <div class="container">
        <div class="row">

          <div class="col-12 col-sm-8 offset-sm-2 col-md-6 offset-md-3 col-lg-6 offset-lg-3 col-xl-4 offset-xl-4">
              <div class="cardheader col-md-12">
                <img src="<?= $path_to_root ?>/Logos/logo.png"/ style="height:80px;margin-left: -75px;">
              </div>
              <div class="card-body">
                
                  <?php start_form(false, false, $_SESSION['timeout']['uri'], "loginform"); ?>


                  <div class="inputBox">
                    <label for="email">Username</label>
                    <input id="username" type="text" class="form-control" placeholder="Enter Username" name="user_name_entry_field" tabindex="1" required autofocus>
                    <div class="invalid-feedback">
                      Please fill in your email
                    </div>
                  </div>

                  <div class="inputBox">
                    <div class="d-block">
                      <label for="password" class="control-label">Password</label>
                    </div>
                    <input id="password" type="password" class="form-control" placeholder="Enter Password" name="password" tabindex="2" required>
                    <div class="invalid-feedback">
                      please fill in your password
                    </div>
                  </div>

                   <div class="inputBox">
                    <div class="d-block">
                      <label for="password" class="control-label">Select Company</label>
                    </div>
                    <select class="form-control" name="company_login_name">
                      <option>Select Company</option>
                      <?php 
                        for ($i = 0; $i < count($db_connections); $i++)
                          echo "<option value=$i ".($i==$coy ? 'selected':'') .">" . $db_connections[$i]["name"] . "</option>";
                      ?>
                    </select>
                  </div>
                  <div class="form-group">
                    <button type="submit" name="SubmitUser" class="btn btn-primary btn-lg btn-block" tabindex="4">
                      Login
                    </button>
                  </div>
                <?php end_form(1); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  <?php $path_to_root = "."; ?>
     <script src="<?= $path_to_root ?>/assets/js/app.min.js"></script>
  <!-- JS Libraies -->
  <script src="<?= $path_to_root ?>/assets/bundles/apexcharts/apexcharts.min.js"></script>
  <!-- Page Specific JS File -->
  <script src="<?= $path_to_root ?>/assets/js/page/index.js"></script>
  <!-- Template JS File -->
  <script src="<?= $path_to_root ?>/assets/js/scripts.js"></script>
  <!-- Custom JS File -->
  <script src="<?= $path_to_root ?>/assets/js/custom.js"></script>
  </div>
  <!-- General JS Scripts -->
</div>
</div>
</body>


<!-- auth-login.html  21 Nov 2019 03:49:32 GMT -->
</html>
