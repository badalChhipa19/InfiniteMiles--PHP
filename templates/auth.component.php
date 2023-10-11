<?php
if (isset($_SESSION['role'])) {
  locate('/cars/');
}
?>

<div class="auth__container">
  <section class="text">
    <div class="text__title_box">
      <h1 class="heading__primary heading__primary-mid">This is somthig you will love to choose.</h1>
    </div>
    <p class="auth__text">Whit tripees make your trip more confort then your last one. We do care about your moments, So
      you don't have to worry about roads anymore. Just go-with-flow with TRIPEES</p>
    <?php customButton("div", '#', 'Start now &rarr;', '', 'button__burgundy signInButton') ?>
  </section>

  <section class="forms__container">
    <input type="checkbox" id='abstract__form_input'>
    <!-- //TODO: Sign IN form -->
    <div class="card front">
      <div class="heading__box">
        <h1 class="heading__primary">Sign up now</h1>
      </div>
      <form action="formactions/registration.action.php" method="POST" class="form form__signup">
        <?php inputBox('label__name_signup', 'signup__name', 'text', 'input__name_signup', 'Enter full name') ?>
        <?php inputBox('label__email_signup', 'signup__email', 'email', 'input__email_signup', 'Enter email address') ?>
        <?php inputBox('label__mobile_signup', 'signup__mobile', 'tel', 'input__mobile_signup', 'Enter mobile number') ?>
        <?php inputBox('label__password_signup', 'signup__password', 'password', 'input__password_signup', 'Enter a password', '456456') ?>
        <?php inputBox('label__cPassword_signup', 'signup__cPassword', 'password', 'input__cPassword_signup', 'Enter confirm password', '456456') ?>
        <div class="role">
          <label class="label label__role">Select role: </label>
          <select name="select__signup_role" id="role">
            <option value="customer">Customer</option>
            <option value="agent">Agent</option>
          </select>
        </div>
        <div class="button__box">
          <input type="submit" value="Sign up" name='submit__signup' class='input submit__button input__signup'>
          <label for="abstract__form_input">
            <p class="goto">If you have an account?</p>
          </label>
        </div>
      </form>
    </div>

    <!-- //TODO: SignUp Form -->
    <div class="card back">
      <div class="heading__box">
        <h1 class='heading__primary'>Sign In</h1>
      </div>
      <form class="form form__signin" action='formactions/login.action.php' method="POST">
        <?php inputBox('label__username_signin', 'signin__name', 'text', 'input__name__signin', 'Enter email or mobile number', 'domy@mail') ?>
        <?php inputBox('label__password_signin', 'signin__password', 'password', 'input__password_signin', 'Enter password', '456456') ?>
        <div class="role">
          <label class="label label__role">Select role: </label>
          <select name="select__signin_role" id="role">
            <option value="customer">Customer</option>
            <option value="agent">Agent</option>
          </select>
        </div>
        <div class="button__box">
          <input type="submit" value="Sign in" name='submit__signin' class='input submit__button input__signin'>
          <label for="abstract__form_input">
            <p class="goto">Click here to create one?</p>
          </label>
        </div>
      </form>

    </div>


  </section>
</div>

<link rel="stylesheet" href="public/css/auth.style.css" />
<script src='public/js/auth.script.js'></script>