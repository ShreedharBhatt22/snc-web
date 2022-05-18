<?php
    require('./include/geodata.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
        include('./seo.php');
        $title = 'Social and Cultural Committee of PDPU';
        $desc = 'Social and Cultural Committee of PDPU is the responsible for the social and cultural events organized by Pandit Deendayal Petroleum University.';
        $url = 'https://sncpdpu.com';
        echo get_seo($title, $desc, $url);
    ?>
    <title>Welcome - Social and Cultural Committee of PDPU</title>
    <script type="application/ld+json">
        {
            "@context" : "http://schema.org",
            "@type" : "Website",
            "name" : "Social and Cultural Committee of PDPU",
            "url" : "https://sncpdpu.com",
            "image" : "https://sncpdpu.com/assets/images/SnC_logo_with_line.jpg",
            "sameAs" : [
                "https://www.facebook.com/pdpu.sal",
                "https://www.instagram.com/social_n_cultural_committee"
            ]
        }
    </script>

    <link href='./css/index-page.css' rel='stylesheet' />
    <link href='./css/slider.css' rel='stylesheet' />
    <link href='./css/input.css' rel='stylesheet' />
    <link href='./css/counter.css' rel='stylesheet' />
    <link href='./css/person-card.css' rel='stylesheet' />

    <?php
        include('./header.php');
    ?>


    <!-- Carousel -->
    <div class="img-slider ">
        <!--LEFT RIGHT BUTTON-->
        <div class="button button-left" onclick="left()">
            <a ><span class="material-icons">arrow_back_ios</span></a>
        </div>
        <div class="button button-right" onclick="right()">
            <a ><span class="material-icons">arrow_forward_ios</span></a>
        </div>
        
        <!-- Full-width images -->
        <div class="slider-image ">
            <img src="./assets/images/slider-image-1.jpg" id='Slider image 1'>
        </div>

        <div class="slider-image ">
            <img src="./assets/images/slider-image-2.jpg" id='Slider image 2'>
        </div>

        <div class="slider-image ">
            <img src="./assets/images/slider-image-3.jpg" id='Slider image 3'>
        </div>

        <div class="slider-image ">
            <img src="./assets/images/slider-image-4.jpg" id='Slider image 4'>
        </div>

        <!-- The dots/circles -->
        <div class="pointer">
            <div class="dot" onclick="move(0)"><span class="material-icons slider-button">stop_circle</span></div>
            <div class="dot" onclick="move(1)"><span class="material-icons slider-button">stop_circle</span></div>
            <div class="dot" onclick="move(2)"><span class="material-icons slider-button">stop_circle</span></div>
            <div class="dot" onclick="move(3)"><span class="material-icons slider-button">stop_circle</span></div>
        </div>
    </div>
    <br/><br/><br/><br/>

    <!-- About Section -->
    <br/><br/><br/>
    <div class="container-fluid p-5">
        <center>
        <div class="row  snc-about-image-div">
            <div class="col-md-3">
                <img src="./assets/images/SnC_logo_with_line.png" alt="SnC_logo" class="mx-auto d-block my-auto">
            </div>
            <div class="col-md-9 para-text about-desc text-left align-self-center">
                <div class='title bold-text page-heading' style='white-space: normal;'>The Social and Cultural Committee of PDPU</div>
                <br/>
                It is a whirlwind of enthusiasm and
                rich experiences! We, at S&amp;C organize a diverse and vibrant multitude of
                events that celebrate the essence of university, culture and the youth. PDPU is
                a vast campus and university in itself, but the students and faculty members
                that form this committee are the ones that breathe life and love into it. Join us,
                on our rollercoaster ride!
            </div>
        </div>
        </center>
    </div>
    <br/><br/><br/><br/><br/><br/><br/>
    <!-- Counter -->
    <div class="container-fluid counter-box">
        <div class="row" style='margin: 0; padding: 0;'> 
            <div class="counter col-md-4">
                <div class="heading timer white-text" id='clubCounter' data-to="17" data-speed="3000"></div>
                <p class="heading white-text">Clubs</p>
           </div>
       
           <div class="counter col-md-4">
             <div class="heading timer white-text" data-to="250" data-speed="3000"></div>
             <p class="heading white-text ">Members</p>
           </div>
       
           <div class="counter col-md-4">
             <div class="heading timer white-text" data-to="8000" data-speed="3000"></div>
             <p class="heading white-text">Participants</p>
           </div>
       
         </div> 
    </div>
    <br/><br/><br/><br/><br/><br/><br/>
    <!-- Video Gallery -->
    <div class="heading text-center font-weight-bolder bold-text text-uppercase">Video Gallery</div><br/>
    <div class="container text-center">
        <object class='video-obj'><embed src='https://www.youtube.com/embed/3hb83UoUBqc' /></object>
        <br/><br/>
        <div>
            <p class="para-small-text">The success of a variety of vibrant events in PDPU has depended on the camaraderie and mutual cooperation between all the individual clubs and the Social and Cultural Committee. Whenever both parties have worked in tandem, the results have been remarkable. In the spirit of this strong relationship, we welcome all. Dance with us on Garba beats during "Rangtaal" and feel patriotic with us on Republic/Independence Day or get sky high on Uttarayan with "Kai Po Chhe" and of course have the fun of your life with our biggest annual cultural fest of PDPU "FLARE" The spirit of S&C is all about society for culture. Brace yourself to experience colors of the Social and Cultural Committee.<br/><br/>Adding colors to your life - S&C.</p>
        </div>
    </div>
    <br/><br/><br/><br/><br/><br/>

    <!-- Team Members Section -->
    <div class="heading text-center font-weight-bolder bold-text text-uppercase">Meet the team</div>
    <br/><br/><br/><br/>
    <center>

    <!--Event Card -->
    <!-- <div class="person-card">
        <a href="#">
            <div class="thumbnail">
                <img class="person-card-img"
                    src="./assets/images/person_image1.jpg"
                    alt="Person thumbnail">
            </div>
            <div class="person-card-content">
                <center>
                    <div style='text-align: left; width: max-content;'>
                        <div class='heading'>Lorem Ipsum</div>
                        <div class="sub-heading">Treasurer</div>
                        <div class="sub-heading">+91 0987654321</div>
                    </div>
                </center>
                <hr>
            </div>
        </a>
    </div> -->
    <div class="person-card">
        <a href="#">
            <div class="thumbnail">
                <img class="person-card-img"
                    src="./assets/images/members/Ayush-Sodha.jpg"
                    alt="Person thumbnail">
            </div>
            <div class="person-card-content">
                <center>
                    <div style='text-align: left; width: 100%;'>
                        <div class='title'>Ayush Sodha</div>
                        <div class="para-small-text text-capitalize" style='margin-top: 20px'>General Secretary</div>
                        <div class="para-small-text" style='margin-top: 10px'>+91 81606 01780</div>
                    </div>
                </center>
                <hr>
            </div>
        </a>
    </div>
    <!-- <div class="person-card">
        <a href="#">
            <div class="thumbnail">
                <img class="person-card-img"
                    src="./assets/images/person_image1.jpg"
                    alt="Person thumbnail">
            </div>
            <div class="person-card-content">
                <center>
                    <div style='text-align: left; width: max-content;'>
                        <div class='heading'>Lorem Ipsum</div>
                        <div class="sub-heading">Treasurer</div>
                        <div class="sub-heading">+91 0987654321</div>
                    </div>
                </center>
                <hr>
            </div>
        </a>    
    </div> -->
    <div class="person-card">
        <a href="#">
            <div class="thumbnail">
                <img class="person-card-img"
                    src="./assets/images/members/Krunal-Hindocha.jpg"
                    alt="Person thumbnail">
            </div>
            <div class="person-card-content">
                <center>
                    <div style='text-align: left; width: 100%;'>
                        <div class='title'>Krunal Hindocha</div>
                        <div class="para-small-text text-capitalize" style='margin-top: 20px'>Treasurer</div>
                        <div class="para-small-text" style='margin-top: 10px'>+91 87582 99099</div>
                    </div>
                </center>
                <hr>
            </div>
        </a>
    </div>
</center>
    <br/>
    <div class=" container text-center"><a href='/about.php'><button class="btn btn-normal sub-heading white-text">View More</button></a></div>
    <br/><br/><br/>

    <script src='./js/slider.js'></script>
    <script src='./js/counter.js'></script>
    <script>
        $('header').css('position', 'fixed');
    </script>

    <?php
        include('./footer.php');
    ?>