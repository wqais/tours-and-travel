var totalAdultSeats = document.querySelector("#adult-seats").value;
var totalChildSeats = document.querySelector("#child-seats").value;
var totalCost = document.querySelector(".total-cost");
var adultSeatCost = document.querySelector(".adult-seat-cost");
var childSeatCost = document.querySelector(".child-seat-cost");
var adultCosthidden = document.querySelector("#adult-cost");
var childCosthidden = document.querySelector("#child-cost");
const adultPerHeadCost = adultSeatCost.innerHTML;
const childPerHeadCost = childSeatCost.innerHTML;
function updatePrice(totalAdultSeats, totalChildSeats) {
  totalAdultSeats = document.querySelector("#adult-seats").value;
  totalChildSeats = document.querySelector("#child-seats").value;
  totalCost.innerHTML =
    " " +
    (parseInt(adultPerHeadCost * totalAdultSeats) +
      parseInt(childPerHeadCost * totalChildSeats));
  adultCosthidden.value = parseInt(adultPerHeadCost * totalAdultSeats);
  childCosthidden.value = parseInt(childPerHeadCost * totalChildSeats);
  console.log(adultCosthidden.value);
  console.log(childCosthidden.value);
}


var resetBtn = document.querySelector('.reset-btn')
// var guideYes = document.querySelector("#guide-yes");
// var guideNo = document.querySelector("#guide-no");
// var costContainer = document.querySelector(".total-cost-container");
//var days = document.querySelector("#days");
//const packageDays = document.querySelector("#days").value;
// var fPrice = document.querySelector("#final-price");
// var newDays;
// var daysDifference = 0;
// var finalCost =
//   parseInt(adultPerHeadCost * totalAdultSeats) +
//   parseInt(childPerHeadCost * totalChildSeats);
// const originalPrice = finalCost;
// const pricePerDay = parseInt(originalPrice / packageDays);
// var tempPrice = finalCost;
// const guidePrice = (finalCost * 20) / 100

// function displayPrice() {
//   totalAdultSeats = document.querySelector("#adult-seats").value;
//   totalChildSeats = document.querySelector("#child-seats").value;
//   if (guideNo.checked) {
//     tempPrice -= guidePrice;
//   } else if (guideYes.checked) {
//     temp = (originalPrice * 20) / 100;
//     tempPrice += guidePrice;
//   }
//   const tempCost = tempPrice;
//   const tempDays = document.querySelector("#days").value;
//   daysDifference = tempDays - packageDays;
//   tempPrice += daysDifference * pricePerDay;
//   finalCost = tempPrice;
//   totalCost.innerHTML = " " + parseInt(finalCost);
//   fPrice.value = finalCost;
//}

resetBtn.addEventListener('click', function resetPrice(){
        totalCost.innerHTML = " " + originalPrice;
})
