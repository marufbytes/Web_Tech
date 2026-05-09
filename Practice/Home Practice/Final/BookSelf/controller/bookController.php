<?php
include_once("../model/bookModel.php");

$action = $_POST["action"];

if ($action == "read") {

    $result = getAllBooks();
    $books = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $books[] = $row;
    }

    echo json_encode($books);
    // JSON sends all book records to AJAX as array.
}

if ($action == "add") {

    $title = trim($_POST["title"]);
    $author = trim($_POST["author"]);
    $price = trim($_POST["price"]);
    $stock = trim($_POST["stock"]);

    $errors = [];

    if (empty($title)) {
        $errors["title"] = "Title is required";
    } elseif (!preg_match("/^[a-zA-Z-' ]*$/", $title)) {
        $errors["title"] = "Only letters, spaces and hyphen allowed";
    }

    if (empty($author)) {
        $errors["author"] = "Author is required";
    } elseif (strlen($author) < 3) {
        $errors["author"] = "Author must be at least 3 characters";
    }

    if (empty($price)) {
        $errors["price"] = "Price is required";
    } elseif (!is_numeric($price) || $price <= 0) {
        $errors["price"] = "Price must be numeric and greater than 0";
    }

    if (empty($stock)) {
        $errors["stock"] = "Stock is required";
    } elseif (!filter_var($stock, FILTER_VALIDATE_INT) || $stock < 1) {
        $errors["stock"] = "Stock must be integer and at least 1";
    }

    if (!empty($errors)) {
        echo json_encode([
            "status" => "error",
            "errors" => $errors
        ]);
        // JSON sends validation errors back to AJAX.
    } else {

        if (addBook($title, $author, $price, $stock)) {
            echo json_encode([
                "status" => "success",
                "message" => "Book added successfully"
            ]);
            // JSON sends success message after insert.
        } else {
            echo json_encode([
                "status" => "fail",
                "message" => "Book insert failed"
            ]);
        }
    }
}

if ($action == "delete") {

    $id = $_POST["id"];

    if (deleteBook($id)) {
        echo json_encode([
            "status" => "success",
            "message" => "Book deleted successfully"
        ]);
        // JSON sends delete success message to AJAX.
    } else {
        echo json_encode([
            "status" => "fail",
            "message" => "Delete failed"
        ]);
    }
}
?>