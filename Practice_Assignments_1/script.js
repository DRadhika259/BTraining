//Practice Assignment

//Values and variables

let country = "India";
let continent = "Asia";
let population = 698;

console.log(country);
console.log(continent);
console.log(population);

//Data Types

let isIsland = true;
let language;

console.log(isIsland, typeof isIsland);
console.log(population, typeof population);
console.log(country, typeof country);
console.log(language, typeof language);

//let const and var

language = "Marathi";
const country = "India";
const continent = "Asia";
let population = 900;
const isIsland = false;
isIsland = true;

//Basic Operators

const country = "India";
const continent = "Asia";
let population = 7;
let language = "Marathi";

console.log(population / 2);
population++;
console.log(population);
console.log(population > 6);
console.log(population < 33);
const description =
  country +
  " is in " +
  continent +
  " and its " +
  population +
  " million people speak " +
  language;
console.log(description);

//String and template literals

const country = "India";
const continent = "Asia";
let population = 7;
let language = "Marathi";

const description = `${country} is in ${continent} and its ${population} million people speak ${language}`;
console.log(description);

//if-else statement

const country = "India's";
let population = 7;

if (population > 33) {
  console.log(`${country} population is above average`);
} else {
  console.log(
    `${country} population is ${33 - population} million below average`
  );
}

//Type Conversion and Coercion

console.log("9" - "5");
console.log("19" - "13" + "17");
console.log("19" - "13" + 17);
console.log("123" < 57);
console.log(5 + 6 + "4" + 9 - 4 - 2);

//Equality operators == vs ===

const country = "India";
let numNeighbours = Number(
  prompt(`How many neighbour countries does your ${country} have?`)
);
if (numNeighbours === 1) {
  console.log("Only one border!");
} else if (numNeighbours > 1) {
  console.log("More than 1 border");
} else {
  console.log("No border");
}

//Logical operators

let country = "India";
let language = "English";
let population = 50;
let isIsland = false;

if (language == "English" && population < 50 && !isIsland) {
  console.log(`You should live in ${country}`);
} else {
  console.log(`${country} does not meet your criteria!`);
}

//Switch Statement

switch (language) {
  case "Chinese":
    console.log("MOST number of native speakers!");
    break;
  case "Mandarin":
    console.log("MOST number of native speakers!");
    break;
  case "Spanish":
    console.log("2nd place in number of native speakers");
    break;
  case "English":
    console.log("3rd place");
    break;
  case "Hindi":
    console.log("Number 4");
    break;
  case "Arabic":
    console.log("5th most spoken language");
    break;
  default:
    console.log("Great language too.");
}

//Ternary operator
console.log(
  `${country}'s population is ${population > 33 ? "above" : "below"} average`
);
