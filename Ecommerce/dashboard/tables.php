<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../img/favicon.png" />


    <title>Fake Fashion Users</title>

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

if (isset($_SESSION["logged_in"]) && $role->isAdmin()) {
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
                        <h1 class="h3 mb-2 text-gray-800">User Management</h1>
                        
                        <!-- DataTales Example -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Fake Fashion's Users</h6>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Email</th>
                                                <th>Ruolo</th>
                                                <th> </th>
                                                <th>
                                                    <button href="#" class="btn btn-success btn-icon-split" data-toggle="modal" data-target="#newUserModal">
                                                        <span class="icon text-white-50">
                                                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="text">Add new user</span>
                                                    </button>
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php

                                            $user = unserialize($_SESSION['user']);
                                            $users = $user->getUsers();
                                            $currentUser = $user->getEmail();


                                            foreach ($users as $user) {
                                             if ($user['email'] != $currentUser) {
                                                    echo "<tr>";
                                                    echo "<td>" . $user['username'] . "</td>";
                                                    echo "<td>" . $user['email'] . "</td>";
                                                    echo "<td>" . $user['ruolo'] . "</td>";
                                                
                                            ?>
                                                <td>
                                                    <button class="btn btn-danger btn-icon-split delete-button" data-toggle="modal" data-target="#deleteModal">
                                                        <span class="icon text-white-50">
                                                            <i class="fas fa-trash"></i>
                                                        </span>
                                                        <span class="text">Delete</span>
                                                    </button>
                                                </td>
                                                <td>
                                                    <button href="#" class="btn btn-info btn-icon-split edit-button" data-toggle="modal" data-target="#updateUserModal">
                                                        <span class="icon text-white-50">
                                                            <i class="fa fa-address-book" aria-hidden="true"></i>
                                                        </span>
                                                        <span class="text">Edit</span>
                                                        </a>
                                                        </tr>
                                                    <?php } }
                                                    ?>
                                        </tbody>
                                    </table>
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
                    <div class="modal-body">Select "Log out" below if you are ready to end your current session.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <form action="../include/logout.php" method="post">
                            <button class="btn btn-primary">Log out</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="modal fade" id="newUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add a new user!</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Insert the data of the new user.</div>
                    <form id="formNewUser" class="mx-4 pb-4">
                        <div class="form-group">
                            <label for="username">Username</label>
                            <input name="username" type="text" class="form-control" id="username" placeholder="new username">
                        </div>
                        <div class="form-group">
                            <label for="email">Email address</label>
                            <input name="email" type="email" class="form-control" id="email" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="password" placeholder="insert password">
                        </div>
                        <div class="form-group">
                            <label for="passwordRepeat">Repeat password</label>
                            <input name="passwordRepeat" type="password" class="form-control" id="passwordRepeat" placeholder="insert password">
                        </div>
                        <div class="form-group">
                            <label for="role">Role</label>
                            <select name="role" class="form-control" id="role">
                                <option>user</option>
                                <option>admin</option>
                            </select>
                        </div>
                        <div id="risultatoAddUser"></div>
                        <button type="submit" class="btn btn-primary add-user float-right">Add</button>
                    </form>
                </div>
            </div>
        </div>

        <div class="modal fade" id="updateUserModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Change user's credentials</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Change the data you want to update.</div>
                    <form id="formNewUser" class="mx-4 pb-4">
                        <div class="form-group">
                            <label for="editUsername">Username</label>
                            <input name="username" type="text" class="form-control" id="editUsername" placeholder="new username">
                        </div>
                        <div class="form-group">
                            <label for="editEmail">Email address</label>
                            <input name="email" type="email" class="form-control" id="editEmail" placeholder="name@example.com">
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input name="password" type="password" class="form-control" id="editPassword" placeholder="insert password">
                        </div>
                        <div class="form-group">
                            <label for="passwordRepeat">Repeat password</label>
                            <input name="passwordRepeat" type="password" class="form-control" id="passwordRepeat" placeholder="insert password">
                        </div>
                        <div class="form-group">
                            <label for="editRole">Role</label>
                            <select name="role" class="form-control" id="editRole">
                                <option>user</option>
                                <option>admin</option>
                            </select>
                        </div>
                        <div id="risultatoEditUser"></div>
                        <button type="submit" class="btn btn-primary add-user float-right">Add</button>
                    </form>
                </div>
            </div>
        </div>


        <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">×</span>
                        </button>
                    </div>
                    <div class="modal-body">Select "Delete" below if you are ready to delete it.</div>
                    <div class="modal-footer">
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                        <button class="btn btn-primary delete-user">Delete</button>

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

            <!-- Page level custom scripts -->
            <script src="js/demo/datatables-demo.js"></script>


    </body>
<?php
} else {
    header("Location: ../index.php");
}
?>

</html>

<script src="js/sb-tables.js"></script>