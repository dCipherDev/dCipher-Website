function leftArrowPressed() {
   document.querySelector('.prev').click();
   document.querySelector('.prev2').click();
}

function rightArrowPressed() {
   document.querySelector('.next').click();
   document.querySelector('.next2').click();
}

document.onkeydown = function(evt) {
    evt = evt || window.event;
    switch (evt.keyCode) {
        case 37:
            leftArrowPressed();
            break;
        case 39:
            rightArrowPressed();
            break;
    }
};