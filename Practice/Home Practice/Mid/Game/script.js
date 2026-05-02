let board = ["", "", "", "", "", "", "", "", ""];
let turn = "X";
let gameOver = false;

const cells = document.getElementsByTagName("td");
const statusText = document.getElementById("status");
const resetBtn = document.getElementById("reset");

const winCombos = [
  [0,1,2],[3,4,5],[6,7,8],
  [0,3,6],[1,4,7],[2,5,8],
  [0,4,8],[2,4,6]
];

// Add click listeners to each cell
for (let i = 0; i < cells.length; i++) {
  cells[i].addEventListener("click", function () {
    playMove(this, i);
  });
}

function playMove(cell, index) {
  if (board[index] === "" && gameOver === false) {
    board[index] = turn;
    cell.textContent = turn;

    checkWinner();

    if (!gameOver) {
      turn = (turn === "X") ? "O" : "X";
      statusText.textContent = "Current Turn: " + turn;
    }
  }
}

function checkWinner() {

  for (let i = 0; i < winCombos.length; i++) {
    let a = winCombos[i][0];
    let b = winCombos[i][1];
    let c = winCombos[i][2];

    if (board[a] !== "" && board[a] === board[b] && board[b] === board[c]) {
      statusText.textContent = "Player " + board[a] + " wins!";
      gameOver = true;
      return;
    }
  }

  // Check draw
  let draw = true;
  for (let i = 0; i < board.length; i++) {
    if (board[i] === "") {
      draw = false;
    }
  }

  if (draw) {
    statusText.textContent = "It's a draw!";
    gameOver = true;
  }
}

// Reset game
resetBtn.addEventListener("click", function () {
  board = ["", "", "", "", "", "", "", "", ""];
  turn = "X";
  gameOver = false;
  statusText.textContent = "Current Turn: X";

  for (let i = 0; i < cells.length; i++) {
    cells[i].textContent = "";
  }
});