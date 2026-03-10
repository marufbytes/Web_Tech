var display = document.getElementById("display");

function press(num){
display.value = display.value + num;
}

function calculate(){
display.value = eval(display.value);
}

function clearDisplay(){
display.value = "";
}