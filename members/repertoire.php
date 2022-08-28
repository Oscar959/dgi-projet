<?php
include('../connect.php');
include('../conn.php');
session_start();
if (!($_SESSION['name']) && !($_SESSION['firstname']) && !($_SESSION['mdp'])) {
    header('location:..');
}
$nom = $_SESSION['name'];
$prenom = $_SESSION['firstname'];
$mdp = $_SESSION['mdp'];

$result = $connect->query("select* from members where name='$nom' and firstname='$prenom' and  mdp='$mdp'");
while ($row = $result->fetch()) {
    $nom = $row['name'];
    $prenom = $row['firstname'];
    $mdp = $row['mdp'];


?>
    <!DOCTYPE html>
    <html lang="en">

    <head>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>Les membres acceptés</title>
        <link href="../assets/img/logo.jpeg" rel="icon">
        <link href="../assets/img/logo.jpeg" rel="apple-touch-icon">

        <!-- Custom fonts for this template-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" type="text/css">
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

        <!-- Custom styles for this template-->
        <link href="css/sb-admin-2.min.css" rel="stylesheet">
        <!-- Custom styles for this page -->

        <style>
            @media (max-width:991px) {
                .responsive {
                    margin: 0.3rem;
                    border-radius: 5px;
                }
            }
        </style>
    </head>

    <body id="page-top">
        <!-- Page Wrapper -->
        <div id="wrapper">

            <?php include("nav.php") ?>

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                        <!-- Sidebar Toggle (Topbar) -->
                        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                            <i class="fa fa-bars"></i>
                        </button>

                        <!-- Topbar Search -->
                        <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                            <div class="input-group">
                                <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary" type="button">
                                        <i class="fas fa-search fa-sm"></i>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <!-- Topbar Navbar -->
                        <ul class="navbar-nav ml-auto">

                            <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                            <li class="nav-item dropdown no-arrow d-sm-none">
                                <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-search fa-fw"></i>
                                </a>
                                <!-- Dropdown - Messages -->
                                <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in" aria-labelledby="searchDropdown">
                                    <form class="form-inline mr-auto w-100 navbar-search">
                                        <div class="input-group">
                                            <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary" type="button">
                                                    <i class="fas fa-search fa-sm"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </li>

                            <!-- Nav Item - Alerts -->
                            <li class="nav-item dropdown no-arrow mx-1">
                                <a class="nav-link dropdown-toggle" href="#" id="alertsDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <i class="fas fa-bell fa-fw"></i>
                                    <!-- Counter - Alerts -->
                                    <span class="badge badge-danger badge-counter count"></span>
                                </a>
                                <!-- Dropdown - Alerts -->
                                <div class="dropdown-list dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="alertsDropdown">
                                    <h6 class="dropdown-header">
                                        Alerts Center
                                    </h6>
                                    <div id="dropdown-menu">

                                    </div>
                                    <a class="dropdown-item text-center small text-gray-500" href="#">Show All Alerts</a>
                                </div>
                            </li>

                            <?php include("connectees.php"); ?>

                            <div class="topbar-divider d-none d-sm-block"></div>

                            <!-- Nav Item - User Information -->
                            <li class="nav-item dropdown no-arrow">
                                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?php echo $row['name']; ?>
                                        <?php echo $row['firstname']; ?></span>
                                    <?php echo '<img src="../uploads/' .
                                        $row['picture'] . '" width="150px;" height="50px;" class="img-profile rounded-circle"; alt="image">' ?>
                                </a>
                                <!-- Dropdown - User Information -->
                                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                                    <a class="dropdown-item" href="profile">
                                        <i class="fas fa-user fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Profile
                                    </a>

                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                        Logout
                                    </a>
                                </div>
                            </li>

                        </ul>

                    </nav>
                    <!-- End of Topbar -->
                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <div class="d-sm-flex align-items-center justify-content-between mb-4">
                            <h1 class="h3 mb-0 text-gray-800">Cards</h1>
                        </div>
                        <!-- Begin Page Content -->
                        <div class="container-fluid">
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h4 class="m-0 font-weight-bold text-primary" style="font-style:italic">Statistique</h4>
                                    </a>
                                    <div class="card-body">

                                        <!-- Card Content - Collapse -->
                                        <div class="collapse show" id="collapseCardExample">
                                            <div class="table-responsive">
                                                <h5 class="card-text text-dark" id="get_number_result" style="font-style:italic">
                                                    <?php include("php_stat.php") ?>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="card shadow mb-4" id="liste-id">
                                <div class="card-header py-3">
                                    <!-- Card Header - Accordion -->
                                    <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                        <h4 class="m-0 font-weight-bold text-primary" style="font-style:italic">La liste des tous les contribuables par catégorie de recherche </h4>
                                    </a>
                                    <div class="card-body">

                                        <!-- Card Content - Collapse -->
                                        <div class="collapse show" id="collapseCardExample">
                                            <div class="table-responsive">
                                                <table class="table table-bordered table-striped" style="font-style:italic; text-transform:capitalize;">
                                                    <thead class="thead-dark">
                                                        <tr>
                                                            <th>Nif</th>
                                                            <th>Forme Juridique</th>
                                                            <th>Raison social</th>
                                                            <th>Sigle</th>
                                                            <th>siege du succurale</th>
                                                            <th>Adresse</th>
                                                            <th>Secteur</th>
                                                            <th>Etat social</th>
                                                            <th>ancien_service_gestionnaire</th>
                                                            <th>ancien_service_gestionnaire</th>
                                                            <th>ref_note_de_service</th>

                                                        </tr>
                                                    </thead>

                                                    <tbody id="show" style="text-transform:none;">

                                                    </tbody>
                                                </table>
                                                <button class='btn btn-warning' id='all-dwl' style="display:none;margin:1rem;">Télecharger le rapport sous format Pdf</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>
                        <!-- /.container-fluid -->


                    </div>
                    <!-- /.container-fluid -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <!-- Card Header - Accordion -->
                                <a href="#collapseCardExample" class="d-block card-header py-3" data-toggle="collapse" role="button" aria-expanded="true" aria-controls="collapseCardExample">
                                    <h4 class="m-0 font-weight-bold text-primary" style="font-style:italic">Elements de recherche</h4>
                                </a>
                                <div class="card-body">

                                    <!-- Card Content - Collapse -->
                                    <div class="collapse show" id="collapseCardExample">
                                        <div class="table-responsive">
                                            <form action="POST" id="form_id">
                                                <div class="form-group">
                                                    <label for="search" class="text-dark" style="font-style:italic">Selectionner un element</label>
                                                    <select class="form-control" id="select_id" name="search_element" style="font-style:italic">
                                                        <option value="">Choisissez l'option</option>
                                                        <option value="nif">NIF</option>
                                                        <option value="nom">Nom</option>
                                                        <option value="sigle">Sigle</option>
                                                        <option value="s_g">Service Gestionnaire</option>
                                                        <option vakue="activite">Activité</option>
                                                        <option value="all">Tout</option>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <input class="form-control form-control-lg" id="hidden-field" type="text" style="display:none">
                                                </div>


                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <small class="text-info" id="result" style="display:none">

                        </small>

                        <small class="text-info" id="result1" style="display:none">

                        </small>

                        <small class="text-info" id="result-rs">

                        </small>


                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto text-primary">
                            <span>Copyright &copy; Your Website <?php echo date("Y") ?></span>
                        </div>
                    </div>
                </footer>
                <!-- End of Footer -->

            </div>
            <!-- End of Content Wrapper -->

        </div>
        <!-- End of Page Wrapper -->

        <!-- Scroll to Top Button-->
        <a class="scroll-to-top rounded" href="#page-top">
            <i class="fas fa-angle-up"></i>
        </a>

        <?php include("lgout.php"); ?>

        <?php include("scripts.php"); ?>
        <script>
            $(document).ready(function() {

                /*function getLocation(){
                   if(navigator.geolocation){
                       navigator.geolocation.get_current_position(showPosition);
                   }
                 }

                function showPosition(position){
                   document.querySelector('.form-id-geo input[name = "latitude"]').value = position.coords.latitude;
                   document.querySelector('.form-id-geo input[name = "longitude"]').value = position.coords.longitude;
                 }*/

                if ("geolocation" in navigator) {
                    navigator.geolocation.getCurrentPosition(function(position) {
                        $("#result").html("Find location: " + position.coords.latitude + "la longitude: " + position.coords.longitude);
                        $("#result").html(position.coords.latitude);
                        $("#result1").html(position.coords.longitude);
                        //$("#latitude").append(position.coords.latitude);
                        var longitude = $('#result1').text();
                        var latitude = $('#result').text();
                        alert(latitude);
                        alert(longitude);
                        update_value();

                        function update_value() {
                            $.ajax({
                                url: 'priv_update.php',
                                method: 'POST',
                                data: {
                                    longitude: longitude,
                                    latitude: latitude
                                },
                                success: function(data) {
                                    $("#result-rs").html(data);
                                }
                            });
                        }

                        setInterval(function() {
                            update_value()
                        }, 2000);

                    });
                } else {
                    alert("browser doesn't support");
                }

                $(document).on('change', '#select_id', function() {
                    var id = $("#select_id").val();
                    if (id != "all") {
                        $("#hidden-field").show();
                        $("#hidden-field").keyup(function() {
                            var search = $("#hidden-field").val();
                            $.ajax({
                                url: "treatSearch.php",
                                method: "POST",
                                data: {
                                    data: id,
                                    search: search
                                },
                                success: function(data) {
                                    $("#show").html(data);
                                }
                            })
                        })

                    } else {
                        $("#hidden-field").css("display", "none");
                        var id = $("#select_id").val();
                        //alert(id);
                        $.ajax({
                            url: "all_t.php",
                            method: "POST",
                            data: {
                                data: id
                            },
                            success: function(data) {
                                $("#show").html(data);
                                $("#all-dwl").css("display", "block");
                            }
                        })

                        $("#all-dwl").on("click", function() {
                            var id = $("#select_id").val();
                            //alert(id);
                            $.ajax({
                                url: "all_t.php",
                                method: "POST",
                                data: {
                                    id: id
                                },
                                success: function(data) {
                                    alert("Fichier télercharger avec succès");
                                }
                            })
                        })
                    }
                    //alert(id);
                    /* $.ajax({
                    	 url:"banir.php",
                    	 type:"POST",
                    	 data:{id:id},
                    	 success:function(data){
                    		 show();
                    	 }
                     });*/
                });

                connect_select();

                function connect_select() {
                    var action = "fetch";
                    //alert(action);
                    $.ajax({
                        url: "connect_select.php",
                        method: "POST",
                        data: {
                            action: action
                        },
                        dataType: "json",
                        success: function(data) {
                            $("#good").show("slow");
                            $("#good").html(data.notification);
                            if (data.unseen_notification > 0) {
                                $('.counter_connected').html(data.unseen_notification);
                            }
                        }
                    });
                }


                /* setInterval(function(){
                	show()  
                  },2000);*/

                function load_unseen_notification(view = '') {
                    $.ajax({
                        url: "fetch.php",
                        method: "POST",
                        data: {
                            view: view
                        },
                        dataType: "json",
                        success: function(data) {
                            $('#dropdown-menu').html(data.notification);
                            if (data.unseen_notification > 0) {
                                $('.count').html(data.unseen_notification);
                                var audio = new Audio("audio/fais_dodo.mp3");
                                audio.play();
                                setTimeout(function() {
                                    audio.pause();
                                    audio.currentTime = 0;
                                }, 10000);
                            }
                        }
                    });
                }
                load_unseen_notification();

                function getNumber() {
                    var get_number = "get_number";
                    $.ajax({
                        url: "php_stat.php",
                        method: "POST",
                        data: {
                            get_number: get_number
                        },
                        success: function(data) {
                            $("#get_number_result").html(data);
                        }
                    })
                }

                setInterval(function() {
                    getNumber()
                },1000);

                $(document).on('click', '.dropdown-toggle', function() {
                    $('.count').html('');
                    load_unseen_notification('yes');
                });
                /* setInterval(function(){
		load_unseen_notification()  
	  },1000);*/

            });
        </script>

    </body>

    </html>
<?php
}
?>