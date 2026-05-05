

function ajax(){
    let username = document.getElementById('username').value;
    let xhttp = new XMLHttpRequest();
    xhttp.open('get', 'upload.php?username='+username, true);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            document.getElementById('msg').innerHTML = this.responseText;
        }
    }
    xhttp.send();
    
}