<?php
$id = $_GET["id"];

if (!isset($_GET["id"]) || !checkCategoryIdExist($conn, $id)) {
    header("location:index.php?module=category&action=index");
    exit();
} else {
    $errors = array();
    $parent_category = getAllCategory($conn, $id, true);
    $category = getCategoryToEdit($conn, $id);

    if (isset($_POST["onSubmitEditCategoryBtn"])) {
        if (empty($_POST["name"])) {
            $errors[] = 'Please enter category name.';
        }
        if (empty($errors)) {
            $data = array(
                'name' => $_POST["name"],
                'parent' => $_POST["parent"],
                'id' => $id
            );

            if (!checkCategoryExist($conn, $data, true)) {
                editCategory($conn, $data);
                header("location:index.php?module=category&action=index");
                exit();
            } else {
                $errors[] = "Category name already exist.";
            }
        }
    }
    ?>

    <?php if (!empty($errors)) { ?>
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
      <h5><i class="icon fas fa-ban"></i> Alert!</h5>
      <ul>
          <?php foreach ($errors as $error) { ?>
            <li><?php echo $error ?></li>
          <?php } ?>
      </ul>
    </div>
    <?php } ?>

  <form method="post" action="">
    <div class="card">
      <div class="card-header">
        <h3 class="card-title">Edit category</h3>
      </div>
      <div class="card-body">
        <div class="form-group">
          <label>Main category</label>
          <select class="form-control" name="parent">
            <option value="0">--- ROOT ---</option>
              <?php recursiveCategoryOption($parent_category, $category["parent"]); ?>
          </select>
        </div>
        <div class="form-group">
          <label for="exampleInputEmail1">Category name</label>
          <input type="text" name="name" class="form-control" placeholder="Enter category name..."
                 value="<?php echo $category["name"] ?>">
        </div>
      </div>
      <div class="card-footer">
        <button type="submit" name="onSubmitEditCategoryBtn" class="btn btn-primary">Edit</button>
        <button type="submit" class="btn btn-default float-right">Reset</button>
      </div>
    </div>
  </form>
<?php } ?>