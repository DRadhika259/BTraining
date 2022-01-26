//Functions

function describeCountry(country, population, capitalCity) {
  return `${country} has ${population} million people and its capital city is ${capitalCity}`;
}
const describeIndia = describeCountry("India", 6, "Delhi");
const describeEurope = describeCountry("Europe", 5, "Brussels");
const describeJapan = describeCountry("Japan", 4, "Tokyo");

console.log(describeIndia, describeEurope, describeJapan);

//Function Declaration & Function Expression

//declaration
function percentageOfWorld1(population) {
  return (population / 7900) * 100;
}

//expression
const percentageOfWorld2 = function (population) {
  return (population / 7900) * 100;
};

const populationPercentIndia = percentageOfWorld1(800);
const populationPercentEurope = percentageOfWorld1(500);
const populationPercentJapan = percentageOfWorld1(700);

console.log(
  populationPercentIndia,
  populationPercentEurope,
  populationPercentJapan
);

//Arrow Function
const percentageOfWorld3 = (population) => (population / 7900) * 100;
const populationPercentIndia1 = percentageOfWorld3(800);
const populationPercentEurope1 = percentageOfWorld3(500);
const populationPercentJapan1 = percentageOfWorld3(700);

console.log(
  populationPercentIndia1,
  populationPercentEurope1,
  populationPercentJapan1
);

//Function Calling other Function

function describePopulation(country, population) {
  const percentage = percentageOfWorld1(population);
  console.log(
    `${country} has ${population} million people which is about ${percentage}% of the world`
  );
}

describePopulation("India", 3);
describePopulation("Europe", 5);
describePopulation("Japan", 7);

/*
//Introduction to arrays

const populations = [800, 500, 600, 700];
console.log(populations.length===4);
const percentages = [
  percentageOfWorld1(populations[0]),
  percentageOfWorld1(populations[1]),
  percentageOfWorld1(populations[2]),
  percentageOfWorld1(populations[3]),
];
console.log(percentages);

//Basic Array Operations(Methods)
const neighbours = ["India", "Europe", "Japan", "China"];
neighbours.push("Utopia");
console.log(neighbours);
neighbours.pop();
console.log(neighbours);
if (!neighbours.includes("Germany")) {
  console.log("Probably not a central European Country");
}
neighbours[neighbours.indexOf("China")] = "Norway";

console.log(neighbours);

*/
/*
//Introduction to Objects

const myCountry = {
  country: "India",
  capital: "Delhi",
  language: "Hindi",
  population: 5,
  neighbours: ["Europe", "Japan", "China"],
};
*/
/*
//Dot vs. Bracket notation
 console.log(
`${myCountry.country} has ${myCountry.population} million ${myCountry.language}-speaking people, ${myCountry.neighbours.length} neighbouring countries and a capital called ${myCountry.capital}`
);
*/

/*
myCountry.population += 2;
console.log(myCountry.population);
myCountry["population"] -= 2;
console.log(myCountry.population);
*/

//Object Methods
const myCountry2 = {
  country: "India",
  capital: "Delhi",
  language: "Hindi",
  population: 5,
  neighbours: ["Europe", "Japan", "China"],

  describe: function () {
    console.log(
      `${this.country} has ${this.population} million 
  ${this.language}-speaking people, 
  ${this.neighbours.length} neighbouring countries and a 
  capital called ${this.capital}.`
    );
  },

  checkIsland: function () {
    this.Island = this.neighbours.length === 0 ? true : false;
  },
};

myCountry2.describe();
myCountry2.checkIsland();
console.log(myCountry2);

//Iteration
for (let i = 1; i <= 50; i++) {
  console.log(`Voter number ${i} is currently voting`);
}

//Looping Arrays, Breaking and Continuing

const populations = [800, 500, 600, 700];
const percentages2 = [];
for (let i = 0; i < populations.length; i++) {
  const percent = percentageOfWorld1(populations[i]);
  percentages2.push(percent);
}
console.log(percentages2);

//Looping Backwards and Loops in Loops

const listOfNeighbours = [
  ["Canada", "Mexico"],
  ["Spain"],
  ["Norway", "Sweden", "Russia"],
];

for (let x = 0; x < listOfNeighbours.length; x++)
  for (y = 0; y < listOfNeighbours[x].length; y++)
    console.log(`Neighbour: ${listOfNeighbours[x][y]}`);

//While loop

const percentages3 = [];
let i = 0;
while (i < populations.length) {
  const percent = percentageOfWorld1(populations[i]);
  percentages3.push(percent);
  i++;
}
console.log(percentages3);
