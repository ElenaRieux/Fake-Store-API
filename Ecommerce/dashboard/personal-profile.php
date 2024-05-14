<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.png" />


    <title>Fake Fashion personal profile</title>

    <!-- Custom fonts for this template -->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

    <!-- Custom styles for this page -->
    <link href="vendor/datatables/dataTables.bootstrap4.min.css" rel="stylesheet">

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>


</head>

<?php
require_once("../include/config_session.php");
require_once("../models/Role.models.php");
require_once("../models/User.models.php");

$role = unserialize($_SESSION['user']);

if (isset($_SESSION["logged_in"])) {
?>

    <body id="page-top">

        <!-- Page Wrapper -->
        <div id="wrapper">

            <!-- Sidebar -->
            <?php
            require_once "sidebar.php";
            ?>
            <!-- End of Sidebar -->

            <!-- Content Wrapper -->
            <div id="content-wrapper" class="d-flex flex-column">

                <!-- Main Content -->
                <div id="content">

                    <!-- Topbar -->
                    <?php
                    require_once "navbar.php";
                    ?>
                    <!-- End of Topbar -->

                    <!-- Begin Page Content -->
                    <div class="container-fluid">

                        <!-- Page Heading -->
                        <h1 class="h3 mb-2 text-gray-800">Personale Profile</h1>

                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Update your credentials</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">

                                    <?php

                                    $user = unserialize($_SESSION['user']);
                                    $username = $user->getUsername();
                                    $email = $user->getEmail();

                                    ?>

                                    <!-- Modulo per cambiare l'username -->
                                    <form id="changeUsernameForm" class="mx-4 pb-4">
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                            <input name="username" value="<?php echo $username ?>" type="text" class="form-control" id="username" placeholder="New username">
                                        </div>
                                        <div id="risultatoUser"></div>
                                        <button type="submit" class="btn btn-primary add-user float-right">Change</button>
                                    </form>

                                    <!-- Modulo per cambiare l'email -->
                                    <form id="changeEmailForm" class="mx-4 pb-4">
                                        <div class="form-group">
                                            <label for="email">Email address</label>
                                            <input name="email" value="<?php echo $email ?>" type="email" class="form-control" id="email" placeholder="name@example.com">
                                        </div>
                                        <div id="risultatoEmail"></div>
                                        <button type="submit" class="btn btn-primary add-user float-right">Change</button>
                                    </form>

                                    <!-- Modulo per cambiare la password -->
                                    <form id="changePasswordForm" class="mx-4 pb-4">
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input name="password" type="password" class="form-control" id="password" placeholder="New password">
                                        </div>
                                        <div class="form-group">
                                            <input name="passwordRepeat" type="password" class="form-control" id="passwordRepeat" placeholder="Repeat password">
                                        </div>
                                        <div id="risultatoAddUser"></div>
                                        <div id="risultatoPassword"></div>
                                        <button type="submit" class="btn btn-primary add-user float-right">Change</button>
                                    </form>

                                </div>
                            </div>
                        </div>

                    </div>
                    <!-- /.container-fluid -->

                </div>
                <!-- End of Main Content -->

                <!-- Footer -->
                <footer class="sticky-footer bg-white">
                    <div class="container my-auto">
                        <div class="copyright text-center my-auto">
                            <span>Copyright &copy; Your Website 2020</span>
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

        <!-- Logout Modal-->
        <div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <a class="btn btn-primary" href="login.html">Logout</a>
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

        <!-- Page level plugins -->
        <script src="vendor/datatables/jquery.dataTables.min.js"></script>
        <script src="vendor/datatables/dataTables.bootstrap4.min.js"></script>
        

    </body>
<?php
} else {
    header("Location: ../index.php");
}
?>

</html>
