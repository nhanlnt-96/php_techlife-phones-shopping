<?php
$errors = array();
$parent_category = getAllCategory($conn);

if (isset($_POST["onSubmitProductBtn"])) {
    if (empty($_POST["name"])) {
        $errors[] = 'Please enter a product name.';
    }

    if (empty($_POST["price"])) {
        $errors[] = 'Please enter a product price.';
    }

    if (empty($_POST["intro"])) {
        $errors[] = 'Please enter a product introduction.';
    }

    if (empty($_FILES["image"]["name"])) {
        $errors[] = 'Please upload a product image.';
    }

    if (empty($errors)) {
        $data = array(
            'name' => $_POST["name"],
            'price' => $_POST["price"],
            'intro' => $_POST["intro"],
            'content' => $_POST["content"],
            'image' => $_FILES["image"]["name"],
            'status' => $_POST["status"],
            'featured' => $_POST["featured"],
        );

        if (!checkProductExist($conn, $data)) {
            createProduct($conn, $data);
            header("location:index.php?module=product");
            exit();
        } else {
            $errors[] = "Product already exist.";
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

<form method="post" action="" enctype="multipart/form-data">
  <div class="card">
    <div class="card-header">
      <h3 class="card-title">Add product</h3>
    </div>
    <div class="card-body">
      <div class="form-group">
        <label>Category</label>a
        <select class="form-control" name="category_id">
          <option value="0">--- ROOT ---</option>
            <?php recursiveCategoryOption($parent_category, $_POST["category_id"]); ?>
        </select>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Product name</label>
        <input type="text" name="name" class="form-control" placeholder="Ex: iPhone 11"
            <?php
            if (isset($_POST["name"])) {
                echo 'value="' . $_POST["name"] . '"';
            }
            ?>
        >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Price</label>
        <input type="text" name="price" class="form-control" placeholder="Please enter product price..."
            <?php
            if (isset($_POST["price"])) {
                echo 'value="' . $_POST["price"] . '"';
            }
            ?>
        >
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Introduction</label>
        <textarea type="text" name="intro" class="form-control"
                  placeholder="Please enter product introduction..."><?php
            if (isset($_POST["intro"])) {
                echo $_POST["intro"];
            }
            ?></textarea>
      </div>
      <div class="form-group">
        <label for="exampleInputEmail1">Content</label>
        <textarea type="text" name="content" class="form-control"
                  placeholder="Please enter product content..."><?php
            if (isset($_POST["content"])) {
                echo $_POST["content"];
            }
            ?></textarea>
      </div>
      <div class="form-group">
        <label for="customFile">Upload image</label>
        <div class="custom-file">
          <input type="file" class="custom-file-input" name="image" id="customFile">
          <label class="custom-file-label" for="customFile">Choose file</label>
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" name="status" id="customSwitch1" checked>
          <label class="custom-control-label" for="customSwitch1">Status</label>
        </div>
      </div>
      <div class="form-group">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" name="featured" id="customSwitch2">
          <label class="custom-control-label" for="customSwitch2">Featured</label>
        </div>
      </div>
    </div>
    <div class="card-footer">
      <button type="submit" name="onSubmitProductBtn" class="btn btn-primary">Submit</button>
      <button type="submit" class="btn btn-default float-right">Reset</button>
    </div>
  </div>
</form>