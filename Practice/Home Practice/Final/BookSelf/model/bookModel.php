<?php
include_once("../db.php");

function getAllBooks() {
    global $conn;

    $sql = "SELECT * FROM books ORDER BY id DESC";
    return mysqli_query($conn, $sql);
}

function addBook($title, $author, $price, $stock) {
    global $conn;

    $sql = "INSERT INTO books(title, author, price, stock)
            VALUES('$title', '$author', '$price', '$stock')";

    return mysqli_query($conn, $sql);
}

function deleteBook($id) {
    global $conn;

    $sql = "DELETE FROM books WHERE id='$id'";
    return mysqli_query($conn, $sql);
}
?>