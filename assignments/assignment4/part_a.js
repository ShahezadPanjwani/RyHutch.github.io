onStart();

// Runs when the page is loaded
function onStart() {
    var hours = getHours();
    var wage = calculateWage(hours);
    createReport(hours, wage);
}

// Get employee hours using a prompt
function getHours() {

    // Employee index
    var i = 0;

    //Hours worked
    var hours = 0;

    // Employee Time Array
    var timeWorked = [];

    // Get hours for employees until -1 is entered into the prompt
    while (parseFloat(hours) !== -1) {

        // Use a do while to guarantee that it prompts the first time
        do {
            hours = parseFloat(prompt("Enter how many hours employee " + (i + 1) + " has worked.\nEnter -1 to exit the prompt."));
        } while (isNaN(hours) || hours < -1 || (hours > -1 && hours < 0));

        // Add the hours to the time worked
        timeWorked[i] = hours;

        // Increment employee counter
        i++;
    }
    return timeWorked;
}

// Calculate employee earnings
function calculateWage(timeWorked){

    // Wages earned
    var wage = [];

    // Increment through timeWorked and calculate the wage
    for (var i = 0; i < timeWorked.length; i++){

        // Get the time worked
        var hours = timeWorked[i];

        // Initialize the current wage to 0
        wage[i] = 0;

        // Consider $15 per hour with 1.5 times for overtime
        if (hours > 40){
            wage[i] += 40 * 15;
            hours -= 40;
            wage[i] += hours * (15 * 1.5);
        } else {
            wage[i] += hours * 15;
        }
    }
    return wage;
}

// Generate the html to display a wage report
function createReport(hours, wage){

    var wageTable = document.getElementById("wageTable");

    // Make the header row
    var head = document.createElement("tr");

    var employeeHead = document.createElement("th");
    var employeeHeadNode = document.createTextNode("Employee #");
    employeeHead.appendChild(employeeHeadNode);
    head.appendChild(employeeHead);

    var hoursHead = document.createElement("th");
    var hoursHeadNode = document.createTextNode("Hours Worked");
    hoursHead.appendChild(hoursHeadNode);
    head.appendChild(hoursHead);

    var rateHead = document.createElement("th");
    var rateHeadNode = document.createTextNode("Rate");
    rateHead.appendChild(rateHeadNode);
    head.appendChild(rateHead);

    var wageHead = document.createElement("th");
    var wageHeadNode = document.createTextNode("Wage");
    wageHead.appendChild(wageHeadNode);
    head.appendChild(wageHead);

    wageTable.appendChild(head);

    // Make each entry for each employee
    for (var i = 0; i < hours.length - 1; i++){

        var row = document.createElement("tr");

        var employeeRow = document.createElement("td");
        var employeeRowNode = document.createTextNode((i+1).toString());
        employeeRow.appendChild(employeeRowNode);
        row.appendChild(employeeRow);

        var hoursRow = document.createElement("td");
        var hoursRowNode = document.createTextNode(hours[i].toString());
        hoursRow.appendChild(hoursRowNode);
        row.appendChild(hoursRow);

        var rateRow = document.createElement("td");
        var rateRowNode = document.createTextNode("15");
        rateRow.appendChild(rateRowNode);
        row.appendChild(rateRow);

        var wageRow = document.createElement("td");
        var wageRowNode = document.createTextNode(wage[i].toString());
        wageRow.appendChild(wageRowNode);
        row.appendChild(wageRow);

        wageTable.appendChild(row);
    }
}