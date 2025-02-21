const loader = document.getElementById("preloader");
window.addEventListener("load", function () {
  if (loader) {
    document.body.classList.add("loaded");
  }
  setTimeout(() => {
    loader.style.display = "none";
    document.body.classList.remove("loaded");
  }, 3500);
});

function setLogoAnimation(
  delay,
  duration,
  strokeWidth,
  timingFunction,
  strokeColor,
  repeat
) {
  let paths = document.querySelectorAll(".set-logo");
  let mode = repeat ? "infinite" : "forwards";
  for (let i = 0; i < paths.length; i++) {
    const path = paths[i];
    const length = path.getTotalLength();
    path.style["stroke-dashoffset"] = `${length}px`;
    path.style["stroke-dasharray"] = `${length}px`;
    path.style["stroke-width"] = `${strokeWidth}px`;
    path.style["stroke"] = `${strokeColor}`;
    path.style["animation"] = `${duration}s set-logo ${mode} ${timingFunction}`;
    path.style["animation-delay"] = `${i * delay}s`;
  }
}
setLogoAnimation(0.1, 2, 1, "linear", "#ffffff", true);

function setLogoTextAnimation(
  delay,
  duration,
  strokeWidth,
  timingFunction,
  strokeColor,
  repeat
) {
  let paths = document.querySelectorAll(".set-logo-text");
  let mode = repeat ? "infinite" : "forwards";
  for (let i = 0; i < paths.length; i++) {
    const path = paths[i];
    const length = path.getTotalLength();
    path.style["stroke-dasharray"] = `${length}px`;
    path.style["stroke-width"] = `${strokeWidth}px`;
    path.style["fill"] = `${strokeColor}`;
    path.style[
      "animation"
    ] = `${duration}s set-logo-text ${mode} ${timingFunction}`;
    path.style["animation-delay"] = `${i * delay}s`;
  }
}
setLogoTextAnimation(0.1, 2, 1, "linear", "#fff", true);

function setTextAnimation(
  delay,
  duration,
  strokeWidth,
  timingFunction,
  strokeColor,
  repeat
) {
  let paths = document.querySelectorAll(".preloader-text");
  let mode = repeat ? "infinite" : "forwards";
  for (let i = 0; i < paths.length; i++) {
    const path = paths[i];
    const length = path.getTotalLength();
    path.style["stroke-dashoffset"] = `${length}px`;
    path.style["stroke-dasharray"] = `${length}px`;
    path.style["stroke-width"] = `${strokeWidth}px`;
    path.style["stroke"] = `${strokeColor}`;
    path.style[
      "animation"
    ] = `${duration}s preloader-text ${mode} ${timingFunction}`;
    path.style["animation-delay"] = `${i * delay}s`;
  }
}
setTextAnimation(0.1, 2, 1, "linear", "#979797", true);

// You can also pass an optional settings object
// below listed default settings
AOS.init({
  // Global settings:
  disable: false, // accepts following values: 'phone', 'tablet', 'mobile', boolean, expression or function
  startEvent: "DOMContentLoaded", // name of the event dispatched on the document, that AOS should initialize on
  initClassName: "aos-init", // class applied after initialization
  animatedClassName: "aos-animate", // class applied on animation
  useClassNames: false, // if true, will add content of `data-aos` as classes on scroll
  disableMutationObserver: false, // disables automatic mutations' detections (advanced)
  debounceDelay: 50, // the delay on debounce used while resizing window (advanced)
  throttleDelay: 99, // the delay on throttle used while scrolling the page (advanced)

  // Settings that can be overridden on per-element basis, by `data-aos-*` attributes:
  offset: 200, // offset (in px) from the original trigger point
  delay: 0, // values from 0 to 3000, with step 50ms
  duration: 800, // values from 0 to 3000, with step 50ms
  easing: "ease", // default easing for AOS animations
  once: false, // whether animation should happen only once - while scrolling down
  mirror: false, // whether elements should animate out while scrolling past them
  anchorPlacement: "top-bottom", // defines which position of the element regarding to window should trigger the animation
});

const navExpand = [].slice.call(document.querySelectorAll(".nav-expand"));
// console.log(navExpand)
const backLink = `<li class="nav-item">
	<a class="nav-link nav-back-link" href="javascript:;">
		Назад
	</a>
</li>`;

navExpand.forEach((item) => {
  item
    .querySelector(".nav-expand-content")
    .insertAdjacentHTML("afterbegin", backLink);
  item
    .querySelector(".nav-link")
    .addEventListener("click", () => item.classList.add("active"));
  item
    .querySelector(".nav-back-link")
    .addEventListener("click", () => item.classList.remove("active"));
});

document.addEventListener("DOMContentLoaded", function () {
  let items = document.querySelectorAll(
    "#nav-icon1,#nav-icon2,#nav-icon3,#nav-icon4"
  );
  items.forEach((el) => {
    el.addEventListener("click", () => {
      if (el.classList.toggle("open")) {
        document.querySelector(".burger-menu").style.visibility = "visible";
        document.querySelector(".burger-menu").style.display = "block";
        // document.querySelector(".burger-menu").style.opacity = "1";
        document.querySelector(".burger-menu").style.transition = "all 0.5s";
        document.querySelector("body").style.overflow = "hidden";
        document.querySelector(".header").classList.add("active");
        document.body.classList.add("nav-is-toggled");
      } else {
        document.querySelector(".burger-menu").style.visibility = "hidden";
        document.querySelector(".burger-menu").style.display = "block";
        // document.querySelector(".burger-menu").style.opacity = "0";
        document.querySelector(".burger-menu").style.transition = "all 0.5s";
        document.querySelector("body").style.overflow = "auto";
        document.querySelector(".header").classList.remove("active");
        document.body.classList.remove("nav-is-toggled");
      }
    });
  });
});

// function showMenu() {
//   console.log("eeeeeeeeeeeeeeee");
// }

function search() {
  document.querySelector(".modal-search__all").style.visibility = "visible";
  document.querySelector(".modal-search__all").style.opacity = "1";
  document.querySelector(".modal-close").style.visibility = "visible";
  document.querySelector(".modal-close").style.opacity = "1";
  document.querySelector(".modal-close").style.borderBottom =
    "2px solid #0085ff";
  document.querySelector(".modal-close").style.marginTop = "20px";
  document.querySelector(".modal-close").style.paddingTop = "15px";
  document.querySelector(".modal-close").style.paddingBottom = "23px";
  document.querySelector(".md-search").style.visibility = "hidden";
  document.querySelector(".md-search").style.opacity = "0";
}
function closes() {
  document.querySelector(".modal-search__all").style.visibility = "hidden";
  document.querySelector(".modal-search__all").style.opacity = "0";
  document.querySelector(".modal-close").style.visibility = "hidden";
  document.querySelector(".modal-close").style.opacity = "0";
  document.querySelector(".md-search").style.visibility = "visible";
  document.querySelector(".md-search").style.opacity = "1";
  document.querySelector(".md-search").style.marginTop = "20px";
  document.querySelector(".md-search").style.paddingTop = "15px";
}

// var myDropdown = document.getElementById("dropdownMenuLink");
// myDropdown.addEventListener("menu-dropdown", function () {
//   console.log("ssssssssssssssssssssss");
// });
