<?php
function recursiveCategoryOption($data, $selected, $parent = 0, $str = "")
{
    foreach ($data as $key => $item) {
        if ($item["parent"] == $parent) {
            $selectedOption = '';
            if ($item["id"] == $selected) {
                $selectedOption = 'selected';
            }
            echo '<option value="' . $item["id"] . '"' . $selectedOption . '>' . $str . $item["name"] . '</option>';
            unset($key);
            recursiveCategoryOption($data, $selected, $item["id"], $str . '---| ');
        }
    }
}

function recursiveCategoryTable($data, $parent = 0, $str = "")
{
    foreach ($data as $key => $item) {
        if ($item["parent"] == $parent) {
            echo '
             <tr>
                <td>' . $str . $item["name"] . '</td>
                <td><a onclick="return checkDeleteConfirm()" href="./index.php?module=category&action=delete&id=' .
                $item["id"] . '">Delete</a></td>
                <td><a href="./index.php?module=category&action=edit&id=' . $item["id"] . '">Edit</a></td>
             </tr>';
            unset($data[$key]);
            recursiveCategoryTable($data, $item["id"], $str . '---| ');
        }

    }
}