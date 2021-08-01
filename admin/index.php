<?php
ob_start();
include '../config.php';
include '../libs/connect.php';
include '../libs/functions.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <?php include './blocks/head.php'; ?>
</head>
<body class="hold-transition sidebar-mini">
<!-- Site wrapper -->
<div class="wrapper">
  <!-- Navbar -->
    <?php include './blocks/navbar.php'; ?>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
    <?php include './blocks/aside.php' ?>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
      <?php include './blocks/content-header.php' ?>

    <!-- Main content -->
    <section class="content">

      <!-- Default box -->
        <?php
        if (isset($_GET["module"])) {
            $module = $_GET["module"];
            $action = null;
            if (isset($_GET["action"])) {
                $action = $_GET["action"];
            } else {
                $action = 'index';
            }
            if (file_exists("./modules/$module/$action.php")) {
                include "./model/$module.php";
                include "./modules/$module/$action.php";
            } else {
                header("location:../page-not-found.php");
                exit();
            }
        } else {
            include './modules/dashboard/index.php';
        }
        ?>
      <!-- /.card -->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

    <?php include './blocks/footer.php' ?>

  <!-- Control Sidebar -->
    <?php include './blocks/control-sidebar.php' ?>
  <!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<?php include './blocks/foot.php' ?>
</body>
</html>