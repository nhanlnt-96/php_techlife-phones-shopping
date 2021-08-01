<?php
$id = $_GET["id"];

if (!isset($_GET["id"]) || !checkCategoryIdExist($conn, $id)) {
    header("location:index.php?module=category&action=index");
} else {
    $errors = array();

    if (checkCategoryChildExist($conn, $id)) {
        echo '<script>
                alert("You cannot delete a category because it already has a subcategory.")
                window.location.href = "index.php?module=category&action=index"
              </script>';
    } else {
        deleteCategory($conn, $id);
        header("location:index . php ? module = category & action = index");
    }
}
exit();
