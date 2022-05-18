<?php
    require('./include/geodata.php');
    require_once('./include/DB_Conn.php');
    require_once('./include/general.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include('./seo.php');
        $title = 'Raastostav Festival - Social and Cultural Committee of PDPU';
        $desc = 'Raasotsav is the festival organized by the Social and Cultural Committee of PDPU who is responsible for the social and cultural events organized by Pandit Deendayal Petroleum University.';
        $url = 'https://sncpdpu.com/raasotsav';
        echo get_seo($title, $desc, $url);
    ?>
        <title>Raasotsav Festival - Social and Cultural Committee of PDPU</title>

        <script type="application/ld+json">
        {
                "@context" : "http://schema.org",
                "@type" : "event",
                "name" : "Raasotsav",
                "startDate" : "2020-10-17",
                "endDate" : "2020-10-25",
                "eventStatus" : "EventScheduled",
                "url" : "https://www.sncpdpu.com/raasotsav",
                "eventAttendanceMode": "OnlineEventAttendanceMode",
                "performer" : "students",
      			"offers" : {
                  "availability" : "InStock",
                  "url" : "https://sncpdpu.com/raasotsav",
                  "priceCurrency" : "INR",
                  "price" : "0.00",
                  "validFrom" : "2020-10-10"
                },
                "organizer": {
                	"@type" : "Organization",
                    "name" : "Social and Cultural Committee of PDPU",
                  	"url" : "https://sncpdpu.com"
                },
                "location" : {
                    "@type" : "Place",
                    "name" : "Pandit Deendayal Petroleum University",
                    "address" : "PDPU, Knowledge corridor, Raisan, Gandhinagar, Gujarat - 382007"
                },
                "image" : [
                    "https://sncpdpu.com/assets/images/rangtaal_images/5.jpg",
                    "https://sncpdpu.com/assets/images/rangtaal_images/8.jpg",
                    "https://sncpdpu.com/assets/images/other-image-3.jpg"
                ],
                "description" : "Birthed out of all of our efforts to make this year at least a smidge better. Bringing to you 9 vibrant events for the 9 days of our beloved Navratri! Get your Daandiyas out!",
                "sameAs" : [
					"https://www.facebook.com/pdpu.sal",
					"https://www.instagram.com/social_n_cultural_committee"
				]
            }
        </script>

        <!-- Components CSS -->
        <link href='./css/image-card.css' rel='stylesheet' />
        <link href='./css/large-card.css' rel='stylesheet' />
        <link href='./css/raasotsav.css' rel='stylesheet' />
        <link href='./css/slider.css' rel='stylesheet' />
        <link href='./css/card-slider.css' rel='stylesheet' />
        <link href='./css/tab.css' rel='stylesheet' />
        <link href='./css/tiny-slider.css' rel='stylesheet' />
        <link href='./css/event-card.css' rel='stylesheet' />
        <link href="./css/person-card.css" rel="stylesheet">
		<link href="./css/modal.css" rel="stylesheet"/>
		<link href="./css/input.css" rel="stylesheet"/>
		<link href="./css/lightbox.min.css" rel="stylesheet"/>
		<link href="./css/vote-card.css" rel="stylesheet"/>
  
        <?php
            include('./header.php');
        ?>

        <div class="head-img-container">
            <img class="background-img" src="assets/images/raasotsav.jpg" alt="Background Image">
            
            <div class="heading extra-large-text white-text head-img-title bold-text">Raasotsav '20</div>
            <p class="para-text white-text head-img-desc">Birthed out of all of our efforts to make this year at least a smidge better. Bringing to you 9 vibrant events for the 9 days of our beloved Navratri! Get your Daandiyas out!</p>
        </div>

        <br/><br/><br/><br/>

        <?php
            date_default_timezone_set('Asia/Kolkata');
            $time=time();

            $curr_date=(date("Y-m-d"));
            $curr_time=(date("H:i:s",$time));
            $curr_datetime=$curr_date." ".$curr_time;

            $mydb = new DbConn();
            $voting_stat = $mydb->selectQry("SELECT `event_id`, `event_name`, `event_img_path`,`voting_start`,`voting_end` from event_details WHERE voting = '1'");
            $event_info = $mydb->selectcount($voting_stat);
            
            if($event_info > 0) {
                while($row = mysqli_fetch_assoc($voting_stat)) {

                    $vs = $row['voting_start'];
                    $ve = $row['voting_end'];
                    $event_name = $row['event_name'];
                    $end_time = $row['end_time'];
                    $end_date = $row['end_date'];
                    $img_path = $row['event_img_path'];
                    $event_id = $row['event_id'];
                    $event_name = $row['event_name'];
                    $event_img = $row['event_img_path'];

                    if($curr_datetime > $vs && $curr_datetime < $ve) {

                        echo "<div class='vote-cards'>
                            <div class='vote-card'>
                                <div class='vote-card-content'>
                                    <h2 class='vote-event-name sub-heading'>$event_name</h2>
                                    <h2 class='deadline para-small-text'>Deadline: <span>". substr($ve, 8, 2) . "' '" . convertDate(substr( $ve,0,10)) . ", " . convertTime(substr( $ve,11,8)) . "</span></h2>
                                    <br>
                                    <a href='/vote?en=" . makeSafe($event_id, 'encrypt') . "' class='btn btn-normal btn-small para-small-text white-text'>Vote now</a>
                                </div>
                                <div class='vote-event-image'>
                                    <img src='./assets/images/events/$event_img' alt='Event Image'>
                                </div>
                            </div>
                        </div>";
                    }
                }
                echo '<br/><br/>';
            }
        ?>

        <div class="heading schedule-details bold-text text-uppercase text-center">schedule details</div>

        <div class="event-tab clearfix">
            <div class="event-container">
                <div class="card-columns my-slider">
                    <div class="card bg-light tab-card item" onclick="dateChange('0')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">17 OCT</div>
                            <div class="tsub-heading">First Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('1')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">18 OCT</div>
                            <div class="tsub-heading">Second Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('2')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">19 OCT</div>
                            <div class="tsub-heading">Third Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('3')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">20 OCT</div>
                            <div class="tsub-heading">Fourth Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('4')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">21 OCT</div>
                            <div class="tsub-heading">Fifth Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('5')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">22 OCT</div>
                            <div class="tsub-heading">Sixth Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('6')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">23 OCT</div>
                            <div class="tsub-heading">Seventh Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('7')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">24 OCT</div>
                            <div class="tsub-heading">Eighth Day</div>
                        </div>
                    </div>
                    <div class="card bg-light tab-card item" onclick="dateChange('8')">
                        <span class="material-icons">arrow_drop_down</span>
                        <div class="card-body text-center">
                            <div class="title extra-large-text">25 OCT</div>
                            <div class="tsub-heading">Nineth Day</div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="event-tab-container white-text" id="event-tab-container">
            </div>
        </div>

        <!-- Image Cards -->
        <div class="heading photo-gallery bold-text text-uppercase text-center">photo gallery</div>
        <br/>
        <section class="image-cards" style='text-align: center;'>
            <div class="image-card">
                <a href="./assets/images/rangtaal_images/1.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/1.jpg" alt="Rangtaal Image" />
                </a>
            </div>
            <div class="image-card">
                <a href="./assets/images/other-image-3.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/other-image-3.jpg" alt="Rangtaal Image" />
                </a>
            </div>

            <div class="image-card">
                <a href="./assets/images/rangtaal_images/slider-image-6.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/slider-image-6.jpg" alt="Rangtaal Image" />
                </a>
            </div>
            <div class="image-card">
                <a href="./assets/images/rangtaal_images/4.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/4.jpg" alt="Rangtaal Image" />
                </a>
            </div>

            <div class="image-card">
                <a href="./assets/images/rangtaal_images/5.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/5.jpg" alt="Rangtaal Image" />
                </a>
            </div>
            <div class="image-card">
                <a href="./assets/images/rangtaal_images/6.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/6.jpg" alt="Rangtaal Image" />
                </a>
            </div>

            <div class="image-card">
                <a href="./assets/images/rangtaal_images/7.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/7.jpg" alt="Rangtaal Image" />
                </a>
            </div>
            <div class="image-card">
                <a href="./assets/images/rangtaal_images/8.jpg" data-lightbox="Rangtaal" data-title="Rangtaal photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/8.jpg" alt="Rangtaal Image" />
                </a>
            </div>
        </section>
        
        <br><br>

        <!--<div class="popup-container">-->
        <!--    <div class="event-image">-->
        <!--        <img src="./assets/images/events/triviaNight.jpg" alt="Trivia Night">-->
        <!--    </div>-->
        <!--    <div class="popup-info-div">-->
        <!--        <div>-->
        <!--            <button type="button" class="close" onclick='$(".popup-container").hide()'>-->
        <!--                <span aria-hidden="true">&times;</span>-->
        <!--            </button>-->
        <!--        </div>-->
        <!--        <div class="para-text bold-text">-->
        <!--            Trivia Night Navratri Edition-->
        <!--        </div>-->
        <!--        <div style='margin-top: 10px;' class="para-small-text bold-text">-->
        <!--            Timing:<br/>6:00 PM - 7:30 PM-->
        <!--        </div>-->
        <!--        <div style='margin-top: 20px;'>-->
        <!--            <a href='https://forms.gle/UMWecN2xq8BsygC66' traget='_blank' class='btn btn-normal btn-small para-small-text white-text' style='max-width: max-content;'>Register now</a>-->
        <!--        </div>-->
        <!--    </div>-->
        <!--</div>-->

        <div class="modal-box"></div>

        <div id='footer-div'></div>
        
        <script src='./js/jquery.js'></script>
        <script>
			function readTextFile(file, callback) {
			var rawFile = new XMLHttpRequest();
			rawFile.overrideMimeType("application/json");
			rawFile.open("GET", file, true);
			rawFile.onreadystatechange = function() {
				if (rawFile.readyState === 4 && rawFile.status == "200") {
					callback(rawFile.responseText);
				}
			}
			rawFile.send(null);
		}

		//usage:
		readTextFile("./js/event_info.json", (text) => {
            var data = JSON.parse(text);
			let content = "";
            let model = "";
			let i=0;
			let j=0;
            let k=0;
			//console.log(data);
			for(i=0;i<data.days.length;i++) {
				content=`<div class="event-descp">
							<div class="large-card">
								<div class='flex-layout'>
									<div class="large-card-left">
										<div class="btn btn-danger round-0 title bold-text live-text" style='color: #FFF'>Live</div>
										<div class='time-location text-center'>
											<div class="btn btn-semi round-100 title">9:30 AM - 10:30 AM</div>
											<h3 class="title white-text">At convocation hall, PDPU</h3>
										</div>
									</div>
									<div class="large-card-right">
										<div class="heading white-text extra-large-text">rang de basanti</div>
										<p class="large-card-desc">Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptates, illo,
											molestias aut, quos vero sapiente blanditiis deleniti eos maxime amet itaque nihil eaque harum!
											Voluptatum ex porro vel at dolorem!</p>
									</div>
								</div>
								<div class='card-actions'>
									<a href="#" class="btn btn-semi sub-heading white-text">Watch</a>
									<a href="#" class="btn btn-semi sub-heading white-text">Vote</a>
								</div>
								<div style='clear: both'></div>
							</div>
							
							<div class="heading upcoming-events bold-text text-uppercase text-center">events</div>
							<!-- Event card slider -->
							<div class="card-slider">
								<div class="card-deck">
									<!--BUTTON-->
										
									`;
				for(j=0; j<data.days[i].events.length; j++){
					let display="";
					if(data.days[i].events[j].register_link==""){
						display = "display:none";
					}
                    let eventTime = data.days[i].events[j].event_time;
                    if (data.days[i].events[j].event_time === '12:00 AM - 11:59 PM') eventTime = 'Full day';
					content+=`			
                            <div class="event-card s-card item" data-toggle="modal" data-target="#${data.days[i].events[j].event_id}">
                                <div class="image-container">
                                    <img class="card-img-top" src="${data.days[i].events[j].event_img_path}" alt="Card image" />
                                    <div class="event-name sub-heading bold-text">${data.days[i].events[j].event_name}</div>
                                </div>
                                <div class="card-body">
                                    <p class="event-time para-small-text text-right bold-text">${eventTime}</p>
                                    <div class="event-location clearfix bold-text">
                                        <div class="event-venue para-small-text float-left">
                                            <span>${data.days[i].events[j].club_name}</span>
                                        </div>
                                        <div class="event-register para-small-text float-left" style='clear: both; padding-left: 2%; ${display}'>
                                            <a class="register-link" href="${data.days[i].events[j].register_link}">Register Now!</a>
                                        </div>
										<div style="display:none" class="lg_card_feature" id="voting">${data.days[i].events[j].voting}</div>
										<div style="display:none" class="lg_card_feature" id="live_watch">
										${data.days[i].events[j].event_link}
										</div>
										<div style="display:none" class="lg_card_feature" id="platform">${data.days[i].events[j].platform}</div>
                                        <div class="event-share text-right" style='float: right'><a onclick='shareEvent(\'${data.days[i].events[j].event_link}\')'"><span
                                                    class="material-icons">share</span></a></div>
                                    </div>
                                </div>
                            </div>
                            `;
                    
                        if(data.days[i].events[j].event_completed == 'yes') {

                            if(data.days[i].events[j].competition == 'no') {
                                model = `<div class="modal fade" id="${data.days[i].events[j].event_id}" role="dialog">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-body">
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    <center>
                                                    <div class="heading">${data.days[i].events[j].event_name}</div><br><br>
                                                    <div class="para-small-text">${data.days[i].events[j].event_summary}</div><br><br>
                                                    <div class="para-text bold-text" style="padding-bottom: 30px; color: #e259a3">Have a look at a few glimpses from the event!</div>
                                                    </center>
                                                    <section class="image-cards event_images_${data.days[i].events[j].event_id}" style='text-align: center; justify-content: space-evenly;'>
                                                    </section>
                                            
                                                    <div class='clearfix'></div>
                                                </div>
                                            </div>
                                        </div>`;    
                            }
                            else {
                            model = `<div class="modal fade" id="${data.days[i].events[j].event_id}" role="dialog">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <center>
                                                <div class="heading">${data.days[i].events[j].event_name}</div><br><br>
                                                <div class="para-small-text">${data.days[i].events[j].event_summary}</div><br><br>
                                                <div class="para-text" style="padding-bottom: 30px; color: #e259a3">Congratulations to the Winners!</div>
                                                </center>
                                                    <div class="winner-card winner-1">
                                                        <a href="#">
                                                            <div class="winner-card-content">
                                                                <span class="medal-icon"><img src="./assets/images/medal1.png"></span>
                                                                <h2 class="winner-name sub-heading">${data.days[i].events[j].winner_1.name}</h2>
                                                                <img src="${data.days[i].events[j].winner_1.img_path}">
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="winner-card winner-2">
                                                        <a href="#">
                                                            <div class="winner-card-content">
                                                                <span class="medal-icon"><img src="./assets/images/medal2.png"></span>
                                                                <h2 class="winner-name sub-heading">${data.days[i].events[j].winner_2.name}</h2>
                                                                <img src="${data.days[i].events[j].winner_2.img_path}">
                                                            </div>
                                                        </a>
                                                    </div>

                                                    <div class="winner-card winner-3">
                                                        <a href="#">
                                                            <div class="winner-card-content">
                                                                <span class="medal-icon"><img src="./assets/images/medal3.png"></span>
                                                                <h2 class="winner-name sub-heading">${data.days[i].events[j].winner_3.name}</h2>
                                                                <img src="${data.days[i].events[j].winner_3.img_path}">
                                                            </div>
                                                        </a>
                                                    </div>
                                                                                                
                                                <div class='clearfix'></div>
                                            </div>
                                        </div>
                                    </div>`;
                            }
                        }

                        else {
                            model = `<div class="modal fade" id="${data.days[i].events[j].event_id}" role="dialog">
                                        <div class="modal-dialog">
                                            <div class="modal-body">
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                                <div class="modal-img">
                                                    <picture class="thumbnail">
                                                        <img class="modal-club-logo" src="${data.days[i].events[j].event_img_path}" alt="club logo">
                                                    </picture>
                                                </div>
                                                <div>
                                                    <div class="title modal-club-name text-center bold-text text-uppercase">${data.days[i].events[j].event_name}</div>
                                                </div>
                                                <div>
                                                    <p class="para-small-text modal-club-desc">${data.days[i].events[j].event_description}
                                                    </p>
                                                </div>
                                                <div>
                                                    <div class="para-text president-label text-center bold-text">Club: <span class="modal-president-name">${data.days[i].events[j].club_name}</span></div>
                                                </div>
                                                <div class='para-small-text modal-club-follow float-right'>
                                                    <span><a href="${data.days[i].events[j].register_link}" class='btn btn-normal bold-text white-text'>Register Now!</a></span>
                                                </div>
                                                <div class="para-small-text modal-club-members">Time: <span class="member-value">${data.days[i].events[j].event_time}</span> </div>
                                                <div class='clearfix'></div>
                                            </div>
                                        </div>
                                    </div>`;
                            }
                        
                $('.modal-box').append(model);
                for(k=0; k < data.days[i].events[j].event_screenshots.length; k++) {
                    card = `<div class='modal-screenshot-div' style="display: flex; align-self: center;">
                            <a href="${data.days[i].events[j].event_screenshots[k].img_link}" data-lightbox="${data.days[i].events[j].event_name}-images" data-title="${data.days[i].events[j].event_name} photos">
                                <img src="${data.days[i].events[j].event_screenshots[k].img_link}" alt="Rangtaal Image" style="max-width: 320px;" />
                            </a>
                        </div>`;
                    
                    $(`.event_images_${data.days[i].events[j].event_id}`).append(card);
                }
				}
                
				content+=`</div></div>
								</div>
							`;
				//console.log(content);
				$('.event-tab-container').append(content);
				
			}
		});
        </script>
		<script src='./js/bootstrap-min.js'></script>
        <script src='./js/tiny-slider.js'></script>
        <script src='./js/slider.js'></script>
        <script src='./js/tab.js'></script>
		<script src='./js/raasotsav.js'></script>
        <script src='./js/event-card.js'></script>
        <script src='./js/input.js'></script>
        <script src='./js/lightbox.min.js'></script>
		
        <?php
            include('./footer.php');
        ?>