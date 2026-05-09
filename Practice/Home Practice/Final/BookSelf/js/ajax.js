window.onload = function() {
    loadBooks();
};

function loadBooks() {

    var xhttp = new XMLHttpRequest();
    // AJAX object loads books without page reload.

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var books = JSON.parse(this.responseText);
            // JSON.parse converts PHP JSON response into JavaScript array.

            var html = "";

            for (var i = 0; i < books.length; i++) {
                html += "<tr>";
                html += "<td>" + books[i].id + "</td>";
                html += "<td>" + books[i].title + "</td>";
                html += "<td>" + books[i].author + "</td>";
                html += "<td>" + books[i].price + "</td>";
                html += "<td>" + books[i].stock + "</td>";
                html += "<td><button onclick='deleteBook(" + books[i].id + ")'>Delete</button></td>";
                html += "</tr>";
            }

            document.getElementById("bookTable").innerHTML = html;
        }
    };

    xhttp.open("POST", "../controller/bookController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=read");
}

function addBook() {

    var title = document.getElementById("title").value;
    var author = document.getElementById("author").value;
    var price = document.getElementById("price").value;
    var stock = document.getElementById("stock").value;

    var xhttp = new XMLHttpRequest();
    // AJAX sends form data to controller without refreshing page.

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var data = JSON.parse(this.responseText);
            // JSON.parse reads validation/success response from PHP.

            document.getElementById("titleErr").innerHTML = "";
            document.getElementById("authorErr").innerHTML = "";
            document.getElementById("priceErr").innerHTML = "";
            document.getElementById("stockErr").innerHTML = "";
            document.getElementById("message").innerHTML = "";

            if (data.status == "error") {

                if (data.errors.title) {
                    document.getElementById("titleErr").innerHTML = data.errors.title;
                }

                if (data.errors.author) {
                    document.getElementById("authorErr").innerHTML = data.errors.author;
                }

                if (data.errors.price) {
                    document.getElementById("priceErr").innerHTML = data.errors.price;
                }

                if (data.errors.stock) {
                    document.getElementById("stockErr").innerHTML = data.errors.stock;
                }

            } else if (data.status == "success") {

                document.getElementById("message").className = "success";
                document.getElementById("message").innerHTML = data.message;

                clearForm();
                loadBooks();

            } else {
                document.getElementById("message").className = "error";
                document.getElementById("message").innerHTML = data.message;
            }
        }
    };

    xhttp.open("POST", "../controller/bookController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

    xhttp.send(
        "action=add" +
        "&title=" + title +
        "&author=" + author +
        "&price=" + price +
        "&stock=" + stock
    );
}

function deleteBook(id) {

    var xhttp = new XMLHttpRequest();
    // AJAX sends delete request without page reload.

    xhttp.onreadystatechange = function() {

        if (this.readyState == 4 && this.status == 200) {

            var data = JSON.parse(this.responseText);
            // JSON.parse reads delete status from PHP.

            document.getElementById("message").innerHTML = data.message;

            if (data.status == "success") {
                document.getElementById("message").className = "success";
                loadBooks();
            } else {
                document.getElementById("message").className = "error";
            }
        }
    };

    xhttp.open("POST", "../controller/bookController.php", true);
    xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhttp.send("action=delete&id=" + id);
}

function clearForm() {
    document.getElementById("title").value = "";
    document.getElementById("author").value = "";
    document.getElementById("price").value = "";
    document.getElementById("stock").value = "";
}