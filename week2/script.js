/* IT121 HW2 - Pig latin
Alexandra Ciancimino
01-13-2024
*/

function translator(str) {
    // Give error message for empty input or single-letter words
    if (!str || str.trim().length == 0 || str.trim().split(' ').some(word => word.length == 1)) {
        return "Input can't be translated.";
    }

    // Splits words in sentences
    let words = str.split(' ');

    let translatedWords = words.map(word => {
        // Find the first vowel in the word
        let firstVowel = word.match(/[aeiou]/);

        // Check for the first vowel
        if (firstVowel) {
            // If the first vowel is at the start of the word, add "way"
            if (word.indexOf(firstVowel[0]) == 0) {
                return word + 'way';
            } else {
                // If the first vowel is not at the start of the word, slice the word (up to two letters) and add "ay" 
                let firstPosition = word.indexOf(firstVowel[0]);
                return word.slice(firstPosition) + word.slice(0, firstPosition) + 'ay';
            }
        }

        // If no vowel is found, leave the word unchanged
        return word;
    });

    // Rejoins words in sentences
    return translatedWords.join(' ');
}


// Examples: tested using code runner on vscode - was trying to research how to link this with the html form I created on it121/week2/index.html but did not finish in time. 
console.log(translator("apple"));
console.log(translator("pig latin"));
console.log(translator("grade"));
console.log(translator("apple makes phones"));
console.log(translator("I"));