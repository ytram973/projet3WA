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

//on met des ecouteur devenements
document.querySelectorAll(".case").forEach((cell) => cell.addEventListener("click", gestionClicCase));
document.querySelector("#reset-game").addEventListener("click", restart);


function gestionClicCase(){
  // Récupère l'index de la case cliquée
  const indexCase = parseInt(this.dataset.index);
  if (gameCurrent[indexCase] !== "" || !gameStatut) {
    return;
  }
//on ecrit le symbole du joeur dans le tableau
  gameCurrent[indexCase] = player;
  this.innerHTML = player;
//verifie si le joueur a win
  checkWin();
}

function checkWin() {
  let roundWin = false;
//on recupere toutes les conditions de victoire
  for (let conditionToWin of conditionsToWin) {
    // on recupere les 3 cases de la condition de victoire
    let val1 = gameCurrent[conditionToWin[0]];
    let val2 = gameCurrent[conditionToWin[1]];
    let val3 = gameCurrent[conditionToWin[2]];

    if (val1 === "" || val2 === "" || val3 === "") {
      continue;
    }
    //si les 3 cases sont identiques
    if (val1 === val2 && val2 === val3) {
      roundWin = true;
      break;
    }
  }
  //si cest win
  if (roundWin) {
    statut.innerHTML = win();
    gameStatut = false;
    return;
  }
//verification des cases si elle sont remplies
  if (!gameCurrent.includes("")) {
    statut.innerHTML = egalite();
    gameStatut = false;
    return;
  }
  //le changement de joueur
  player = player === "X" ? "O" : "X";
  statut.innerHTML = playerTurn();
}


// cette fonction relance le jeu
function restart() {
  player = "X";
  gameStatut = true;
  gameCurrent = ["", "", "", "", "", "", "", "", ""];
  statut.innerHTML = playerTurn()
  document.querySelectorAll(".case").forEach(cell=>cell.innerHTML = "")
}
