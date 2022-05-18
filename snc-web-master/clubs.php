<?php
    require('./include/geodata.php');
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <?php
            include('./seo.php');
            $title = 'Clubs - Social and Cultural Committee of PDPU';
            $desc = 'Clubs of Social and Cultural Committee of PDPU are Ajia Bunker, Daastan, Debsoc and many more. They all organize wonderful events each year in the Pandit Deendayal Petroleum University.';
            $url = 'https://sncpdpu.com/clubs';
            echo get_seo($title, $desc, $url);
        ?>
        <title>Clubs in Social and Cultural Committee of PDPU</title>
        <script type="application/ld+json">
            {
                "@context" : "http://schema.org",
                "@type" : "Website",
                "name" : "Clubs in Social and Cultural Committee of PDPU",
                "url" : "https://sncpdpu.com/clubs",
                "image" : "https://sncpdpu.com/assets/images/SnC_logo_with_line.jpg",
                "sameAs" : [
                    "https://www.facebook.com/pdpu.sal",
                    "https://www.instagram.com/social_n_cultural_committee"
                ]
            }
        </script>
        <link rel="stylesheet" href="./css/modal.css" />
        <link rel="stylesheet" href="./css/club-card.css" />

        <?php
            include('./header.php');
        ?>
        <br/><br/><br/>
        <div class='heading bold-text text-uppercase text-center'>Clubs</div>
        <div class="club-cards"></div>
        <br/>
        <div class='para-small-text bold-text text-center'>And many more.</div>
        <div class="modal-box"></div>
        <br/><br/><br/>

        <script src='./js/jquery.js'></script>
        <script src='./js/bootstrap-min.js'></script>
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
            readTextFile("./js/club_info.json", (text) => {
                var data = JSON.parse(text);
                let i = 0;
                let model = "";
                let content = "";
                for (i = 0; i < data.clubs.length; i++) {
                    content = `<div class="club-card" data-toggle="modal" data-target="#myModal-${i}">
                        <a style='cursor: pointer'>
                            <picture>
                                <img class="club-card-img" src="${data.clubs[i].logo}" alt="${data.clubs[i].name} logo" />
                                <div class="club-card-content">
                                    <h2 class="club-card-name">${data.clubs[i].name}</h2>
                                    <hr>
                                    <p class="club-card-desc">${data.clubs[i].small_desc}</p>
                                </div>
                            </picture>
                        </a>
                    </div>`;
                    model = `<div class="modal fade" id="myModal-${i}" role="dialog">
                    <div class="modal-dialog">
                        <div class="modal-body">
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                            <div class="modal-img">
                                <picture class="thumbnail">
                                    <img class="modal-club-logo" src="${data.clubs[i].logo}" alt="club logo">
                                </picture>
                            </div>
                            <div>
                                <div class="title modal-club-name text-center bold-text text-uppercase">${data.clubs[i].name}</div>
                            </div>
                            <div>
                                <p class="para-small-text modal-club-desc">${data.clubs[i].description}
                                </p>
                            </div>
                            <div>
                                <div class="para-text president-label text-center bold-text">President: <span class="modal-president-name">${data.clubs[i].president_name}</span></div>
                            </div>
                            <div class='para-small-text modal-club-follow float-right'>
                                <span class='text-icon'>
                                    <svg viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M12 0C8.74 0 8.333.015 7.053.072 5.775.132 4.905.333 4.14.63c-.789.306-1.459.717-2.126 1.384S.935 3.35.63 4.14C.333 4.905.131 5.775.072 7.053.012 8.333 0 8.74 0 12s.015 3.667.072 4.947c.06 1.277.261 2.148.558 2.913.306.788.717 1.459 1.384 2.126.667.666 1.336 1.079 2.126 1.384.766.296 1.636.499 2.913.558C8.333 23.988 8.74 24 12 24s3.667-.015 4.947-.072c1.277-.06 2.148-.262 2.913-.558.788-.306 1.459-.718 2.126-1.384.666-.667 1.079-1.335 1.384-2.126.296-.765.499-1.636.558-2.913.06-1.28.072-1.687.072-4.947s-.015-3.667-.072-4.947c-.06-1.277-.262-2.149-.558-2.913-.306-.789-.718-1.459-1.384-2.126C21.319 1.347 20.651.935 19.86.63c-.765-.297-1.636-.499-2.913-.558C15.667.012 15.26 0 12 0zm0 2.16c3.203 0 3.585.016 4.85.071 1.17.055 1.805.249 2.227.415.562.217.96.477 1.382.896.419.42.679.819.896 1.381.164.422.36 1.057.413 2.227.057 1.266.07 1.646.07 4.85s-.015 3.585-.074 4.85c-.061 1.17-.256 1.805-.421 2.227-.224.562-.479.96-.899 1.382-.419.419-.824.679-1.38.896-.42.164-1.065.36-2.235.413-1.274.057-1.649.07-4.859.07-3.211 0-3.586-.015-4.859-.074-1.171-.061-1.816-.256-2.236-.421-.569-.224-.96-.479-1.379-.899-.421-.419-.69-.824-.9-1.38-.165-.42-.359-1.065-.42-2.235-.045-1.26-.061-1.649-.061-4.844 0-3.196.016-3.586.061-4.861.061-1.17.255-1.814.42-2.234.21-.57.479-.96.9-1.381.419-.419.81-.689 1.379-.898.42-.166 1.051-.361 2.221-.421 1.275-.045 1.65-.06 4.859-.06l.045.03zm0 3.678c-3.405 0-6.162 2.76-6.162 6.162 0 3.405 2.76 6.162 6.162 6.162 3.405 0 6.162-2.76 6.162-6.162 0-3.405-2.76-6.162-6.162-6.162zM12 16c-2.21 0-4-1.79-4-4s1.79-4 4-4 4 1.79 4 4-1.79 4-4 4zm7.846-10.405c0 .795-.646 1.44-1.44 1.44-.795 0-1.44-.646-1.44-1.44 0-.794.646-1.439 1.44-1.439.793-.001 1.44.645 1.44 1.439z"/>
                                    </svg>
                                </span>
                                <span class='small-para-text'><a href="${data.clubs[i].instagram_handle_link}">${data.clubs[i].instagram_handle}</a></span>
                            </div>
                            <div class="para-small-text modal-club-members">Total Members: <span class="member-value">${data.clubs[i].members}</span> </div>
                            <div class='clearfix'></div>
                        </div>
                    </div>
                </div>`;
                    $('.club-cards').append(content);
                    $('.modal-box').append(model);
                }
            });
        </script>

        <?php
            include('./footer.php');
        ?>