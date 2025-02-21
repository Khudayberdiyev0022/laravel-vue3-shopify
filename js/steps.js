// let items = document.querySelectorAll(".forms-btn__top button");
// items.forEach((item) => {
//   item.addEventListener("click", () => {
//     document
//       .querySelector(".forms-btn__top button.active")
//       .classList.remove("active");
//     item.classList.add("active");
//   });
// });

let steps = document.querySelectorAll(".input-upper");

steps = window.addEventListener("keyup", (e) => {
  e.target.value = e.target.value.toUpperCase();
});
let res = /^[a-zA-Z]+$/.test("sfjd");
console.log(res);

document.getElementById("english").addEventListener("input", function () {
  this.value = this.value.replace(/[^\x00-\x7F]+/gi, "");
});
