 // name = "alamin";
// var name ="alamin";
// let name = "alamin";
const name = "alamin";

let std = [1, 'alamin', 2.5];
std[1];

// if(1 === "1"){

// }else{

// }else if(){

// }else{

// }

// for(let a =10; a<10; a++){

// }

// function sum(a, b){
//     return a+b;
// }
// sum(10,20);

// let sum = function(a, b){
//     return a+b;
// }
//sum(10,20);
// let sum = (a,b)=>a+b;

// function test(a, b){
//     let c = a(10,20)+b;
//     return c;
// }
// test(sum, 10);

//console.log(std[1]);
//alert(name);
//document.write('test js script....');

let btn = document.getElementById('btn');

btn.addEventListener('click', function(){
    let head = document.getElementsByTagName('h1')[0];
    let username = document.getElementById('username');
    //console.log(head);
    //alert(head);

    if(username.value == ""){
        document.getElementById('msg').innerHTML = "please type username first!";
    }else{
        head.innerHTML = username.value;
        head.style.color = "red";
        document.getElementById('msg').innerHTML = "";
    }
});


let move = document.getElementById('btn1');
move.addEventListener('click', ()=>{
    let d1 = document.getElementById('d1');
    //let val ="";
    //alert(parseInt(val));

    // for(let a=0; a<50; a++){
    //     setTimeout(()=>{
    //         let current = window.getComputedStyle(d1).left;
    //         if(current == 0){
    //             current = "10px";
    //         }else{
    //             //let newPos = current.replace('px', '').trim();
    //             current = parseInt(current)+10+"px";
    //             d1.style.left =current;
    //         }
    //     }, 200*(a+1));
    // }

    let count =0;
    let interval = setInterval(()=>{
        if(count >50){
            clearInterval(interval);
        }else{
            let current = window.getComputedStyle(d1).left;
            if(current == 0){
                current = "10px";
            }else{
                current = parseInt(current)+10+"px";
                d1.style.left =current;
            }
        }
        count++;
    }, 100);
});




