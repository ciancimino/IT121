let grades = "jim|25, sue|32, mary|34, ann|22, ted|28, frank|15, lisa|19, mike|30, ahn|26, vishaya|27";
let studentsArray = [];
studentsArray = grades.split(', ');
for (let i = 0; i < studentsArray.length; i++) {
    let [name, score] = studentsArray[i].split('|');
    name = name.charAt(0).toUpperCase() + name.slice(1);
    console.log(`${name} - ${score}`);
}
console.log(`Total # of students: ${studentsArray.length}`);

let lowestScore = Infinity;
let highestScore = -Infinity;
let totalScore = 0;

for (let i = 0; i < studentsArray.length; i++) {
    let [name, score] = studentsArray[i].split('|');
    let numericScore = parseInt(score);

    // Update lowest and highest scores
    lowestScore = Math.min(lowestScore, numericScore);
    highestScore = Math.max(highestScore, numericScore);

    // Accumulate scores for average calculation
    totalScore += numericScore;
}
let averageScore = totalScore / studentsArray.length;

console.log(`Lowest Score: ${lowestScore}`);
console.log(`Highest Score: ${highestScore}`);
console.log(`Average Score: ${averageScore.toFixed(2)}`);