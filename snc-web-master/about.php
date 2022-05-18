<?php
    require('./include/geodata.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            include('./seo.php');
            $title = 'About - Social and Cultural Committee of PDPU';
            $desc = 'About the Social and Cultural Committee of PDPU. The core team and their responsibility is listed here. They are responsible for organizing the social events in the Pandit Deendayal Petroleum University.';
            $url = 'https://sncpdpu.com/about';
            echo get_seo($title, $desc, $url);
        ?>
        <title>About - Social and Cultural Committee of PDPU</title>
        <link href='./css/about.css' rel='stylesheet' />
        <link href='./css/contact-us.css' rel='stylesheet' />
        <link href='./css/person-card.css' rel='stylesheet' />
        <?php
            include('./header.php');
        ?>

        <div class='about-wall-container'>
            <div class='about-content'>
                <div class='image-div'><img src='./assets/images/SnC_logo_with_line.jpg' /></div>
                <div class='about-desc'>
                    <div class='title-div heading bold-text white-text' style='white-space: normal'>Social and Cultural Committee</div>
                    <div class='title-div para-text white-text' style='margin-top: 20px'>Pandit Deendayal Petroleum University</div>
                </div>
            </div>
        </div>
        <div class='about-content-container'>
            <div>
                <div class='contact-us-div'>
                    <?php
                        include('./contact-us.php');
                    ?>
                </div>
            </div>
            <div class='desc-team-div'>
                <div class='para-text desc-div'>
                <p>The <strong> Social and Cultural Committee of PDPU</strong>, aims at bringing out the best of talents. It is the ultimate platform for students from all schools to channelize their skills in the right direction. <strong> The Social and Cultural Committee </strong>is the backbone of large scale college festivals such as the ever awaited <strong> Flare, Rangtaal, Kai Po Chhe, Independence Day, Republic Day, Live Concerts </strong>and more. </p>
                <p>And the foundation of this committee lies in the bond of its team members from all schools of PDPU. Be it planning or executing ideas, Event Management, Coordinating amongst clubs, Graphic Designing, creating content, looking for sponsorships, everything is done with ease, thanks to the combined efforts of each and every student of the committee.</p>
                <p>At <strong>Social and Cultural Committee</strong>, experience the fun behind bringing an idea to life. There is an array of amazing clubs under the Social and Cultural Committee right from music, dance, art, food, fashion, social service, literature, gender equality, debate, theatre and the list goes on. For every talent there is, there exists a club under <strong>S&C</strong>.</p>
                </div>
                <div>
                    <br/><br/><br/><br/><br/>
                    <div class='heading bold-text text-center text-uppercase'>Meet our team</div>
                    <br/><br/><br/>
                    <div id="person-card-container"></div>
                    <br/><br/><br/>
                </div>
            </div>
        </div>


        <br/><br/><br/><br/><br/>
        <script src='js/jquery.js'></script>
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
		readTextFile("./js/about_us.json", (text) => {
            var data = JSON.parse(text);
			let i=0;
			let j=0;
                let full_flag = false;
                let use_br = false;
			//console.log(data);
			for (var key of Object.keys(data)) {
                let content = '';
                if (data[key].length < 2) {
                    if (full_flag) use_br = true;
                    else full_flag = true;
                }
                else use_br = true;
                // if (data[key].length < 1) content += '<br/>';
                console.log(key);
                // if (key !== 'public-rel') if (use_br) content += '<br/>';
				for(i=0; i < data[key].length; i++) {
                    content += `
                    <div class="person-card">
                        <div class="thumbnail">
                            <img class="person-card-img"
                                src="${data[key][i].image}"
                                alt="${data[key][i].name}">
                        </div>
                        <div class="person-card-content">
                            <center>
                                <div style='text-align: left; width: 100%;'>
                                    <div class='title'>${data[key][i].name}</div>
                                    <div class="para-small-text text-capitalize" style='margin-top: 20px'>${data[key][i].department}</div>
                                    <div class="para-small-text" style='margin-top: 10px'>${data[key][i].phone}</div>
                                </div>
                            </center>
                            <hr>
                        </div>
                    </div>
                    `;
                    // if (data[key].length > 3 && i === 2) {
                    //     content += '<br/>';
                    //     use_br = false;
                    // }
                    if (data[key].length > 2 && data[key].length % 2 === 0 && (i + 1) % 2 === 0) content += '<br/>';
				}

                if (use_br) content += '<br/>';
                $('#person-card-container').append(content);
			}

				
		});

        </script>
        
        <?php
            include('./footer.php');
        ?>