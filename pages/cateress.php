<?php require_once '..'.DIRECTORY_SEPARATOR.'env-setup.php';?>

<!--  page specific config -->
<?php 
  $page_title = 'Cateress Milling Company';
?>
<?php require_once INC_PATH.'header.php';?>
  <!--page title start-->
  <section class="page-title no-bg page-title-center ptb-90">
    <div class="container">
      <div class="footer-logo">
        <img src="<?= ASSETS_URL?>/img/logos/cateress.png" alt="">
      </div>
    </div>
  </section>
  <!--page title end-->

  <!-- Featured Flat Border -->
  <section class="pb-100">
      <div class="container-fluid">
        <div class="row">
            <div class="col-md-6">
                <div class="featured-item flat-border-box">
                    <div class="icon">
                      <img src="<?= ASSETS_URL?>/img/icons/wheat.png" alt="">
                    </div>
                    <div class="desc">
                        <h2>Our Product</h2>
                        <p>
                          The Cateress Milling Company (KFCL's milling company) produces high quality first grade sifted maize flour, otherwise known as "Cateress". Cateress milling uses both Swiss and Italian technology to separate the 1st quality flour into 2 distinct brands.
                        </p>

                        <p>
                          <span class="text-primary">MPISHI</span> is the flagship brand that is very popular throughout the greater Nairobi area extending into Central, Rift Valley and Eastern provinces.
                        </p>
                        <p>
                        <span class="text-primary">CATERESS</span> the richest and finest of the two flour brands, is specially prepared in its own dedicated mill. The mill is capable of producing an unrivaled quality of maize flour, due to the mills single floor design and specialized fluting of the rolls. Cateress mainly impacts the Nairobi City area and can be found in all Uchumi's and most major Nairobi super-markets.
                        </p>
                    </div>
                </div><!-- /.featured-item -->
            </div><!-- /.col-md-4 -->

            <div class="col-md-6">
                <div class="featured-item flat-border-box">
                    <div class="icon">
                      <img src="<?= ASSETS_URL?>/img/icons/technology.png" alt="">
                    </div>
                    <div class="desc">
                        <h2>The Technology</h2>
                        <p>
                        The Cateress Milling Company owns and operates 2 separate mills: <br>
                        <span class="text-primary">Italian made</span> which is used to produce the high-end CATERESS brand. 
                        Roncanglia, the Italian makers of this mill have a very well known and respected name throughout the milling community.
                        <br>
                        <span class="text-primary">Swiss made</span>, which is the main mill producing the MPISHI brand. Buhler AG, the makers of the mill, are the unprecedented leaders in milling machinery and technology. 
                        Buhler (East Africa) works closely with KFCL, offering technical advice, quality control and continued preventative maintenance. 
                        KFCL's Buhler mill is the only mill of its kind throughout all of East Africa, having the highest <span class="text-primary" title="The highest capacity with the fewest amount of machinery">output/machinery ratio</span>. 
                        For those who know milling, they would be shocked to discover that KFCL's 
                        Buhler mill operates at very high extraction rates, has a relatively large capacity with the use of only one roller-mill and does not even utilize a purifier. 
                        </p>
                    </div>
                </div><!-- /.featured-item -->
            </div><!-- /.col-md-4 -->
        </div><!-- /.row -->
        
      </div><!-- /.container -->
  </section>
  <!-- Featured Flat Border End -->

  <section class="quote-box custom-brand-bg darken-2 ptb-90" data-stellar-background-ratio="0.1">
    <div class="container">
      <div class="col-md-8 col-md-offset-2">
        <div class="text-center">
            <span class="text-uppercase white-text quote-intro">What do people say</span>
            <h1 class="text-bold white-text mb-30">"Kuguru Foods Complex Limited's mill is Buhler's show piece for East Africa"</h1>
            <p class="author white-text"> <span class="role">Buhler East Africa's Managing Director</span></p>
        </div>
      </div>
    </div>
  </section>

  <section class="pb-100 pt-100 gray-bg"> 
    <div class="d-flex justify-content-center align-items-center">
      <img src="<?= ASSETS_URL?>/img/logos/cateress_maize_meal.jpeg" alt="" class="mr-30">
      <img src="<?= ASSETS_URL?>/img/logos/mpishi.jpeg" alt="">
    </div>
  </section>

<?php require_once INC_PATH.'footer.php';?>