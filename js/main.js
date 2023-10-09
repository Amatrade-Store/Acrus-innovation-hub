document.addEventListener("DOMContentLoaded", function () {
    const contentContainers = document.querySelectorAll(".content-container");
  
    contentContainers.forEach((container) => {
    
      const readMoreButton = container.querySelector(".read-more-button");
  
      readMoreButton.addEventListener("click", function () {
        if (container.classList.contains("expanded")) {
          container.classList.remove("expanded");
       
          readMoreButton.classList.remove('flipped')
        } else {
          container.classList.add("expanded");

          readMoreButton.classList.add('flipped')
        }
      });
    });

  });
  