<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="">

  <title>Squadfree - Free bootstrap 3 one page template</title>

  <!-- Bootstrap Core CSS -->
  <link href="css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <!-- Fonts -->
  <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
  <link href="css/animate.css" rel="stylesheet" />
  <!-- Squad theme CSS -->
  <link href="css/style1.css" rel="stylesheet">
  <link href="color/default.css" rel="stylesheet">
    <!--  js ---->
     <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
    $(document).ready(function(){
    $(".datsann").click(function(){
      $.ajax({
      url:"{{ URL::to('datsan') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{},
      success:function(data){ //dữ liệu nhận về
       $('#listsan').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
        }
      });
    });

    $("#profile").click(function(){
      $.ajax({
      url:"{{ URL::to('profile') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{},
      success:function(data){ //dữ liệu nhận về
       $('#bodyprofile').html(data); //nhận dữ liệu dạng html và gán vào cặp thẻ có id là countryList
        }
      });
    });

    $("#userlogout").click(function(){
      $.ajax({
      url:"{{ URL::to('userlogout') }}", // đường dẫn khi gửi dữ liệu đi 'search' là tên route mình đặt bạn mở route lên xem là hiểu nó là cái j.
      method:"GET", // phương thức gửi dữ liệu.
      data:{},
      success:function(data){ 
        }
      });
    });

    });
    </script>
</head>

<body id="page-top" data-spy="scroll" data-target=".navbar-custom">
  <!-- Preloader -->
  <div id="preloader">
    <div id="load"></div>
  </div>
<style>
  .img-circle{
    height: 200px;
  }
