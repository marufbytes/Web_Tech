function analyzeText() {

    var text = document.getElementById("inputText").value;

    if (text === "") {
        document.getElementById("result").innerHTML = "Please enter some text.";
        return;
    }

    var charCount = text.length;

    var wordsArray = text.split(" ");
    var wordCount = 0;

    for (var i = 0; i < wordsArray.length; i++) {
        if (wordsArray[i] !== "") {
            wordCount++;
        }
    }

    var reversedText = text.split("").reverse().join("");

    var resultDiv = document.getElementById("result");

    resultDiv.innerHTML = "Character Count: " + charCount + "<br>";
    resultDiv.innerHTML += "Word Count: " + wordCount + "<br>";
    resultDiv.innerHTML += "Reversed Text: " + reversedText;
}