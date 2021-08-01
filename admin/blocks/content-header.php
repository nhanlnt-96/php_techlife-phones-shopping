<section class="content-header">
  <div class="container-fluid">
    <div class="row mb-2">
      <div class="col-sm-6">
          <?php
          if (isset($_GET["module"])) {
              echo '<h1>' . ucfirst($_GET["module"]) . '</h1>';
          } else {
              echo "<h1>Dashboard</h1>";
          }
          ?>
      </div>
      <div class="col-sm-6">
        <ol class="breadcrumb float-sm-right">
          <li class="breadcrumb-item"><a href="#">Home</a></li>
            <?php
            if (isset($_GET["module"])) {
                echo '<li class="breadcrumb-item active">' . ucfirst($_GET["module"]) . '</li>';
            } else {
                echo '<li class="breadcrumb-item active">Dashboard</li>';
            }
            ?>
        </ol>
      </div>
    </div>
  </div><!-- /.container-fluid -->
</section>