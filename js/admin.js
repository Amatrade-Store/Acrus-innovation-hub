const screens = document.querySelectorAll('.screen');
const screenButtons = document.querySelectorAll('.screenButton');
const backButtons = document.querySelectorAll('.backButton');

screenButtons.forEach(screenButton => {

    screenButton.addEventListener('click', (e) => {
    
        screens.forEach(screen => {

            if (screen.id == screenButton.id) {
                screen.classList.add('active');
    
            } else {
                screen.classList.remove('active')
            }
        })
      
    });
})


backButtons.forEach(button => {
    button.addEventListener('click', () => {
    
        screens.forEach(screen => {
            screen.classList.remove('active')
            
        })
    })
})