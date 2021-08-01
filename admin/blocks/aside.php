<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="./public/index3.html" class="brand-link brand-height">
    <img src="./public/dist/img/logo.png" alt="TechLife Logo" class="brand-image brand-width"
         style="opacity: .8">
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="./public/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block">Jay Le</a>
      </div>
    </div>

    <!-- SidebarSearch Form -->
    <!--    <div class="form-inline">-->
    <!--      <div class="input-group" data-widget="sidebar-search">-->
    <!--        <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">-->
    <!--        <div class="input-group-append">-->
    <!--          <button class="btn btn-sidebar">-->
    <!--            <i class="fas fa-search fa-fw"></i>-->
    <!--          </button>-->
    <!--        </div>-->
    <!--      </div>-->
    <!--    </div>-->

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>Dashboard</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fab fa-buffer nav-icon"></i>
            <p>
              Category
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?module=category&action=index" class="nav-link">
                <i class="fas fa-copy nav-icon"></i>
                <p>All category</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?module=category&action=create" class="nav-link">
                <i class="fas fa-clipboard-list nav-icon"></i>
                <p>Add category</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-box-open nav-icon"></i>
            <p>
              Products
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?module=product&action=index" class="nav-link">
                <i class="fas fa-boxes nav-icon"></i>
                <p>All product</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?module=product&action=create" class="nav-link">
                <i class="fas fa-box nav-icon"></i>
                <p>Add product</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="fas fa-user-friends nav-icon"></i>
            <p>
              Members
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?module=user&action=index" class="nav-link">
                <i class="fas fa-users nav-icon"></i>
                <p>All members</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?module=user&action=create" class="nav-link">
                <i class="fas fa-user-plus nav-icon"></i>
                <p>Add member</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cart-arrow-down"></i>
            <p>
              Cart
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="index.php?module=cart&action=index" class="nav-link">
                <i class="fas fa-shopping-cart nav-icon"></i>
                <p>All carts</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="index.php?module=cart&action=create" class="nav-link">
                <i class="fas fa-cart-plus nav-icon"></i>
                <p>Add cart</p>
              </a>
            </li>
          </ul>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>