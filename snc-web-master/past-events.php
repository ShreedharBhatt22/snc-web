<?php
    require('./include/geodata.php');
?>

<!DOCTYPE html>
<html>
    <head>
		<?php
			include('./seo.php');
			$title = 'Past events - Social and Cultural Committee of PDPU';
			$desc = 'Past events of Social and Cultural Committee of PDPU are Rangtaal, Flare and many more which are organized in the 2019 on the campus of Pandit Deendayal Petroleum University.';
			$url = 'https://sncpdpu.com/past-events';
			echo get_seo($title, $desc, $url);
		?>
        <title>Past Events - Social and Cultural Committee of PDPU</title>

		<script type="application/ld+json">
			{
				"@context" : "http://schema.org",
				"@type" : "Article",
				"name" : "Past Events",
				"headline": "Past events of S&C",
				"url" : "https://sncpdpu.com/past-events",
				"image" : [
					"https://sncpdpu.com/assets/images/flare-image-3.jpg",
					"https://sncpdpu.com/assets/images/rangtaal_images/4.jpg",
					"https://sncpdpu.com/assets/images/other-image-5.jpg"
					
				],
				"articleSection" : "Flare",
				"articleBody" : "Flare is one of the largest college festivals organized by\n\t\t\t\t\tthe Social and Cultural Committee. It’s a fun filled\n\t\t\t\t\tjourney where the campus is buzzing with students from\n\t\t\t\t\tdifferent universities. Not just Dance, Music and Art\n\t\t\t\t\tcompetitions, but students from all over eagerly await this\n\t\t\t\t\tevent for its Fashion shows, all day long activities with\n\t\t\t\t\tclubs, concerts, food and fun. Ablaze, Amethyst,are few\n\t\t\t\t\tof the many flagship dance, fashion and literature events\n\t\t\t\t\tin Flare. Flare is by far one of the glamorous and biggest\n\t\t\t\t\tflagship hits of the Social and Cultural Committee.",
				"sameAs" : [
					"https://www.facebook.com/pdpu.sal",
					"https://www.instagram.com/social_n_cultural_committee"
				]
			}
    </script>

		<link href='./css/event-card.css' rel='stylesheet' />
		<link href='./css/image-card.css' rel='stylesheet' />
		<link href="./css/lightbox.min.css" rel="stylesheet"/>
        
        <?php
            include('./header.php');
        ?>
        <div class="heading text-center bold-text text-uppercase" style='margin-top: 160px;'>Past Events</div>
		<br/><br/><br/><br/>
		
		<div class="container-fluid p-5">
			<div class="row">
				<div class="p-4 col-md-3" style='text-align: center; padding: 15px'>
					<img src="./assets/images/flare-logo.png" alt="Flare Logo" class="mx-auto d-block my-auto" style="max-width: 240px; margin-top: 22%">
				</div>
				<div class="p-4 col-md-9 para-text align-self-center" style='padding-top: 2%'>
				<div class="heading bold-text text-uppercase" style='margin: 20px 0;'>Flare</div>
					<div>Flare is one of the largest college festivals organized by
					the Social and Cultural Committee. It’s a fun filled
					journey where the campus is buzzing with students from
					different universities. Not just Dance, Music and Art
					competitions, but students from all over eagerly await this
					event for its Fashion shows, all day long activities with
					clubs, concerts, food and fun. Ablaze, Amethyst,are few
					of the many flagship dance, fashion and literature events
					in Flare. Flare is by far one of the glamorous and biggest
					flagship hits of the Social and Cultural Committee.</div>
				</div>
			</div>
    	</div>
		<br><br><br><br>

		<section class="image-cards" style='text-align: center;'>

            <div class="image-card">
				<a href="./assets/images/flare-image-1.jpg" data-lightbox="Flare" data-title="Flare 2019 photos">
                    <img class="image-card-img" src="./assets/images/flare-image-1.jpg" alt="Flare Image" />
                </a>
            </div>
            <div class="image-card">
				<a href="./assets/images/flare-image-2.jpg" data-lightbox="Flare" data-title="Flare 2019 photos">
                    <img class="image-card-img" src="./assets/images/flare-image-2.jpg" alt="Flare Image" />
                </a>
            </div>

            <div class="image-card">
				<a href="./assets/images/flare-image-3.jpg" data-lightbox="Flare" data-title="Flare 2019 photos">
                    <img class="image-card-img" src="./assets/images/flare-image-3.jpg" alt="Flare Image" />
                </a>
            </div>
            
        </section>
        
		<br/><hr><br/><br/><br/>
		
		<div class="container-fluid p-5">
			<div class="row">
				<div class="p-4 col-md-3" style='text-align: center; padding: 15px'>
					<img src="./assets/images/rangtaal-logo.png" alt="Rantaal Image" class="mx-auto d-block my-auto" style="max-width: 240px; margin-top: 23%">
				</div>
				<div class="p-4 col-md-9 para-text align-self-center" style='padding-top: 2%'>
					<div class="heading bold-text text-uppercase" style='margin: 20px 0;'>Rangtaal</div>
					<div>Rangtaal is an event that harnesses all the euphoria and vivacity of Navraatri. It kicks off with a soulful Maha-Arti which pulls everyone into its sway. The event is always jam packed with the rhythm of the beautiful and talented dancers of PDPU, and they never skip a beat! Add to that the energetic performance of the remarkable guest singers, and the scrumptious food and you have a night of celebration to never forget!</div>
				</div>
				</div>
			</div>
    	</div>
		<br><br><br><br>

		<section class="image-cards" style='text-align: center;'>

            <div class="image-card">
				<a href="./assets/images/rangtaal_images/5.jpg" data-lightbox="Rangtaal" data-title="Ragntaal 2019 photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/5.jpg" alt="Rangtaal Image" />
                </a>
            </div>
            <div class="image-card">
				<a href="./assets/images/rangtaal_images/4.jpg" data-lightbox="Rangtaal" data-title="Ragntaal 2019 photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/4.jpg" alt="Rangtaal Image" />
                </a>
            </div>

            <div class="image-card">
				<a href="./assets/images/rangtaal_images/7.jpg" data-lightbox="Rangtaal" data-title="Ragntaal 2019 photos">
                    <img class="image-card-img" src="./assets/images/rangtaal_images/7.jpg" alt="Rangtaal Image" />
                </a>
            </div>
            
        </section>
        
		<br/><hr><br/><br/><br/>
		
		<div class="container-fluid p-5">
			<div class="row">
				<!-- <div class="p-4 col-md-3" style='text-align: center; padding: 15px'>
					<img src="./assets/images/SnC_logo_with_line.png" alt="SnC_logo" class="mx-auto d-block my-auto" style="max-width: 240px">
				</div> -->
				<div class="p-4 col-md-6 para-text align-self-center" style='text-align: center; width: 100%; padding: 0 60px'>"An event is best experienced in the heart of all the action.” A perfect example of this is the celebration of Uttarayan at PDPU. Uttarayan is a festival of togetherness, positivity, lip smacking delicacies and good music packed together with happiness. To enhance the excitement of the new semester, the social and cultural committee plans an evening filled with happy surprises, fun and joy every single year! Bringing vibrancy and lots of kai po chhe into the new year is always the motto. The same spirit gets carried on to the Republic day celebration, with the added intensity of patriotism in the air. The remarkable parade leaves all viewers spellbound and audience members standing upright. The Independence Day celebrations are no different. It adds liveliness and passion in the students as well as the faculties. All of us together witness the Tiranga being hoisted high at PDPU.</div>
			</div>
    	</div>
		<br><br><br><br>

		<section class="image-cards" style='text-align: center;'>

            <div class="image-card">
				<a href="./assets/images/other-image-1.jpg" data-lightbox="Events" data-title="Other events' photos">
                    <img class="image-card-img" src="./assets/images/other-image-1.jpg" alt="Other event images" />
                </a>
            </div>
            <div class="image-card">
                <a href="./assets/images/other-image-2.jpg" data-lightbox="Events" data-title="Other events' photos">
                    <img class="image-card-img" src="./assets/images/other-image-2.jpg" alt="Other event images" />
                </a>
            </div>

            <div class="image-card">
                <a href="./assets/images/other-image-3.jpg" data-lightbox="Events" data-title="Other events' photos">
                    <img class="image-card-img" src="./assets/images/other-image-3.jpg" alt="Other event images" />
                </a>
            </div>
            
        </section>
		<section class="image-cards" style='text-align: center;'>

            <div class="image-card">
                <a href="./assets/images/other-image-4.jpg" data-lightbox="Events" data-title="Other events' photos">
                    <img class="image-card-img" src="./assets/images/other-image-4.jpg" alt="Other event images" />
                </a>
            </div>
            <div class="image-card">
                <a href="./assets/images/other-image-5.jpg" data-lightbox="Events" data-title="Other events' photos">
                    <img class="image-card-img" src="./assets/images/other-image-5.jpg" alt="Other event images" />
                </a>
            </div>

            <div class="image-card">
                <a href="./assets/images/other-image-6.jpg" data-lightbox="Events" data-title="Other events' photos">
                    <img class="image-card-img" src="./assets/images/other-image-6.jpg" alt="Other event images" />
                </a>
            </div>
            
        </section>
        
		<br/><br/>

		    
        <center id="event-card-container" style='margin-bottom: 100px;'>
		</center>
		

        
        <script src='js/jquery.js'></script>
		<script src='js/event-card.js'></script>
		<script src='./js/lightbox.min.js'></script>
		<!-- <script>
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
			readTextFile("./js/past_events.json", function(text){
				var data = JSON.parse(text);
				let i=0;
				let content="";
				console.log(data);
				for(i=0;i<data.past_events.length;i++){
					content=`<div class="event-card">
								<div class="image-container">
									<img class="card-img-top" src="${data.past_events[i].image}" alt="Card image" />
									<div class="event-name sub-heading bold-text text-left">${data.past_events[i].title}</div>
								</div>
								<div class="card-body">
									<div class="para-small-text small text-muted float-left bold-text">${data.past_events[i].date}</div>
									<div class="para-small-text small text-muted float-right bold-text">${data.past_events[i].time}</div><br/><br/><br/>
                                    <p class="para-small-text clearfix text-left float-left">${data.past_events[i].description}</p>
                                    <div class="event-location clearfix bold-text">
                                        <div class="event-venue para-small-text float-left"><span
                                                class="material-icons align-text-bottom">location_on</span><span>${data.past_events[i].venue}</span>
                                            </div>
                                    </div>
								</div>
							</div>`;
							$('#event-card-container').append(content);
				}
			});
        </script>
         -->
        <?php
            include('./footer.php');
        ?>