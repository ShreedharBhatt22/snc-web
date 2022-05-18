window.addEventListener("resize", reset);
function reset() {
    activeCards = 1;
    smActiveCards = 1;
}

let TotalCards = 0;
let activeCards = 1;
let smActiveCards = 1;

function rightCard() {
    let i=0;
    let card = document.getElementsByClassName("s-card");
	
    if(window.innerWidth <= 576){
        console.log(smActiveCards,activeCards)
        if(smActiveCards !== (((card.length)/10)+4)){
            for (i = 0; i < card.length; i++) {
                if(smActiveCards==1){
                    card[i].style.right = "0%";
                }
                if(window.innerWidth<=400){
                    card[i].style.right = (12.4 * smActiveCards)+"%";
                }
                else{
                    card[i].style.right = (12.1 * smActiveCards)+"%";
                }
                card[i].style.left = "auto";
            }
            smActiveCards++;

        }
    }
    else{
		card = (card/10);
        if(activeCards!==(TotalCards-2)){
            TotalCards =0;
            for (i = 0; i < card.length; i++) {
                if(activeCards == 1) card[i].style.right ="0%";
                
                if(window.innerWidth <= 905 && window.innerWidth > 709) card[i].style.right = (3.4 * activeCards)+"%";
                
                else if(window.innerWidth <= 709 && window.innerWidth > 576) card[i].style.right = (4.9 * activeCards)+"%";
                
                else card[i].style.right = (3.3 * activeCards)+"%";
                
                card[i].style.left = "auto";
                
                TotalCards++;
            }
            activeCards++;
        }
    }   
}
function leftCard(){
    let i=0;
    let card = document.getElementsByClassName("s-card");
	
    if(activeCards !== 1 || smActiveCards !== 1) {
        TotalCards =0;
        console.log(smActiveCards,activeCards);
        for (i = 0; i < card.length; i++) {
            let recent = card[i].style.right;
            recent =  recent.match(/\d+(\W\d+)?/ig);
            recent = recent[0];
            if(window.innerWidth <= 905 && window.innerWidth > 709) card[i].style.right = (recent - 3.4) + "%";
            else if(window.innerWidth <= 709 && window.innerWidth > 576) card[i].style.right = (recent - 4.9) + "%";
            else if(window.innerWidth <= 576 && window.innerWidth > 400) card[i].style.right = (recent - 10.1) + "%";
            else if(window.innerWidth <= 470) card[i].style.right = (recent - 10.4) + "%";
            else card[i].style.right = (recent - 3.3) + "%";
            card[i].style.left = "auto";
            TotalCards++;
        }
        
        if(window.innerWidth <= 576) smActiveCards--;
        else activeCards--;
    }
    else for (i = 0; i < card.length; i++) card[i].style.right ="0%";
}

function shareEvent(e, url, eventName) {

    e.stopPropagation();

    let shareData = {
        title: eventName,
        text: `Hey guys, I am very excited for ${eventName}. Join with me now!`,
        url: url,
    }
    if (navigator.share) {
        navigator.share(shareData);
    }
    else {
        let copyText = `Hey guys, I am very excited for ${eventName}. Register now: ${url}`;
        navigator.clipboard.writeText(copyText).then(() => {
            swal('Sharing link is copied!', 'Thank you for sharing with your family and friends.', 'success');
        });
    }
    // var copyText = `Hey guys, I am very excited for ${eventName}. Register now: ${url}`;
    // const el = document.createElement('textarea');
    // el.value = copyText;
    // document.body.appendChild(el);
    // el.select();
    // document.execCommand('copy');
    // document.body.removeChild(el);
    // alert('Copied to clipboard.');
}

function eventCard(){
	const tnsCarousel = document.querySelectorAll('.card-deck');
tnsCarousel.forEach(tnsslider => {
		var slider = tns({
		container: tnsslider,
		 "items": 3,
		 "controls": true,
		 "controlsText" : ['<span class="material-icons">arrow_back_ios</span>','<span class="material-icons">arrow_forward_ios</span>'],
		  "autoplay": false,
		  "slideBy": "1",
		  "mouseDrag": true,
		  "loop": false,
		   "responsive": {
			"350": {
			  "items": 1
			},
			"500": {
			  "items": 2
			},
			"1100": {
			 "items" : 3
			}
		  },
		  "nav":false,
		  "swipeAngle": false,
		  "speed": 400,
		});
		});
}
setTimeout(() => eventCard(), 2000);