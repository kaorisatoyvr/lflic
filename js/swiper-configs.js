// Testimonials Swiper
const swiperTestimonials = new Swiper(".swiper-testimonials", {
  loop: true,
  autoHeight: false,
  pagination: {
    el: ".swiper-pagination",
    clickable: true,
  },
  navigation: {
    nextEl: ".swiper-button-next",
    prevEl: ".swiper-button-prev",
  },
  slidesPerView: 1,
  spaceBetween: 10,
  // Responsive breakpoints
  breakpoints: {
    768: {
      slidesPerView: 2,
    },
  },
});
