const swiper = new Swiper(".swiper", {
  // Optional parameters
  direction: "horizontal",
  loop: true,
  // centerd: true,
  spaceBetween: 100,
  speed: 2000,
  slidesPerView: 1,
  // effect: "fade",
  // autoplay: {
  //   delay: 5000,
  // },

  // If we need pagination
  pagination: {
    el: ".swiper-pagination",
    // type: "pagination",
  },

  // Navigation arrows
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  breakpoints: {
    // 575: {
    //   slidesPerView: 1,
    //   spaceBetween: 16,
    // },
    // 0: {
    //   slidesPerView: 1,
    //   spaceBetween: 16,
    // },
  },

  // And if we need scrollbar
  // scrollbar: {
  //   el: ".swiper-scrollbar",
  // },
});

