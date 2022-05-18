function eventCheck(){
	let present = new Date();
	
	let presentDate = present.getDate();
	let presentHr = present.getHours();
	let dayCheck = presentHr;
	// console.log(presentHr);
	presentHr = present.getHours() % 12 || 12;
	//console.log(presentHr)
	let presentMn = present.getMinutes();
	let formatCurrent = present.toLocaleTimeString().match(/[A-Z]+/ig);// FOR AM or PM Check
	formatCurrent = formatCurrent[0];
	let eventCard= document.getElementsByClassName('event-card');
	let mainContainer= document.getElementsByClassName('event-descp');
	let i=0;
	let j=0;
	let eventFound=0;
	let allDate = document.getElementsByClassName('tab-card');
	
	for(i=0;i<eventCard.length;i++){
		let eventTime = eventCard[i].children[1].children[0].innerHTML;
		//console.log(eventTime);
		//console.log(eventCard[i]);
		if( eventTime !== "All 9 days" && eventTime !== 'Full day'){
			let eventFormat = eventTime.match(/[A-Z]+/ig);
			let eventCFormat = eventFormat[1];
			let eventSFormat = eventFormat[0];
			let eventSHr = eventTime.match(/\d+/ig);
			// console.log(eventSHr);
			let eventSMn = eventSHr[2];
			let eventCMn = eventSHr[3];
			let eventCHr = eventSHr[2];
			eventSHr = eventSHr[0];
			content ="";
			let startTime = (eventSHr*3600000) + (eventSMn*60000)
			let endTime = (eventCHr*3600000) + (eventCMn*60000)
			let currentTime = (presentHr*3600000) + (presentMn*60000)
			//let ReplacePlace = eventCard[i].children[1].children[2].children[0].innerText.slice(11);
			let ReplaceEvent = eventCard[i].children[0].children[1].innerText;
			let ReplaceImg = eventCard[i].children[0].children[0].attributes[1].nodeValue;
			let descId = eventCard[i].attributes[2].nodeValue;
			descId = descId.match(/\w+-\w+/ig);
			descId = descId[0];
			let VLink = "";
			let VHide = "";
			let WLink = "";
			let WHide = "";
			let PLink = "";
			let PHide = "";
			
			let handler = eventCard[i].children[1].children[1].getElementsByClassName('lg_card_feature')
			let VoteLink = handler['voting'];
			let WatchLink = handler['live_watch'];
			let platform = handler['platform'];
			//console.log(handler['voting']);
			//console.log(WatchLink.innerText.trim());
			if(VoteLink.innerText==""){
				VLink = "";
				VHide = "display:none"
			}
			else{
				VLink = VoteLink.innerText;
			}
			if(WatchLink.innerText.trim()==""){
				WLink = "";
				WHide = "display:none"
			}
			else{
				WLink = WatchLink.innerText.trim();
			}
			if(platform.innerText.trim()==""){
				PLink = "";
				PHide = "display:none"
			}
			else{
				PLink = platform.innerText;
			}
			if(eventSFormat=="PM" && startTime !== 43860000 ){
				startTime = startTime+(12*3600000);
			}
			if(startTime == 43860000 && eventSFormat=="AM"){
				startTime= 0;
			}
			if(eventCFormat=="PM"){
				endTime = endTime+(12*3600000);
			}
			if(dayCheck>=12 ){
				currentTime = currentTime+(12*3600000);
				// console.log(dayCheck<13)
				if(dayCheck<13){
					currentTime=currentTime-(12*3600000);
				}
			}
			// console.log({eventSFormat,startTime,eventCFormat,endTime,currentTime});
			let activeCheck = eventCard[i].parentElement.parentElement.parentElement.classList;
			// console.log(activeCheck)
			if(activeCheck.contains('active')){
				//if(formatCurrent == eventSFormat){
					if(currentTime>=startTime && currentTime<=endTime) {
						//let largeDesc = "";
						let largeDesc = document.getElementById(descId);
						// console.log(largeDesc)
						largeDesc = largeDesc.children[0].children[0].children[3].innerText;
						
						// console.log('STARTED');
						eventFound=1;
						content = `<div class="large-card" style="background:linear-gradient(rgba(0, 0, 0, 0.6),rgba(0, 0, 0, 0.6)),url(${ReplaceImg})">
								<div class='flex-layout'>
									<div class="large-card-left">
										<div class="btn btn-danger round-0 title bold-text live-text" style='color: #FFF; font-size: 18px;'>Live</div>
										<div class='time-location text-center'>
											<div class="btn btn-semi round-100 title">${eventTime}</div>
											<h3 class="title white-text">${PLink}</h3>
										</div>
									</div>
									<div class="large-card-right">
										<div class="heading white-text extra-large-text">${ReplaceEvent}</div>
										<p class="large-card-desc" style="line-height:1.7;font-size:17px;">${largeDesc}</p>
									</div>
								</div>
								<div class='card-actions'>
									<a href="${WLink}" style="${WHide}" class="btn btn-semi sub-heading white-text">Watch</a>
									<a href="${VLink}" style="${VHide}" class="btn btn-semi sub-heading white-text" target="_blank">Vote</a>
								</div>
								<div style='clear: both'></div>
							</div>`;
							// console.log(eventCard[i].parentElement.parentElement.previousElementSibling.previousElementSibling);
							//mainContainer[i].children[0].style.display ="block";
							if(found==1){
								eventCard[i].parentElement.parentElement.previousElementSibling.previousElementSibling.style.display="block";
							}									
							
							eventCard[i].parentElement.parentElement.previousElementSibling.previousElementSibling.innerHTML = content;
							console.log(eventCard[i])
							break;
						
					}
				
				//}
			}
		}
	}
}

setTimeout(() => eventCheck(), 1000);