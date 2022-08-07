const statut = document.getElementById("statut");
let gameStatut = true;
let player = "X";
let gameCurrent = ["", "", "", "", "", "", "", "", ""];

const conditionsToWin = [
  [0, 1, 2],
  [3, 4, 5],
  [6, 7, 8],

  [0, 3, 6],
  [1, 4, 7],
  [2, 5, 8],

  [0, 4, 8],
  [2, 4, 6],
];

const win = () => `Le joueur ${player} a gagné`;
const egalite = () => "Egalité";
const playerTurn = () => `C'est au tour du joueur ${player}`;

statut.innerHTML = playerTurn();

document
  .querySelectorAll(".case")
  .forEach((cell) => cell.addEventListener("click", gestionClicCase));
document.querySelector("#reset-game").addEventListener("click", restart);

function gestionClicCase() {
  // Récupère l'index de la case cliquée
  const indexCase = parseInt(this.dataset.index);
  if (gameCurrent[indexCase] !== "" || !gameStatut) {
    return;
  }
  gameCurrent[indexCase] = player;
  this.innerHTML = player;

  checkWin();
}

function checkWin() {
  let roundWin = false;

  for (let conditionToWin of conditionsToWin) {
    let val1 = gameCurrent[conditionToWin[0]];
    let val2 = gameCurrent[conditionToWin[1]];
    let val3 = gameCurrent[conditionToWin[2]];

    if (val1 === "" || val2 === "" || val3 === "") {
      continue;
    }
    if (val1 === val2 && val2 === val3) {
      roundWin = true;
      break;
    }
  }
  if (roundWin) {
    statut.innerHTML = win();
    gameStatut = false;
    return;
  }

  if (!gameCurrent.includes("")) {
    statut.innerHTML = egalite();
    gameStatut = false;
    return;
  }
  player = player === "X" ? "O" : "X";
  statut.innerHTML = playerTurn();
}

function restart() {
  player = "X";
  gameStatut = true;
  gameCurrent = ["", "", "", "", "", "", "", "", ""];
  statut.innerHTML = playerTurn()
  document.querySelectorAll(".case").forEach(cell=>cell.innerHTML = "")
}
