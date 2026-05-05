

function ajax(){
    let username = document.getElementById('username').value;
    
    let user = {
        'username' : username,
        'password' : '123',
        'email' : 'alamin@aiub.edu'
    };

    let data = JSON.stringify(user);
    
    let xhttp = new XMLHttpRequest();
    //xhttp.open('get', 'upload.php?username='+username, true);
    xhttp.open('post', 'upload.php', true);
    xhttp.setRequestHeader('Content-type','application/x-www-form-urlencoded');
    xhttp.send('user='+data);
    xhttp.onreadystatechange = function (){
        if(this.readyState == 4 && this.status == 200){
            let user = JSON.parse(this.responseText);
            document.getElementById('msg').innerHTML = user.username;
        }
    }
    
    
}