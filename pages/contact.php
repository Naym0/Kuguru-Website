<?php
session_start();
require_once '..'.DIRECTORY_SEPARATOR.'env-setup.php';?>

<!--  page specific config -->
<?php 
  $page_title = '';
?>
<?php require_once INC_PATH.'header.php';?>
<!-- contact-form-section -->
<section class="section-padding">
  <div class="container">

      <div class="text-center mb-80">
        <h2 class="section-title text-uppercase">Contact us</h2>
        <p class="section-sub">Have something to tell us? Just mail it to us here.</p>
      </div>
      <?php if(isset($_SESSION['msg'])): ?>
        <div class="alert <?= $_SESSION['msg']['type'];?>-dark" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
          <?= $_SESSION['msg']['content'];?>
        </div>   
      <?php unset($_SESSION['msg']); endif;?>

    <div class="row">
        <div class="col-md-8">
            <form action="<?= BASE_URL;?>/sendemail.php" method="POST">

              <div class="row">
                <div class="col-md-6">
                  <div class="input-field">
                    <input type="text" name="name" class="validate" id="name">
                    <label for="name">Name</label>
                  </div>

                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                  <div class="input-field">
                    <label class="sr-only" for="email">Email</label>
                    <input id="email" type="email" name="email" class="validate" >
                    <label for="email" data-error="wrong" data-success="right">Email</label>
                  </div>
                </div><!-- /.col-md-6 -->
              </div><!-- /.row -->

              <div class="row">
                <div class="col-md-6">
                  <div class="input-field">
                    <input id="phone" type="tel" name="phone" class="validate" >
                    <label for="phone">Phone Number</label>
                  </div>
                </div><!-- /.col-md-6 -->

                <div class="col-md-6">
                  <div class="input-field">
                    <input id="subject" type="text" name="subject" class="validate" >
                    <label for="subject">Message Subject</label>
                  </div>
                </div><!-- /.col-md-6 -->
              </div><!-- /.row -->

              <div class="input-field">
                <textarea name="message" id="message" class="materialize-textarea" ></textarea>
                <label for="message">Message</label>
              </div>

              <button type="submit" name="submit" class="waves-effect waves-light btn submit-button pink mt-30">Send Message</button>
            </form>
        </div><!-- /.col-md-8 -->

        <div class="col-md-4 contact-info">

            <address>
              <i class="material-icons brand-color">&#xE55F;</i>
              <div class="address">
                Kuguru Food Complex Ltd.<br>
                

                <hr>

                <p>P.O Box 47343 - 00100 Nairobi.<br>
                Kenya.</p>
              </div>

              <i class="material-icons brand-color">&#xE61C;</i>
              <div class="phone">
                <p>Tel: (+254) 020 650020/3/4 <br>
                  (+254) 020 533968</p>
              </div>

              <i class="material-icons brand-color">&#xE0E1;</i>
              <div class="mail">
                <p><a href="mailto:#">info@kuguru.com</a><br>
                <a href="#">www.kuguru.com</a></p>
              </div>
            </address>

        </div><!-- /.col-md-4 -->
    </div><!-- /.row -->
  </div>
</section>
<!-- contact-form-section End -->
<?php require_once INC_PATH.'footer.php';?>