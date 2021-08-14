<!-- Start Shop Newsletter  -->
<section class="shop-newsletter section">
    <div class="container">
        <div class="inner-top">
            <div class="row">
                <div class="col-lg-8 offset-lg-2 col-12">
                    <!-- Start Newsletter Inner -->
                    <div class="inner">
                        <h4>Newsletter</h4>
                        <p> {{__('content.Newsletter')}}</p>
                        <form action="mail/mail.php" method="get" target="_blank" class="newsletter-inner">
                            <input name="EMAIL" placeholder="Votre adresse e-mail" required="" type="email">
                            <button class="btn">{{__('content.Subscribe')}}</button>
                        </form>
                    </div>
                    <!-- End Newsletter Inner -->
                </div>
            </div>
        </div>
    </div>
</section>
<!-- End Shop Newsletter -->
