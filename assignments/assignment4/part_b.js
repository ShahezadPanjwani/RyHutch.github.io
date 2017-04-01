var randomNumber = getRandomInt(1, 100);

function evaluateGuess() {

    // Get the range
    var temp = document.getElementById("p_range").innerHTML.toString().split(" ");
    var min = parseInt(temp[1]);
    var max = parseInt(temp[3]);

    // Get the remaining guesses
    temp = document.getElementById("p_guesses").innerHTML.toString().split(" ");
    var guesses = parseInt(temp[2]);
    guesses--;

    var guess = parseInt(document.getElementById("input_number_guess").value);

    if (guess > randomNumber) {
        max = guess;
        if (guesses === 0) {
            loserMessage();
        }
    } else if (guess < randomNumber) {
        min = guess;
        if (guesses === 0) {
            loserMessage();
        }
    } else if (guess === randomNumber) {
        min = guess;
        max = guess;
        if (guesses >= 0) {
            winnerMessage();
        }
    }

    console.log(guesses);

    document.getElementById("p_range").innerHTML = "Range: " + min + " - " + max;
    document.getElementById("p_guesses").innerHTML = "Guesses Remaining: " + guesses
}

// This function was found on the Mozilla Developer Network and is easy to follow
// https://developer.mozilla.org/en-US/docs/Web/JavaScript/Reference/Global_Objects/Math/random
function getRandomInt(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min)) + min;
}

// Display the winner message
function winnerMessage() {
    var winnerP = document.createElement("p");
    var winnerTextNode = document.createTextNode("You win! The number was " + randomNumber + ".");
    winnerP.appendChild(winnerTextNode);
    document.getElementById("div_gui").appendChild(winnerP);
}

// Display the loser message
function loserMessage() {
    var loserP = document.createElement("p");
    var loserTextNode = document.createTextNode("You lose! The number was " + randomNumber + ".");
    loserP.appendChild(loserTextNode);
    document.getElementById("div_gui").appendChild(loserP);
}