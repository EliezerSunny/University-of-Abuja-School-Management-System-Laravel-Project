// var exitTime = {!! json_encode($countDownTime) !!}
// 'December 31, 2023 23:59:59'
// ;
const countDownDate = new Date(exitTime).getTime();
let x = setInterval(function() {
  const now = new Date().getTime();
  const time = countDownDate - now;


  const seconds = Math.floor((time % (1000 * 60)) / 1000);
  const minutes = Math.floor((time % (1000 * 60 * 60)) / (1000 * 60));
  const hours = Math.floor((time % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  const days = Math.floor(time / (1000 * 60 * 60 * 24));

  // flip(document.querySelector("[data-days-hundreds]"), Math.floor(days / 100));
  flip(document.querySelector("[data-days-tens]"), Math.floor(days / 10));
  flip(document.querySelector("[data-days-ones]"), days % 10);
  flip(document.querySelector("[data-hours-tens]"), Math.floor(hours / 10));
  flip(document.querySelector("[data-hours-ones]"), hours % 10);
  flip(document.querySelector("[data-minutes-tens]"), Math.floor(minutes / 10));
  flip(document.querySelector("[data-minutes-ones]"), minutes % 10);
  flip(document.querySelector("[data-seconds-tens]"), Math.floor(seconds / 10));
  flip(document.querySelector("[data-seconds-ones]"), seconds % 10);


  

function flip(flipCard, newNumber) {
  const topHalf = flipCard.querySelector(".top")
  const startNumber = parseInt(topHalf.textContent)
  if (newNumber === startNumber) return

  const bottomHalf = flipCard.querySelector(".bottom")
  const topFlip = document.createElement("div")
  topFlip.classList.add("top-flip")
  const bottomFlip = document.createElement("div")
  bottomFlip.classList.add("bottom-flip")

  top.textContent = startNumber
  bottomHalf.textContent = startNumber
  topFlip.textContent = startNumber
  bottomFlip.textContent = newNumber

  topFlip.addEventListener("animationstart", e => {
    topHalf.textContent = newNumber
  })
  topFlip.addEventListener("animationend", e => {
    topFlip.remove()
  })
  bottomFlip.addEventListener("animationend", e => {
    bottomHalf.textContent = newNumber
    bottomFlip.remove()
  })
  flipCard.append(topFlip, bottomFlip)
}


    
  // If the count down is over, write some text 
  if (time < 0) {
    clearInterval(x);
    document.getElementById("demo1").innerHTML = "Course Registration closed!!!";
    document.getElementById("demo").style.hidden = "hidden";
    const cus = document.querySelector(".course_registeration");
    if (cus) {
      cus.style.hidden = "hidden";
    }
    document.querySelector(".exit").style.hidden = "hidden";
    document.querySelectorAll(".btnrt").style.hidden = "hidden";
  } else{
    document.getElementById("demo").innerHTML = "Closing Course Reg. in the next...";
  }

}, 1000);