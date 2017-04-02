var numberOfTiles = 8;
var secondsToMemorize = 3;

var pairs = [];

var guess1 = -1;
var guess2 = -1;

var timeLeft = 120;

// Keep track of the time
function clock() {
    timeLeft--;
    document.getElementById("p_clock").innerHTML = "Time Left: " + timeLeft;
}

// Check if the guesses are correct
function checkGuesses(g1, g2) {

    var index1 = this.pairs.indexOf(g1);
    var index2 = this.pairs.indexOf(g2);

    if (index1 % 2 === 0 && index2 === (index1 + 1)) {
        // Match
        console.log("match!");
    } else if (index2 % 2 === 0 && index1 === (index2 + 1)) {
        // Match
        console.log("match!");
    } else {
        // Not a match
        console.log("No match!");
        // Wait, then hid the images
        setTimeout(resetImages, 1000, g1, g2);
    }
    // Reset the guesses
    this.guess1 = -1;
    this.guess2 = -1;
}

// If there is not a match return the images to the numbers
function resetImages(g1, g2) {
    document.getElementById("i" + g1).setAttribute("src", "./img/num" + (g1 + 1) + ".gif");
    document.getElementById("i" + g2).setAttribute("src", "./img/num" + (g2 + 1) + ".gif");
}

// Keep track of the guesses made so far
function guess(elementId) {

    console.log(this.pairs);

    // Get which element was selected
    var temp = elementId.split("i");
    temp = parseInt(temp[1]);
    console.log("Temp: " + temp);

    // Find in in the pairs array and convert it to the correct image suffix
    var imgNum = Math.floor(this.pairs.indexOf(temp) / 2);
    console.log("Image Num: " + imgNum);

    // Change the number to the image
    var selected = document.getElementById(elementId);
    selected.setAttribute("src", "./img/image00" + imgNum.toString() + ".gif");

    // Store the guess
    if (this.guess1 === -1) {
        this.guess1 = parseInt(temp);
    } else if (this.guess2 === -1) {
        this.guess2 = parseInt(temp);
        checkGuesses(guess1, guess2);
    }

    console.log("id: " + elementId);
    console.log("g1: " + this.guess1);
    console.log("g2: " + this.guess2);
}

function start(tiles, seconds) {

    // Clear any images if they exist
    for (var h = 0; h < 12; h++) {
        var td = document.getElementById(h.toString());
        while (td.hasChildNodes()) {
            console.log("ID: " + h + ". Remove child.");
            td.removeChild(td.lastChild);
        }
    }

    // Create the proper number of pairs
    for (var i = 0; i < tiles; i++) {
        this.pairs[i] = i;
    }

    // Shuffle the elements
    this.pairs = fisherYatesShuffle(this.pairs);

    // Put images in paired indices
    var imgNumber = 0;
    for (var j = 0; j < this.pairs.length; j++) {
        var tableData = document.getElementById(this.pairs[j].toString());
        var img = document.createElement("img");
        img.setAttribute("src", "./img/image00" + imgNumber.toString() + ".gif");
        tableData.appendChild(img);
        if ((j + 1) % 2 === 0) {
            imgNumber++;
        }
    }

    // Wait the proper amount of time then hid the images
    setTimeout(imgToNum, (seconds * 1000), tiles);

    // Start the timer
    setInterval(clock, 1000);
}

// Swap all images to numbers
function imgToNum(selection) {

    // Clear any images if they exist
    for (var h = 0; h < 12; h++) {
        var td = document.getElementById(h.toString());
        if (td.hasChildNodes()) {
            td.removeChild(td.lastChild);
        }
    }

    // Put images into <td>
    for (var j = 0; j < selection; j++) {
        var tableData = document.getElementById(j.toString());
        var img = document.createElement("img");
        img.setAttribute("src", "./img/num" + (j + 1).toString() + ".gif");
        img.id = "i" + j.toString();

        // When an image is clicked, pass its id to the guess() function
        img.onclick = function clicked(event) {
            guess(event.srcElement.id);
        };
        tableData.appendChild(img);
    }
}

// Shuffles an array using the Fisher-Yates ShuffleS
function fisherYatesShuffle(array) {

    // This current size of the "selectable" array
    var arraySize = array.length;
    var temp;
    var random;

    // Check if there are more elements to shuffle
    while (arraySize !== 0) {

        // Pick a random number in the range of the "selectable" array
        random = Math.floor(Math.random() * arraySize);

        // Reduce the size of the "selectable" array by one
        arraySize -= 1;

        // Swap the element at the random index with the one at the end of the "selectable" array
        temp = array[arraySize];
        array[arraySize] = array[random];
        array[random] = temp;
    }

    // Return the shuffled array
    return array;
}

function setNumberOfTiles(numberOfTiles) {
    this.numberOfTiles = numberOfTiles;
    document.getElementById("p_pairs").innerHTML = "Current selection: " + numberOfTiles / 2;
    if (numberOfTiles === 8) {
        timeLeft = 120;
    } else if (numberOfTiles === 10) {
        timeLeft = 150;
    } else if (numberOfTiles === 11) {
        timeLeft = 180;
    }
}

function setSecondsToMemorize(secondsToMemorize) {
    this.secondsToMemorize = secondsToMemorize;
    document.getElementById("p_time").innerHTML = "Current selection: " + secondsToMemorize;
}