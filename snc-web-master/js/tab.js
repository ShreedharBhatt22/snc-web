// //*******TABS**********
//     function intialDateTab() {
//         let today = new Date().getDate();
//         let found=0;
//         let allDate = document.getElementsByClassName('tab-card');
//         let allEvent = document.getElementsByClassName('event-descp');
//         for(i = 0; i < allDate.length; i++){
//             let date = allDate[i].children[1].children[0].innerText;
//             console.log(date);
//             date = date.match(/\d+/ig);
//             date = date[0];
//             if(today==date) {
//                 allDate[i].children[0].classList.add('active');
//                 allEvent[i].classList.add('active');
//                 found++;
//             }
//         }
//         if(found==0){
//             dateChange('0');
//         }
//     }
//     intialDateTab();
//     function dateChange(num){
//         let i=0;
//         //let activeDate = event.path[2].children[0];
//         //console.log(event.path);
//         let allDate = document.getElementsByClassName('tab-card');
//         let allEvent = document.getElementsByClassName('event-descp');
//         for(i = 0; i < allDate.length; i++){
  //             allDate[i].children[0].classList.remove('active');
  //             allEvent[i].classList.remove('active');
  //         }
  //        allDate[num].children[0].classList.add('active');
  //        allEvent[num].classList.add('active');
//     }

// NEW ONE
//*******TABS**********


// import { tns } from "ts/src/tiny-slider";
let found=0;
let startIndex=0;
function intialDateTab(){
    let today = new Date();
    today = today.getDate();
    let ref =0;
    let allDate = document.getElementsByClassName('tab-card');
    let allEvent = document.getElementsByClassName('event-descp');
	let mainContainer= document.getElementsByClassName('event-descp');
    for(i = 0; i < allDate.length; i++){
        let date = allDate[i].children[1].children[0].innerText;
        date = date.match(/\d+/ig);
        date =date[0];
		ref++;
		mainContainer[i].children[0].style.display ="none";
		//console.log(date,today)
        if(today==date){
            allDate[i].children[0].classList.add('active');
            allEvent[i].classList.add('active');
			//mainContainer[i].children[0].style.display ="block";
            found++;
			startIndex = ref;
        }
    }
    if(found==0){
        dateChange('0');
		startIndex=1;
    }
}
setTimeout(() => intialDateTab(), 1000);
// intialDateTab();
function dateChange(num){
    let i=0;
    //let activeDate = event.path[2].children[0];
    //console.log(event.path);
    let allDate = document.getElementsByClassName('tab-card');
    let allEvent = document.getElementsByClassName('event-descp');
    //console.log(allEvent);
    for(i = 0; i < allDate.length; i++){
        allDate[i].children[0].classList.remove('active');
        allEvent[i].classList.remove('active');
    }
   allDate[num].children[0].classList.add('active');
   allEvent[num].classList.add('active');
}

//*****************TABS SLIDER JS***************
function startBy(){
	startIndex--;
		startIndex = startIndex.toString();
		var slider = tns({
		container: '.my-slider',
		 "items": 4,
		 "controls": true,
		 "controlsText" : ['<span class="material-icons">arrow_back_ios</span>','<span class="material-icons">arrow_forward_ios</span>'],
		  "autoplay": false,
		  "slideBy": "1",
		  "startIndex": startIndex,
		  "mouseDrag": true,
		  "loop": false,
		   "responsive": {
			"350": {
			  "items": 1
			},
			"500": {
			  "items": 3
			},
			"1100": {
			 "items" : 4
			}
		  },
		  "nav":false,
		  "swipeAngle": false,
		  "speed": 400,
		});
}
setTimeout(() => startBy(), 1000);