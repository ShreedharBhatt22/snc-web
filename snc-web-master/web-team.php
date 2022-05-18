<?php
    require('./include/geodata.php');
?>

<!DOCTYPE html>
<html>
    <head>
        <?php
            include('./seo.php');
            $title = 'Web team - Social and Cultural Committee of PDPU';
            $desc = 'Web team of Social and Cultural Committee of PDPU who has developed this website. It is developed in the collaboration of Encode and S&C web team of Pandit Deendayal Petroleum University.';
            $url = 'https://sncpdpu.com/web-team';
            echo get_seo($title, $desc, $url);
        ?>
        <title>Web Team - Social and Cultural Committee of PDPU</title>
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
                <div>
                    <div class='heading bold-text text-center text-uppercase'>Meet our web team</div>
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
		readTextFile("./js/web-team.json", (text) => {
            var data = JSON.parse(text);
			let i=0;
			let j=0;
                // let full_flag = false;
                // let use_br = false;
			//console.log(data);
			for (let key of Object.keys(data)) {
                let content = '';
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
                                    <div class="para-small-text text-capitalize" style='margin-top: 20px'>${data[key][i].dsgn}</div>
                                </div>
                            </center>
                            <hr>
                        </div>
                    </div>
                    `;
                    // console.log(data[key].length > 2 && data[key.length] % 2 === 0 && (i + 1) % 2 === 0);
                    if (data[key].length > 2 && data[key].length % 2 === 0 && (i + 1) % 2 === 0) content += '<br/>';
				}
                
                content += '<br/>';
                $('#person-card-container').append(content);
			}

				
		});

        </script>
        
        <?php
            include('./footer.php');
        ?>