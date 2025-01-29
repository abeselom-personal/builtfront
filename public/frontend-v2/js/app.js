const faqs = document.querySelectorAll(".faq");

faqs.forEach((faq) => {
  const faqContent = faq.querySelector(".faq_content");
  const faqContentHeight = faqContent.scrollHeight + "px";
  faqContent.style.maxHeight = "0";

  faq.addEventListener("click", () => {
    faq.classList.toggle("active");
    if (faq.classList.contains("active")) {
      faqContent.style.maxHeight = faqContentHeight; // Expand smoothly
    } else {
      faqContent.style.maxHeight = "0"; // Collapse smoothly
    }
  });
});

// ---------- dropdown menu
function toggleDropdown() {
  var dropdown = document.getElementById("productDropdown");
  var arrowIcon = document.getElementById("arrowIcon");

  dropdown.classList.toggle("hidden");
  arrowIcon.classList.toggle("rotate-180");
}

function toggleDropdown2() {
  var dropdown = document.getElementById("productDropdown2");
  var arrowIcon = document.getElementById("arrowIcon2");

  dropdown.classList.toggle("hidden");
  arrowIcon.classList.toggle("rotate-180");
}

// ------------ mobile nav -----------------------
function toggleNav() {
  var nav = document.querySelector(".mobile_nav");
  var body = document.querySelector("body");
  nav.classList.toggle("nav_active");

  // If nav is active, disable scrolling on the body
  if (nav.classList.contains("nav_active")) {
    body.style.overflow = "hidden";
  } else {
    body.style.overflow = "auto";
  }
}

// pricing page tab
function toggleButtonClasses() {
  var buttons = document.querySelectorAll(".toggle_btn");

  // Loop through each button
  buttons.forEach(function (button) {
    button.classList.toggle("main_btn");
    button.classList.toggle("secondary_btn");
  });
}

// arrow up btn
const arrowUp = document.querySelector(".arrow_up");

window.addEventListener("scroll", () => {
  const scrollY = window.scrollY;

  if (scrollY > 100) {
    arrowUp.classList.add("show");
  } else {
    arrowUp.classList.remove("show");
  }
});

function scrollToTop() {
  window.scrollTo({
    top: 0,
    behavior: "smooth",
  });
}
