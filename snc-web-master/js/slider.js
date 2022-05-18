// *****FOR IMAGE SLIDER******

let slideIndex = 0;
let maxSlideIndex = 0;
let second = 0;
function showSlides() {
    let i;
    let slides = document.getElementsByClassName("slider-image");
    let pointer = document.getElementsByClassName("dot");
    if (slideIndex > slides.length-1) slideIndex = 0;
    if (slides[slideIndex]) {
        if(maxSlideIndex>0) maxSlideIndex = 0;
        for (i = 0; i < slides.length; i++) {
            slides[i].style.display = "none";  
            maxSlideIndex++;
            pointer[i].children[0].classList.remove('active');
        }
        slides[slideIndex].style.display = "block";
        pointer[slideIndex].children[0].classList.add('active');
        slideIndex++;
        second=0;
    }
}
showSlides();
    setInterval(() => {
        if(second>=2) showSlides();
    }, 4500);
function left(){
    console.log('left');
    if((slideIndex-1)==0) slideIndex = maxSlideIndex-1;
    else slideIndex = slideIndex-2;
    showSlides();
}
function right() {
    showSlides();
}
setInterval(() => {
    second++;
    if(second==3) second == 0;
}, 1000);

function move(index){
    slideIndex = index;
    showSlides();
}