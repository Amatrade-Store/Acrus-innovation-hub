const controlButtons = document.querySelectorAll(".controlButton");
const screenButtons = document.querySelectorAll(".screenButton");

controlButtons.forEach((controlButton) => {
  controlButton.addEventListener("click", (e) => {
    controlButtons.forEach((controlButton) => {
      controlButton.previousElementSibling.classList.remove("up");
      controlButton.nextElementSibling.classList.remove("down");
    });
    if (controlButton.classList.contains("active")) {
        
        controlButtons.forEach((controlButton) => {
         
        controlButton.previousElementSibling.classList.remove("up");
        controlButton.nextElementSibling.classList.remove("down");
      });
    } else {
        controlButtons.forEach((controlButton) => {
            
            controlButton.previousElementSibling.classList.remove("up");
            controlButton.nextElementSibling.classList.remove("down");
        });
        
        controlButton.previousElementSibling.classList.add('up');
        controlButton.nextElementSibling.classList.add('down');
        
        // Hide all screens
    }
    controlButton.classList.toggle("active");
  });
});
