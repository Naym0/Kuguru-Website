<?php require_once '..'.DIRECTORY_SEPARATOR.'env-setup.php';?>

<!--  page specific config -->
<?php 
  $page_title = '';
?>
<?php require_once INC_PATH.'header.php';?>
  <!--page title start-->
  <section class="page-title no-bg page-title-center ptb-90">
    <div class="container">
      <div class="footer-logo">
        <img src="<?= ASSETS_URL?>/img/logos/softa.jpeg" alt="">
      </div>
    </div>
  </section>
  <!--page title end-->

  <!-- Featured Flat Border -->
  <section class="pb-100">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-4">
                <div class="featured-item flat-border-box">
                    <div class="icon">
                      <img src="<?= ASSETS_URL?>/img/icons/soda-bottle.png" alt="">
                    </div>
                    <div class="desc">
                        <h2>Our Product</h2>
                        <p>Softa is a dynamic product, which maintains the highest international quality standards. The Softa and Babito brand names have been in Kenya for over thirty years. KFCL has "Dared to Dream" by reinventing the two brands and now offers seven different flavors under the two brands. The most popular are Softa Orange and Babito Blackcurrant.</p>
                    </div>
                </div><!-- /.featured-item -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-4">
                <div class="featured-item flat-border-box">
                    <div class="icon">
                      <img src="<?= ASSETS_URL?>/img/icons/quality.png" alt="">
                    </div>
                    <div class="desc">
                        <h2>Our Quality</h2>
                        <p>
                          Softa and Babito soft drinks maintain international standards through technical backing from <a target="_black" href="http://www.doehler.de/" title="Dohler Group of companies are known throughout Europe as the leading producer of flavouring constituents for the drinks industry">Dohler Euro Citrus</a> in Germany.
                          We are also informed on all the latest developments in the soft drink industry being an international affiliate member of the <a href="http://www.nsda.org/" target="_blank" rel="noopener noreferrer">National Soft Drink Association (NSDA)</a> located in Washington DC, USA.
                        </p>
                    </div>
                </div><!-- /.featured-item -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-4">
                <div class="featured-item flat-border-box">
                    <div class="icon">
                      <img src="<?= ASSETS_URL?>/img/icons/light-on.png" alt="">
                    </div>
                    <div class="desc">
                        <h2>Our Desire</h2>
                        <p>
                          We hope to be an example to all African businesses uplifting the economic development around Kenya and Africa by proving that indigenous African industries can compete and succeed in the international business arena.
                          With God as our guide, we pledge service and quality to all our consumers always giving them "The Freedom to Choose."
                        </p>
                    </div>
                </div><!-- /.featured-item -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
        
      </div><!-- /.container -->
  </section>
  <!-- Featured Flat Border End -->
  
  <section class="quote-box custom-brand-bg ptb-90" data-stellar-background-ratio="0.1">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="text-center">
            <span class="text-uppercase white-text quote-intro">What do people say</span>
            <h1 class="text-bold white-text mb-30">"I am happy to note that KFCL, a company wholly owned by indigenous Kenyan entrepreneurs, has developed a competitive range of soft drinks."</h1>
            <p class="author white-text">Dr. Y.F.O Masakhalia <span class="role">Minister of Industrial Development (1998)</span></p>
        </div>
      </div>
    </div>
  </section>

  <!--full width promo dark box start-->
  <div class="full-width promo-box promo-pattern">
    <div class="container">
      <div class="col-md-12">
          <div class="promo-info">
              <span class=" text-uppercase">Want to start selling softa drinks? </span>
              <h2 class="text-bold text-uppercase no-margin">Make use of our <span class="brand-color"><a href="softa_distribution.php">large distribution network</a></span> and be part of the success</h2>
          </div>
          <div class="promo-btn">
              <a href="<?= BASE_URL?>/pages/orders.php" class="btn white waves-effect waves-grey">ORDER NOW</a>
          </div>
      </div>
    </div>
  </div>
  <!--full width promo dark box end-->


  <!-- <section class="section-padding gray-bg">
      <div class="container">

        <div class="row">
          <div class="col-md-7">
            <section class="section">
              <div class="container ">

                <div class="login-wrapper">
                  <div class="card-wrapper"></div>
                  <div class="card-wrapper">
                    <h1 class="title">ORDER ONLINE</h1>
                    <form method="post" action="">
                      <div class="input-container">
                        <input type="text" id="username" placeholder="Product" required="required"/>
                        <div class="bar"></div>
                      </div>
                      <div class="input-container">
                        <input type="password" id="password" placeholder="Quantity" required="required"/>
                        <div class="bar"></div>
                      </div>
                      <div class="button-container">
                        <a href="#." class="btn btn-lg btn-block waves-effect waves-light">ORDER</a>
                      </div>
                    </form>
                  </div>
                </div>

              </div>
            </section>          
          </div>
        </div>

      </div>
  </section> -->
<?php require_once INC_PATH.'footer.php';?>