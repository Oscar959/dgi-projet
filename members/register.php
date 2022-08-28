<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>SB Admin 2 - Register</title>
    <link href="../assets/img/logo.jpeg" rel="icon">
    <link href="../assets/img/logo.jpeg" rel="apple-touch-icon"

    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">
	<style>
     .form-message{
			margin-top:1rem;
			text-align:center;
			background-color:rgba(231,235,249,1);
			font-size:1.5rem;
			display:none;
	 }
	.form-message p{
			margin:0;
			color:blue;
			font-size:1.3rem;
			font-style:italic;
			text-transform:capitalize;
	}
	.form-message p span{
			color:#980e8e;
			font-size:1rem;
	}
	
	 .mdp i{
		 position:absolute;
         bottom:10px;
		 color:#000;
		 left:230px;
		 font-size:20px;
		 cursor:pointer;
	 }
	 .active .mdp  i::before{
		 content:'\f070';
		 color:#5256ad;
	 }
	 @media (max-width:768px){
		.mdp i{
		 position:absolute;
         bottom:10px;
		 color:#000;
		 left:210px;
		 font-size:20px;
		 cursor:pointer;
	 }
	 .active .mdp  i::before{
		 content:'\f070';
		 color:#5256ad;
	 }
	}
  </style>

</head>

<body class="bg-gradient-primary">

    <div class="container">

        <div class="card o-hidden border-0 shadow-lg my-5">
            <div class="card-body p-0">
                <!-- Nested Row within Card Body -->
                <div class="row">
                    <div class="col-lg-5 d-none d-lg-block bg-register-image"></div>
                    <div class="col-lg-7">
                        <div class="p-5">
                            <div class="text-center">
                                <h1 class="h4 text-gray-900 mb-4">Création compte Admnistrateur!</h1>
                            </div>
							<div class="col-lg-12 form-message">
							</div><br><br>
                            <form class="user" id="form">
                                <div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
                                        <small class="text-secondary">Votre Nom</small>
                                        <input type="text" class="form-control" id="exampleFirstName" name="nom">
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-secondary">Votre Postnom</small>
                                        <input type="text" class="form-control" id="exampleLastName" name="ps">
                                    </div>
                                </div>
								<div class="form-group">
								    <small class="text-secondary">Votre Prenom</small>
                                    <input type="text" class="form-control" id="exampleInputEmail" name="prenom">
                                </div>
								
                                <div class="form-group">
                                    <small class="text-secondary">Votre email</small>
                                    <input type="email" class="form-control"  id="exampleInputEmail" name="mail">
                                </div>
								
								<div class="form-group row">
                                    <div class="col-sm-6 mb-3 mb-sm-0">
    									<small class="text-secondary">Votre sexe</small>
    										<select class="form-control" name="gender">										  
    										  <option value="m">Masculin</option>
    										  <option value="f">Féminin</option>
    										</select>
                                        </div>
                                     <div class="col-sm-6 mb-3 mb-sm-0">
                                         <small class="text-secondary">Date de naissance</small>
                                        <input type="date" class="form-control" name="date"
                                            id="exampleInputPassword">
                                     </div>
                                </div>
								
                                <div class="form-group row">
                                   <div class="col-sm-6 mb-3 mb-sm-0 mdp">
									<small class="text-secondary">Votre mot de passe</small>
                                            <input type="password" class="form-control " name="mdp"
                                                id="mdp">
												<i class="fa fa-eye active"></i>
                                    </div>
                                    <div class="col-sm-6">
                                        <small class="text-secondary">Photo de profil</small>
                                        <input type="file" class="form-control-file"
										    name="photo" id="file">
											
                                    </div>
                                </div>
					
                                <button type="submit" id="v" name="send" class="btn btn-primary btn-user btn-block">
                                    <i class="fa icon-ok">Enregistrer votre compte</i>
                                </button>
                                <hr>
                              
                            </form>
                            <hr>
                            <div class="text-center">
                                <a class="small" href="forgot-password">Mot de passe oublié?</a>
                            </div>
                             <div class="text-center">
                                <a class="small" href="login">Vous avez déjà un compte? connectez-vous</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Bootstrap core JavaScript-->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

    <!-- Core plugin JavaScript-->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Custom scripts for all pages-->
    <script src="js/sb-admin-2.min.js"></script>
	<script>
	$(document).ready(function(){
	  $('#form').on('submit', function(e){
		e.preventDefault();
		$.ajax({
			type:"post",
			url:"confAdm.php",
			data: new FormData(this),
			dataType:"json",
			cache: false,
			contentType: false,
			processData:false,
			success:function(response){
				$(".form-message").css("display", "block");
				if(response.status==1){
					$("#form")[0].reset();
					$(".form-message").html('<p>' +response.message+'</p>');
				}else{
					$(".form-message").css("display", "block");
					$(".form-message").html('<p>' +response.message+'</p>');
				}
			}
			
		});
	  });
	  // file validation before to be stored to the database
	  $("#file").change(function(){
		var file = this.files[0];
        var	fileType= file.type;
        var match=['image/jpeg','image/jpg','image/png'];
		if(!((fileType==match[0]) ||(fileType==match[1]) || (fileType==match[2]))){
			alert("Desolé, introduis une photo avec l'extension jpeg, jpg, png. Merci!");
		    $("#file").val('');
			return false;
		}
	  });
	  
	  
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
	  
	});
	</script>

</body>

</html>