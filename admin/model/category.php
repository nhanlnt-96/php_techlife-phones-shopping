<?php
//create category
function createCategory($conn, $category)
{
    $stmt = $conn->prepare("INSERT INTO category (name,parent) VALUES (:name,:parent)");
    $stmt->bindParam(':name', $category["name"], PDO::PARAM_STR);
    $stmt->bindParam(':parent', $category["parent"], PDO::PARAM_STR);
    $stmt->execute();
    return $stmt;
}

//edit category
function editCategory($conn, $category)
{
    $stmt = $conn->prepare("UPDATE category SET name = :name, parent = :parent WHERE id = :id");
    $stmt->bindParam(':name', $category["name"], PDO::PARAM_STR);
    $stmt->bindParam(':parent', $category["parent"], PDO::PARAM_STR);
    $stmt->bindParam(':id', $category["id"], PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}

//check category exist
function checkCategoryExist($conn, $category, $edit = false)
{
    if (!$edit) {
        $stmt = $conn->prepare("SELECT name FROM category WHERE name = :name");
    } else {
        $stmt = $conn->prepare("SELECT name FROM category WHERE name = :name AND id != :id");
        $stmt->bindParam(':id', $category["id"], PDO::PARAM_STR);
    }

    $stmt->bindParam(':name', $category["name"], PDO::PARAM_STR);
    $stmt->execute();
    $row = $stmt->rowCount();

    if ($row > 0) {
        return true;
    }

    return false;
}

//get all category
function getAllCategory($conn, $id = null, $edit = false)
{
    if ($edit) {
        $stmt = $conn->prepare("SELECT * FROM category WHERE id != :id");
        $stmt->bindParam(":id", $id, PDO::PARAM_STR);
    } else {
        $stmt = $conn->prepare("SELECT * FROM category");
    }
    $stmt->execute();
    $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
    return $data;
}

//get category to edit
function getCategoryToEdit($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM category WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $data = $stmt->fetch(PDO::FETCH_ASSOC);
    return $data;
}

//check category id exist
function checkCategoryIdExist($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM category WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        return true;
    }
    return false;
}

//check category child exist
function checkCategoryChildExist($conn, $id)
{
    $stmt = $conn->prepare("SELECT * FROM category WHERE parent = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    $count = $stmt->rowCount();
    if ($count > 0) {
        return true;
    }
    return false;
}

//delete category
function deleteCategory($conn, $id)
{
    $stmt = $conn->prepare("DELETE FROM category WHERE id = :id");
    $stmt->bindParam(":id", $id, PDO::PARAM_INT);
    $stmt->execute();
    return $stmt;
}