<?php
session_start();
	  include('../connect.php');
	  include('../conn.php');
	  $erreur="";
		if(isset($_POST['nom']) ||isset($_POST['prenom']) || isset($_POST['mdp'])){
			$nom= trim(htmlspecialchars($_POST['nom']));
			$prenom=trim(htmlspecialchars($_POST['prenom']));
			$mdp= md5($_POST['mdp']);
				 if (!empty($nom) ||  !empty($prenom) ||   !empty($mdp)){
					 $result=" SELECT id  FROM admin where name LIKE '%".$nom."%' AND firstname LIKE '%".$prenom."%' AND mdp LIKE '%".$mdp."%' ";
					 $res=mysqli_query($con, $result);
					  if(mysqli_num_rows($res)>0){
							echo $_SESSION['name']=$nom;
							echo $_SESSION['firstname']=$prenom;
							echo $_SESSION['mdp']=$mdp;
							$erreur= '<script>
						               setTimeout(function(){
										window.location.replace("centre.php");
									 },2000);</script>';
					 }else{
						 $erreur='<p class="alert alert-danger">Les informations fournies ne sont pas correctes...</p>';
						 
					 }
                     if(!empty($_POST['remember'])){
                         setcookie("admin_login", $_POST["nom"], time()+(10*365*24*60*60));
                         setcookie("admin_prenom", $_POST["prenom"], time()+(10*365*24*60*60));
                         setcookie("admin_password", $_POST["mdp"], time()+(10*365*24*60*60));
                     }else{
                         if(isset($_COOKIE["admin_login"])){
                             setcookie("admin_login", "");
                         }
                         if(isset($_COOKIE["admin_prenom"])){
                             setcookie("admin_prenom", "");
                         }

                         if(isset($_COOKIE["admin_prenom"])){
                            setcookie("admin_password", "");
                        }
                     }
				 }
				  
			 }
            echo $erreur;


	?>



<?php include("header.php")?>

  <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
        <div class="container">
  
          <div class="row">
  
        
  
        </div>
      </section><!-- End Counts Section -->

    <div class="container">

        <!-- Outer Row -->
        <div class="row justify-content-center">

            <div class="col-xl-10 col-lg-12 col-md-9">

                <div class="card o-hidden border-0 shadow-lg my-5">
                    <div class="card-body p-0">
                        <!-- Nested Row within Card Body -->
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-block bg-login-image"></div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h1 class="h4 text-gray-900 mb-4">Connection</h1>
										<?php echo $erreur;?>
                                    </div>
                                    <form class="user" method="post" action="#">
                                        <div class="form-group">
                                            <input type="text" class="form-control" name="nom"
                                                id="exampleInputEmail" value="<?php if(isset($_COOKIE["admin_login"])){echo $_COOKIE["admin_login"];}?>"
                                                placeholder="Entrer votre nom...">
                                        </div>
										
										 <div class="form-group">
                                            <input type="text" class="form-control" name="prenom"
                                                id="exampleInputEmail" value="<?php if(isset($_COOKIE["admin_prenom"])){echo $_COOKIE["admin_prenom"];}?>"
                                                placeholder="Entrer votre prenom...">
                                         </div>
										
                                        <div class="form-group mdp">
                                            <input type="password" class="form-control" name="mdp"
                                                id="exampleInputPassword" value="<?php if(isset($_COOKIE["admin_password"])){echo $_COOKIE["admin_password"];}?>"
                                                placeholder="Votre mot de passse">
												<i class="fa fa-eye active"></i>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <input type="checkbox" class="custom-control-input" name="remember" <?php if(isset($_COOKIE['admin_login'])){?> checked <?php } ?>
                                                 id="customCheck">
                                                <label class="custom-control-label" for="customCheck">Se souvenir de moi</label>
                                            </div>
                                        </div>
                                        <button type="submit"  class="btn btn-primary btn-user btn-block">
                                            Login
                                        </button>
                                    </form>
                                    <hr>
                                    <div class="text-center">
                                        <a class="small" href="forgot-password">Mot de passe oublié?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>

    </div>

    
    <!-- Bootstrap core JavaScript-->
    <script src="../admin/vendor/jquery/jquery.min.js"></script>
    <script src="../admin/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="../admin/vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="../admin/js/sb-admin-2.min.js"></script>
	 <!-- Template Main JS File -->
    <script src="../assets/js/main.js"></script>
	<script>
	  let input= document.querySelector('.mdp input');
	  let show = document.querySelector('.mdp i');
	  show.onclick=function(){
		  if(input.type=== "password"){
			  input.type= "text";
			  show.classList.add('active');
		  }else{
			  input.type= "password";
			  show.classlist.remove('active');
		  }
	  }
	  
	</script>

</body>

</html>