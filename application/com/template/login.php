<link rel="stylesheet" href="css/login.css">

<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

    <!-- Icon -->
    <div class="fadeIn first">
      <img class="navbar-brand" src="img/icon-navbar.png" alt="logo" width="50" height="50">
    </div>

    <!-- Login Form -->
    <form id="form-login" name="encoder" action="/koperasi/login" method="post">
      <input name="encdec" type="hidden" value="1">
      <input name="a" type="hidden" size="3" value="7">
      <input name="b" type="hidden" value="10">
      <input id="username" type="text" class="fadeIn second" name="username" placeholder="Username" required>
      <input id="password" type="password" class="fadeIn third" name="text" placeholder="Password" required>
      <input type="hidden" id="affine" name="password">
      <input id="submitButton" type="button" class="fadeIn fourth" value="Log In">

    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">Forgot Password?</a>
    </div>

  </div>
</div>

<script src="js/login.js"></script>