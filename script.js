
//Dom query 1: Changes color of desc text, Updates page css
//code source: https://www.w3schools.com/jsref/met_document_getelementsbyclassname.asp
var classes = document.getElementsByClassName("pieceDescription");
 function mouseDown() {
   for (var i = 0; i < classes.length; i ++){
      classes[i].style.color = "#8B8EB5";
   }
 }


  function mouseUp() {
    for (var i = 0; i < classes.length; i ++){
       classes[i].style.color = "#53556B";
    }
  }

//Dom query 2: Quote generator, updates page content
//code source: https://www.freecodecamp.org/news/creating-a-bare-bones-quote-generator-with-javascript-and-html-for-absolute-beginners-5264e1725f08/

  var quotes = [
    ' "Perhaps they were right putting love into books. Perhaps it could not live anywhere else" - William Faulkner',
    ' "I am supposed to be touched. I cannot wait to find the person who will come into the kitchen just to smell my neck and get behind me and hug me and breathe me in and make me turn around and make me kiss his face and put my hands in his hair even with my soapy dishwater drips. I am a lovely woman. Who will come into my kitchen and be hungry for me?" -Jenny Slate, Little Weirds',
    ' "A man takes his sadness down to the river and throws it in the river, but then he is still left with the river. A man takes his sadness and throws it away but then he is still left with his hands." - Richard Siken, Crush',
    ' "You sliced me loose and said it was Creation. I could feel the knife." - Margaret Atwood, "Speeches for Doctor Frankenstein"'
  ]

  function newQuote() {
    var randomNumber = Math.floor(Math.random() * (quotes.length));
    document.getElementById('quoteDisplay').innerHTML = quotes[randomNumber];
  }
