var totalAdultSeats, totalChildSeats;
const totalCost = document.querySelector("#total-cost").value;
var guideYes = document.querySelector("#guide-yes");
var guideNo = document.querySelector("#guide-no");
var foodYes = document.querySelector("#food-yes");
var foodNo = document.querySelector("#food-no");
var adultSeatCost = totalCost * 0.6;
var childSeatCost = totalCost * 0.2;
var guideCost = totalCost * 0.1;
var foodCost = totalCost * 0.1;
var hotelCost = totalCost * 0.2;
var finalCost = totalCost;
var calcBtn = document.querySelector("#calculate-btn");
var bill = document.querySelector(".bill-container");
const initialStartDate = new Date(document.querySelector("#start-date").value);
const initialEndDate = new Date(document.querySelector("#end-date").value);
const diffTime = Math.abs(initialEndDate - initialStartDate);
const initialDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24) + 1);
calcBtn.addEventListener("click", calculateCost);
const costPerDay = totalCost / initialDays;
var minStartDate = new Date(
  initialStartDate.setDate(initialStartDate.getDate() - 3)
);
document
  .querySelector("#start-date")
  .setAttribute("min", minStartDate.toISOString().split("T")[0]);
var minEndDate = new Date(initialEndDate.setDate(initialEndDate.getDate() + 3));
document
  .querySelector("#end-date")
  .setAttribute("max", minEndDate.toISOString().split("T")[0]);
var additionalCost = 0;
var submitBtn = document.querySelector(".submit-btn");
submitBtn.addEventListener("click", insertPrice);

function calculateCost() {
  var tempGuide = 0,
    tempFood = 0;
  totalAdultSeats = document.querySelector("#adult-seats").value;
  totalChildSeats = document.querySelector("#child-seats").value;
  finalCost = totalAdultSeats * adultSeatCost + totalChildSeats * childSeatCost;
  if (guideYes.checked) {
    finalCost += guideCost;
    tempGuide = guideCost;
  }
  if (foodYes.checked) {
    finalCost += foodCost;
    tempFood = foodCost;
  }
  var newStartDate = new Date(document.querySelector("#start-date").value);
  var newEndDate = new Date(document.querySelector("#end-date").value);
  var diffTime = Math.abs(newEndDate - newStartDate);
  var newDays = Math.ceil(diffTime / (1000 * 60 * 60 * 24) + 1);
  if (newDays != initialDays) {
    additionalCost = (newDays - initialDays) * costPerDay;
    finalCost += additionalCost;
  }
  finalCost += hotelCost;
  document.querySelector(".total-cost").innerHTML = " " + finalCost;
  document.querySelector(".adult-seat-bill").innerHTML =
    "&#8377; " + totalAdultSeats * adultSeatCost;
  document.querySelector(".child-seat-bill").innerHTML =
    "&#8377; " + totalChildSeats * childSeatCost;
  document.querySelector(".guide-bill").innerHTML = "&#8377; " + tempGuide;
  document.querySelector(".food-bill").innerHTML = "&#8377; " + tempFood;
  document.querySelector(".hotel-bill").innerHTML = "&#8377; " + hotelCost;
  document.querySelector(".days-added").innerHTML = newDays - initialDays;
  document.querySelector(".additional-days").innerHTML =
    "&#8377; " + additionalCost;
  document.querySelector(".total-bill").innerHTML = "&#8377; " + finalCost;
  document.querySelector(".bill").classList.remove("hidden");
}

var printBtn = document.querySelector("#print-btn");
printBtn.addEventListener("click", printBill);

function printBill() {
  var printBill = document.querySelector(".bill-container");
  newWin = window.open("");
  newWin.document.write(printBill.outerHTML);
  newWin.print();
  newWin.close();
}

function insertPrice() {
  totalAdultSeats = document.querySelector("#adult-seats").value;
  totalChildSeats = document.querySelector("#child-seats").value;
  document.querySelector("#final-price").value = finalCost;
  document.querySelector("#adult-cost").value = totalAdultSeats * adultSeatCost;
  document.querySelector("#child-cost").value = totalChildSeats * childSeatCost;
  document.querySelector("#guide-cost").value = guideCost;
  document.querySelector("#food-cost").value = foodCost;
  document.querySelector("#acco-cost").value = hotelCost;
  document.querySelector("#days-cost").value = additionalCost;
}