</style>
  <nav class="navbar navbar-custom navbar-fixed-top" role="navigation">
    <div class="container">
      <div class="navbar-header page-scroll">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-main-collapse">
                    <i class="fa fa-bars"></i>
                </button>
        <a class="navbar-brand" href="#intro">
          <h1>book yard</h1>
        </a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse navbar-right navbar-main-collapse">
        <ul class="nav navbar-nav">
          <li class="active"><a href="#about">My Team</a></li>
          <li><a href="#service" class="datsann">Đặt Sân</a></li>
          <li><a href="#service">Tìm Kèo</a></li>
          <li><a href="http://bangiay.byethost4.com/trangchu.php">Store Sport</a></li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" id="profile" data-toggle="dropdown">My Profile <b class="caret"></b></a>
            <ul class="dropdown-menu" style="min-width: 360px;text-align: center;">
              <div id="bodyprofile" style="padding: 10px;overflow: scroll;height: auto;"></div>
            </ul>
          </li>
          <li><a href="userlogout" id="fuserlogout">Logout</a></li>
        </ul>
      </div>
      <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
  </nav>

  <!-- Section: intro -->
  <section id="intro" class="intro">

    <div class="slogan">
      <h2>WELCOME TO <span class="text_color">SQUAD</span> </h2>
      <h4>WE ARE GROUP OF GENTLEMEN MAKING AWESOME WEB WITH BOOTSTRAP</h4>
    </div>
    <div class="page-scroll">
      <a href="#service" class="btn btn-circle">
				<i class="fa fa-angle-double-down animated"></i>
			</a>
    </div>
  </section>
  <!-- /Section: intro -->

  <!-- Section: about -->
  <section id="about" class="home-section text-center">
    <div class="heading-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow bounceInDown" data-wow-delay="0.4s">
              <div class="section-heading">
                <h2>cofounder</h2>
                <i class="fa fa-2x fa-angle-down"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
      <div class="row">
        <div class="col-md-3">
          <div class="wow bounceInUp" data-wow-delay="0.2s">
            <div class="team boxed-grey">
              <div class="inner">
                <h5>Tuyên lê</h5>
                <p class="subtitle">Design</p>
                <div class="avatar"><img src="image/team/t.jpg" alt="" class="img-responsive img-circle" /></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wow bounceInUp" data-wow-delay="0.5s">
            <div class="team boxed-grey">
              <div class="inner">
                <h5>Quyền Bá</h5>
                <p class="subtitle">Backend</p>
                <div class="avatar"><img src="image/team/qq.jpg" alt="" class="img-responsive img-circle" /></div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wow bounceInUp" data-wow-delay="0.8s">
            <div class="team boxed-grey">
              <div class="inner">
                <h5>Sơn jack</h5>
                <p class="subtitle">Font_end</p>
                <div class="avatar"><img src="image/team/s.jpg" alt="" class="img-responsive img-circle" /></div>

              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="wow bounceInUp" data-wow-delay="1s">
            <div class="team boxed-grey">
              <div class="inner">
                <h5>Mại Tom</h5>
                <p class="subtitle">Marketting</p>
                <div class="avatar"><img src="image/team/mm.jpg" alt="" class="img-responsive img-circle" /></div>

              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!-- /Section: about -->


  <!-- Section: services -->
  <section id="service" class="home-section text-center bg-gray">

    <div class="heading-about">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow bounceInDown" data-wow-delay="0.4s">
              <div class="section-heading">
                <h2 class="datsann">List Sân</h2>
                <i class="fa fa-2x fa-angle-down"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
      <div id="listsan"><div>
    </div>
  </section>
  <!-- /Section: services -->
  <section id="chitietsan" class="home-section text-center">

  </section>
  <!-- Section: contact -->
  <section id="contact" class="home-section text-center">
    <div class="heading-contact">
      <div class="container">
        <div class="row">
          <div class="col-lg-8 col-lg-offset-2">
            <div class="wow bounceInDown" data-wow-delay="0.4s">
              <div class="section-heading">
                <h2>Contact</h2>
                <i class="fa fa-2x fa-angle-down"></i>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="container">

      <div class="row">
        <div class="col-lg-2 col-lg-offset-5">
          <hr class="marginbot-50">
        </div>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="boxed-grey">

            <div id="sendmessage">Your message has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <form id="contact-form" action="" method="post" role="form" class="contactForm">
              <div class="row">
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">manager name</label>
                    <h4>Thái Bá Quyền</h4>
                  </div>
                  <div class="form-group">
                    <label for="email">Email Address</label>
                    <div class="form-group">
                    <h4>baquyendhv@gmail.com</h4>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="subject">Fax</label>
                    <h4>0974811196</h4>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label for="name">profile Cty</label>
                    <p>Cung cấp dịch vụ cho thuê sân cỏ</p>
                    <p>Kết nối người cho thuê và người thuê</p>
                    <p>Cung cấp sản phẩm thể thao</p>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div class="col-lg-4">
          <div class="widget-contact">
            <h5>Main Office</h5>

            <address>
				  <strong>Corporations</strong><br>
				  50 nguyễn kiệm, p.Trường Thi, TP.Vinh<br>
				  <abbr title="Phone">P:</abbr> (0383) 456-7890
				</address>

            <address>
				  <strong>Email</strong><br>
				  <a href="mailto:#">cty@example.com</a>
				</address>
            <address>
				  <strong>We're on social networks</strong><br>
                       	<ul class="company-social">
                            <li class="social-facebook"><a href="#" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li class="social-twitter"><a href="#" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li class="social-dribble"><a href="#" target="_blank"><i class="fa fa-dribbble"></i></a></li>
                            <li class="social-google"><a href="#" target="_blank"><i class="fa fa-google-plus"></i></a></li>
                        </ul>
				</address>

          </div>
        </div>
      </div>

    </div>
  </section>
  <!-- /Section: contact -->

  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-12 col-lg-12">
          <div class="wow shake" data-wow-delay="0.4s">
            <div class="page-scroll marginbot-30">
              <a href="#intro" id="totop" class="btn btn-circle">
							<i class="fa fa-angle-double-up animated"></i>
						</a>
            </div>
          </div>
          <p>&copy;SquadFREE. All rights reserved.</p>
          <div class="credits">
            <!--
              All the links in the footer should remain intact. 
              You can delete the links only if you purchased the pro version.
              Licensing information: https://bootstrapmade.com/license/
              Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/buy/?theme=Squadfree
            -->
            Designed by <a href="https://bootstrapmade.com/">BootstrapMade</a>
          </div>
        </div>
      </div>
    </div>
  </footer>

  <!-- Core JavaScript Files -->
  <script src="js/jquery.min.js"></script>
  <script src="js/bootstrap.min.js"></script>
  <script src="js/jquery.easing.min.js"></script>
  <script src="js/jquery.scrollTo.js"></script>
  <script src="js/wow.min.js"></script>
  <!-- Custom Theme JavaScript -->
  <script src="js/custom.js"></script>
  <script src="contactform/contactform.js"></script>

</body>

</html>
