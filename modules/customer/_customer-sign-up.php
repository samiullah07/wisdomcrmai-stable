<?php
$use_bootstrap_icons = true;
$use_recaptcha = true;
$no_footer = true;
$no_header = true;
require_once("../../inc/includes.php");

if(isset($config->display_header_sign_up) && $config->display_header_sign_up){
  $no_header = false;
}
define('META_TITLE', $seoConfig['sign_up_meta_title']);
define('META_DESCRIPTION', $seoConfig['sign_up_meta_description']);
require_once("../../inc/header.php");
$getTermsPage = $pages->get(1);
?>

  <div class="container-fluid ps-md-0">
    <div class="row g-0">
      <div class="d-none d-md-flex col-md-4 col-lg-6 bg-image" style="background: url(<?php echo $base_url."/public_uploads/".$getTheme->image_sign_up; ?>);"></div>
      <div class="col-md-8 col-lg-6">
        <div class="login d-flex align-items-center py-5">
          <div class="container">
            <div class="row">
              <div class="col-md-9 col-lg-8 mx-auto">

                <h3 class="login-heading mb-4"><?php echo $lang['get_started_message']; ?></h3>

                <?php
                if (isset($_SESSION['action']) && !empty($_SESSION['action'])) {
                  echo '<div class="alert alert-danger"><i class="bi bi-exclamation-octagon"></i> ' . $_SESSION['action_message'] . '</div>';
                }
                ?>

                <!-- Login -->
                <form action="<?php echo $base_url; ?>/action" method="post" novalidate>


                    <div class="form-floating mb-1">
                        <select id="formIam" class="form-control" required name="role">
                            <option value="student">Student / Parent</option>
                            <option value="teacher">Teacher</option>
<!--                            <option value="parent">Parent</option>-->
                        </select>
                        <label for="formIam">I am </label>
                    </div>


                    <div class="form-floating mb-1">
                        <select id="formIam" class="form-control" required name="education">
                            <option value="primary">Primary</option>
                            <option value="secondary">Secondary</option>
                        </select>
                        <label for="formIam">Education </label>
                    </div>

                  <div class="form-floating mb-1">
                    <input name="name" type="text" class="form-control" id="floatingInputName" placeholder="<?php echo $lang['my_account_name_input']; ?>" value="<?php echo isset($_SESSION['form_name']) ? $_SESSION['form_name'] : ''; ?>" required>
                    <label for="floatingInputName"><?php echo $lang['my_account_name_input']; ?></label>
                  </div>

                  <div class="form-floating mb-1">
                    <input name="email" type="email" class="form-control" id="floatingInput" placeholder="name@example.com" value="<?php echo isset($_SESSION['form_email']) ? $_SESSION['form_email'] : ''; ?>" required>
                    <label for="floatingInput"><?php echo $lang['my_account_email']; ?></label>
                  </div>

<!--                    <input class="form-control" id="input-url" type="text">-->
<!--                    <div class="position-absolute invisible" id="form_complete"></div>-->

<!--                    <label for="autocomplete">Search:</label>-->
<!--                    <input type="text" id="autocomplete">-->




                    <div class="form-floating mb-1"  id="parentEmailField">
                    <input name="parent_email" type="email" class="form-control" id="floatingInputParent" placeholder="name@example.com" value="<?php echo isset($_SESSION['form_parent_email']) ? $_SESSION['form_parent_email'] : ''; ?>" >
                    <label for="floatingInputParent">Parent Email </label>
                  </div>

                  <div class="form-floating mb-1">
                    <input name="phone" type="text" class="form-control" id="floatingInputPhone" placeholder="" value="<?php echo isset($_SESSION['form_phone']) ? $_SESSION['form_phone'] : ''; ?>" required/>
                    <label for="floatingInputPhone">Telephone</label>
                  </div>

                  <div class="form-floating mb-1">
                      <select id="floatingInputCountry" class="form-control" required name="country">
                          <option value="Barbados">Barbados</option>
                          <option value="Jamaica">Jamaica</option>
                          <option value="Guyana">Guyana</option>
                          <option value="Trinidad & Tobago">Trinidad & Tobago</option>
                      </select>
                    <label for="floatingInputCountry">Country</label>
                  </div>

<!--                    <div class="form-group">-->
<!--                        <label for="input-prefetch">Timezone</label>-->
<!--                        <input type="text" class="form-control" placeholder="Timezone" id="input-prefetch"-->
<!--                               data-prefetch="--><?php //echo $base_url; ?><!--/schools.json">-->
<!--                    </div>-->


                    <div class="form-floating mb-1">
                        <input name="school" type="text" class="form-control" id="floatingInputSchool" placeholder="" value="<?php echo isset($_SESSION['form_school']) ? $_SESSION['form_school'] : ''; ?>" required/>
                        <label for="floatingInputSchool">Search For School</label>
                    </div>


                  <div class="form-floating mb-0 position-relative">
                    <input name="password" type="password" class="form-control" id="floatingPassword" placeholder="<?php echo $lang['my_account_password']; ?>" value="<?php echo isset($_SESSION['form_password']) ? $_SESSION['form_password'] : ''; ?>" required minlength="6">
                    <label for="floatingPassword"><?php echo $lang['my_account_password']; ?></label>
                    <i class="bi bi-eye-slash toggle-password"></i>
                  </div>



                  <div class="progress password-progress">
                    <div class="progress-bar" id="password-strength-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>
                  <span id="password-strength-text" class="form-text"></span>
                  <br>


                  <div class="form-check mb-1">
                    <input class="form-check-input" type="checkbox" value="" id="rememberPasswordCheck" required>
                    <label class="form-check-label" for="rememberPasswordCheck"><?php echo $lang['i_agree_terms']; ?></label> <a target="_blank" href="<?php echo $base_url."/pages/".$getTermsPage->slug; ?>" tabindex="-1" class="text-decoration-none"><?php echo $lang['read_here']; ?></a>
                  </div>

                  <div class="d-grid">
                    <?php if($config->use_recaptcha){?>
                    <input type="hidden" name="recaptcha_response" id="recaptchaResponse">
                    <?php } ?>
                    <input type="hidden" name="action" value="create-account">
                    <button id="submit-button" class="btn btn-lg btn-primary fw-bold mb-2" type="submit"><?php echo $lang['btn_create_account']; ?></button>
                  </div>

                </form>

                <div class="d-grid mt-3 text-center"><a class="text-decoration-none" href="<?php echo $base_url; ?>/sign-in"><?php echo $lang['have_account_sign_in']; ?></a></div>
                <br>
                <div class="d-grid mt-3 text-center"><a class="text-decoration-none small" href="<?php echo $base_url; ?>/"><?php echo $lang['back_to_homepage']; ?></a></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>


<?php
require_once("../../inc/footer.php");
?>
