<?php


require('../conn.php');
        $message="";
  
	    function send_password_reset($get_name,$get_email, $token){
			$to='power.team.official.website2022@gmail.com';
			$subject = 'You have a message from power team official website.';
			$message=  "<h2>Hello $get_name</h2>
					   <h3>You are receiving this mail because you have send a password reset request code for your account.</h3>
					   <h3>This the code that you need to enter in order to reset your password $token </h3>
					   <br/><br/>
					   <a href='http://localhost/power_project/includes/reset-password.php?token=$token&email=$get_email'>Click here in order to reset your password</a>;
					   ";
			$headers = "From: $get_email";
			$headers = "From: " . $get_email . "\r\n";
			$headers .= "Reply-To: ". $get_email . "\r\n";
			$headers .= "MIME-Version: 1.0\r\n";
			$headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";
			if(mail($to, $subject, $message, $headers)){
				$message="Message has been sent";
			}else{
				$message="Message could not be sent.";
			}
		}
		
if(isset($_POST['submit'])){
	$email=mysqli_real_escape_string($con, $_POST['email']);
	$token=rand(1000000,9999999);/*online we will add md5 lethod in order to get long and secured code, it will be like md5(rand(1000000,999999999))*/
    $checky= "SELECT * FROM admnin where Email='$email' LIMIT 1";
	$check_email=mysqli_query($con, $checky);
	
	if(mysqli_num_rows($check_email)>0){
		$row=mysqli_fetch_array($check_email);
		$get_name=$row['nom'];
		$get_email=$row['email'];
		$get_id=$row['id'];
		$update_otp= "UPDATE admnin SET user_otp='$token' WHERE id='$get_id' LIMIT 1 ";
		$update_otp_run=mysqli_query($con, $update_otp);
			if($update_otp_run){
				
				send_password_reset($get_name,$get_email, $token);
				$message='<div class="alert alert-primary text-center">Nous t\'avons écrit un email pour modifier votre mot de passe, veuillez verifiez votre boite email et copiez le code</div>';
			}else{
				$message='<div class="alert alert-danger text-center">Desolé quelque chose a mal marché veuillez reessayez, merci</div>';
			}
	}else{
		$message='<div class="alert alert-danger text-center">L\'email ne se trouve dans notre systeme, verifiez bien votre email et reessayez, merci</div>';
	}
	
}else{
	
}

include("header.php");
?>

  <!-- ======= Hero Section ======= -->
   <section id="" class="d-flex align-items-center">
    <div class="container" style="margin:0.1rem;">
     
    </div>
  </section><!-- End Hero -->

<body class="">

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">
               <div class="col-lg-12" data-aos="fade-up" data-aos-delay="200">
                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-password-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-2">Mot de passe oublié?</h1>
                                    </div>
                                    <form method="POST">
									<?php echo $message ?>
                                        <div class="form-group">
                                            <input type="email" class="form-control form-control-user"
                                                id="exampleInputEmail" aria-describedby="emailHelp"
                                                placeholder="Enter Email Address..." name="email">
                                        </div>
                                        <input  class="btn btn-primary btn-user btn-block" type="submit" name="submit"value="Envoyer">
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="login">Vous avez déjà un compte? connectez-vous</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
           </div>
        </div>

    </div>

    <footer id="footer">

    <div class="footer-top">
      <div class="container">
        <div class="row">

          <div class="col-lg-3 col-md-6 footer-contact" >
            <h3 style="font-family:'Nunito', sans-serif">UMP</h3>
            <p style="font-family: 'Nunito', sans-serif;">
              N°137 Avenue des Aveugles <br>
              Terre Jaune/C.H.P.NSADI
              C/Mont-Ngafula<br>
              Kinshasa/Rdc <br><br>
              <strong>Phone:</strong> (+243)813329813<br>(+243)850956941<br>(+243)812260207<br>
              <strong>Email:</strong> umpdrc27avnbp@gmail.com<br>
			  <strong>Email:</strong> nzalapierre2@gmail.com<br>
            </p>
          </div>

          <div class="col-lg-2 col-md-6 footer-links">
            <h4 style="font-family: 'Nunito', sans-serif;">Liens Rapides</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="../">Home</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../docteur">Comité directeur</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../service">Objectifs</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../appointment">Un Rendez-vous avec nous?</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="../consult">Consultation</a></li>
            </ul>
          </div>

          <div class="col-lg-3 col-md-6 footer-links">
            <h4 style="font-family: 'Nunito', sans-serif;">Nos Objectifs</h4>
            <ul>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Promouvoir sans discrimination</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Soulager les populations vulnérables</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Faciliter l'accès aux soins</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Promouvoir la recherche active</a></li>
              <li><i class="bx bx-chevron-right"></i> <a href="#">Influencer positivement à la promotion</a></li>
			  <li><i class="bx bx-chevron-right"></i> <a href="#">Influencer le sens du partenariat</a></li>
			  <li><i class="bx bx-chevron-right"></i> <a href="#">Réalisations des bilans paracliniques</a></li>
            </ul>
          </div>

          <div class="col-lg-4 col-md-6 footer-newsletter">
            <h4 style="font-family: 'Nunito', sans-serif;">Réjoignez notre Newsletter</h4>
            <p>Soyez regulierement informés des nos campagnes en inscrivant votre email</p>
            <form id="form-news">
              <input type="email" name="email" id="email"><input type="submit" value="Subscribe">
            </form>
          </div>

        </div>
      </div>
    </div>

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Ump</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          <!-- All the links in the footer should remain intact. -->
          <!-- You can delete the links only if you purchased the pro version. -->
          <!-- Licensing information: https://bootstrapmade.com/license/ -->
          <!-- Purchase the pro version with working PHP/AJAX contact form: https://bootstrapmade.com/medilab-free-medical-bootstrap-theme/ -->
          Designed by <a href="">Power Team</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a>
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a>
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="../assets/vendor/purecounter/purecounter.js"></script>
  <script src="../assets/vendor/aos/aos.js"></script>
  <script src="../assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="../assets/vendor/glightbox/js/glightbox.min.js"></script>
  <script src="../assets/vendor/isotope-layout/isotope.pkgd.min.js"></script>
  <script src="../assets/vendor/swiper/swiper-bundle.min.js"></script>
  <script src="../assets/vendor/php-email-form/validate.js"></script>

  <!-- Template Main JS File -->
  <script src="../assets/js/main.js"></script>
  <script src="assets/js/main.js"></script>
  <script>
    $(document).ready(function(){
      $('#form-news').on('submit', function(e){
			   e.preventDefault();
         if($('#email').val()!= ''){
            $.ajax({
              url:"insert_news.php",
              method:"POST",
              data:new FormData(this),
              cache: false,
              contentType: false,
              processData:false,
              success:function(data){
                alert("Merci de votre abonnement");
                $("#form-news")[0].reset();
              }  
            });
         }else{
           alert("Veuillez introduire l'email");
         }
      });
    });
  </script>

</body>

</html>