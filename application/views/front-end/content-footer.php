    <footer class="container-fluid bg-light" id="kontak">
      <div class="row container d-flex m-auto">
        <div class="col-md-3 mb-4 mt-3">
          <img src="<?= base_url('include/assets-fe/assets/img/32.png')?>"><span class="text-dark"> BPN | Magang</span>
          <p class="small mt-2">Jl. Raya Singaparna No.54, Cikunir, Kec. Singaparna, Kabupaten Tasikmalaya, Jawa Barat 46418</p>
          <small>&copy; 2023 Ratna Jamilah</small>
        </div>
        <div class="col-md-3 mb-3 mt-3">
          <h5 class="text-dark">Link Cepat</h5>
          <ul class="list-unstyled text-small" style="margin-left: 1px;">
            <li><p><a class="text-muted mt-5" href="#home"><i class="icofont icofont-home text-aqua"></i> Home</a></p></li>
            <li><p><a class="text-muted" href="login"><i class="icofont icofont-sign-in text-aqua"></i> Login</a></p></li>
            <li><p><a class="text-muted" href="daftar"><i class="icofont icofont-pen-alt-2 text-aqua"></i> Daftar</a></p></li>
          </ul>
        </div>

        <div class="col-md-3 mb-3 mt-3">
          <h5 class="text-dark">Bantuan</h5>
          <ul class="list-unstyled text-small" style="margin-left: 1px;">
            <!--<li><p class="text-muted"><i class="icofont icofont-phone text-aqua"></i> +021 678 098</p></li>-->
            <li><p class="text-muted"><i class="icofont icofont-whatsapp text-aqua"></i> +62 896 5153 7806</p></li>
            <li><p class="text-muted"><i class="icofont icofont-envelope-open text-aqua"></i> ratnajamilah23@gmail.com</p></li>
          </ul>
        </div>

        <div class="col-md-3 mt-3">
          <h5 class="text-dark">Bagikan</h5>
          <ul class="list-unstyled text-small" style="margin-left: 1px;">
            <a href="#" class="hvr-float"><i class="fa fa-facebook-square text-aqua fa-2x"></i></a>
            <a href="#" class="ml-1 hvr-float"><i class="fa fa-twitter-square fa-2x text-aqua"></i></a>
            <a href="#" class="ml-1 hvr-float"><i class="fa fa-linkedin-square fa-2x text-aqua"></i></a>
            <a href="#" class="ml-1 hvr-float"><i class="fa fa-whatsapp fa-2x text-aqua"></i></a>
          </ul>
        </div>
      </div>
    </footer>

    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="<?= base_url('include/assets-fe/assets/plugin/jquery/jquery.min.js')?>"></script>
    <script src="<?= base_url('include/assets-fe/assets/js/bootstrap.min.js')?>"></script>
    <script src="https://unpkg.com/aos@next/dist/aos.js"></script>
    <script type="text/javascript">
      $(document).ready(function(){
        // Add scrollspy to <body>
        $('body').scrollspy({target: ".navbar", offset: 50});

        // Add smooth scrolling on all links inside the navbar
        $("#nav a").on('click', function(event) {
          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 1000, function(){

              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          }  // End if
        });

        // Add smooth scrolling on all links inside the navbar
        $("#pelajari").on('click', function(event) {
          // Make sure this.hash has a value before overriding default behavior
          if (this.hash !== "") {
            // Prevent default anchor click behavior
            event.preventDefault();

            // Store hash
            var hash = this.hash;

            // Using jQuery's animate() method to add smooth page scroll
            // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
            $('html, body').animate({
              scrollTop: $(hash).offset().top
            }, 1000, function(){

              // Add hash (#) to URL when done scrolling (default click behavior)
              window.location.hash = hash;
            });
          }  // End if
        });
      });

      $('.navbar-nav>li>a').on('click', function(){
          $('.navbar-collapse').collapse('hide',2000);
      });

      AOS.init();
    </script>
  </body>
</html>