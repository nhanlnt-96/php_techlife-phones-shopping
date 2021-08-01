<?php
$errors = array();
$parent_category = getAllCategory($conn);

if (isset($_POST["onSubmitCategoryBtn"])) {
    if (empty($_POST["name"])) {
        $errors[] = 'Please enter category name.';
    }
    if (empty($errors)) {
        $data = array(
            'name' => $_POST["name"],
            'parent' => $_POST["parent"],
            'parent' => 0
        );

        if (!checkCategoryExist($conn, $data)) {
            createCategory($conn, $data);
            header("location:index.php?module=category");
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
      <h3 class="card-title">Add category</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>Main category</label>a
        <select class="form-control" name="parent">
          <option value="0">--- ROOT ---</option>
            <?php recursiveCategoryOption($parent_category, $_POST["selected"]); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Category name</label>
        <input type="text" name="name" class="form-control" placeholder="Ex: iPhone">
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" name="onSubmitCategoryBtn" class="btn btn-primary">Submit</button>
      <button type="submit" class="btn btn-default float-right">Reset</button>
    </div>
  </div>
</form>