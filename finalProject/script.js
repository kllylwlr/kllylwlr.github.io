const coffee = ["🍦", "🍦", "🥐", "🥐", "🍪", "🍪", "🍩", "🍩", "🍵", "🍵", "🍰", "🍰", "🧋", "🧋", "🧁", "🧁"];
let shuffleCoffee = coffee.sort(() => (Math.random() > 0.5) ? 1 : -1);

for (var i = 0; i < coffee.length; i++) {
  let box = document.createElement("div");
  box.className = "item";
  box.innerHTML = shuffleCoffee[i];

  box.onclick = function() {
    this.classList.add('boxOpen');
    setTimeout(function(){
      if(document.querySelectorAll('.boxOpen').length > 1){
        if(document.querySelectorAll('.boxOpen')[0].innerHTML == document.querySelectorAll('.boxOpen')[1].innerHTML){
          document.querySelectorAll('.boxOpen')[0].classList.add("boxMatch")
          document.querySelectorAll('.boxOpen')[1].classList.add("boxMatch")

          document.querySelectorAll('.boxOpen')[1].classList.remove("boxOpen")
          document.querySelectorAll('.boxOpen')[0].classList.remove("boxOpen")
          if(document.querySelectorAll(".boxMatch").length == coffee.length){
            alert("win");
          }
        }
        else{
          document.querySelectorAll('.boxOpen')[1].classList.remove("boxOpen")
          document.querySelectorAll('.boxOpen')[0].classList.remove("boxOpen")
          }
          }
        }, 500)
  }

  document.querySelector(".game").appendChild(box);


//'Our Menu' Button 
let menuBtn = document.getElementById("menuBtn");
menuBtn.addEventListener("click", function() {
  location.href = "products.html"

});

}

