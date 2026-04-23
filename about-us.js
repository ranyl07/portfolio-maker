document.addEventListener("DOMContentLoaded", function () {

  
  const box = document.querySelector(".about-container");
  box.style.opacity = "0";
  box.style.transform = "translateY(30px)";

  setTimeout(() => {
    box.style.transition = "0.8s ease";
    box.style.opacity = "1";
    box.style.transform = "translateY(0)";
  }, 200);

  
  box.addEventListener("mouseenter", () => {
    box.style.transform = "translateY(-8px)";
  });

  box.addEventListener("mouseleave", () => {
    box.style.transform = "translateY(0)";
  });

});
