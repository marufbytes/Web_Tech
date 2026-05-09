<!DOCTYPE html>
<html>
<head>
    <title>Bookshelf Management</title>
    <style>
        .error {
            color: red;
        }

        .success {
            color: green;
        }

        table, th, td {
            border: 1px solid black;
            border-collapse: collapse;
            padding: 6px;
        }
    </style>
</head>
<body>

<h2>Bookshelf Management System</h2>

Title:
<input type="text" id="title">
<span class="error" id="titleErr"></span>
<br><br>

Author:
<input type="text" id="author">
<span class="error" id="authorErr"></span>
<br><br>

Price:
<input type="text" id="price">
<span class="error" id="priceErr"></span>
<br><br>

Stock:
<input type="text" id="stock">
<span class="error" id="stockErr"></span>
<br><br>

<button onclick="addBook()">Add Book</button>

<p id="message"></p>

<table>
    <thead>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Author</th>
            <th>Price</th>
            <th>Stock</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody id="bookTable">
        <!-- AJAX will load book data here -->
    </tbody>
</table>

<script src="../js/ajax.js"></script>

</body>
</html>