    <meta charset='utf-8' />
    <meta name='viewport' content='width=device-width, initial-scale=1.0' />
    <link rel='icon' href='https://sncpdpu.com/assets/images/SnC_logo.png' type='image/png' />
    
    <link href='./css/bootstrap-min.css' rel='stylesheet' />
    <link href='./css/header.css' rel='stylesheet' />
    <link href='./css/footer.css' rel='stylesheet' />
    <link href='./css/buttons.css' rel='stylesheet' />
    <link href='./css/typography.css' rel='stylesheet' />
    <link href='./css/style.css' rel='stylesheet' />
</head>
<body>
    <noscript class='sub-heading bold-text'>Please enable JavaScript in your browser to run this website.</noscript>
    <header>
        <nav class="nav-container">
            <div class="logo">
                <div class="img"><a href='/'><img src="./assets/images/SnC_logo.png" alt="S & C logo" id='SnC_Logo' /></a>
                </div>
            </div>
            <div class="page-containers">
                <div class='nav-bar'>
                    <ul>
                        <li><a href='/' class='btn btn-link small-text theme-color bold-text'>Home</a></li>
                        <li><a href='/raasotsav' class='btn btn-link small-text theme-color bold-text'>Raasotsav</a></li>
                        <li><a href='/past-events' class='btn btn-link small-text theme-color bold-text'>Past Events</a></li>
                        <li><a href='/clubs' class='btn btn-link small-text theme-color bold-text'>Clubs</a></li>
                        <li><a href='./about' class='btn btn-link small-text theme-color bold-text'>About</a></li>
                    </ul>
                    <!-- <div class='snc-line para-small-text'><span style='font-size: 22px; font-weight: bold;'>S</span>&nbsp;<span style='font-size: 16px;'>&</span>&nbsp;<span style='font-size: 22px; font-weight: bold;'>C</span>&nbsp;<span style='font-size: 16px; font-weight: bold;'>-&nbsp; ADDING COLOURS TO LIFE</span></div> -->
                </div>
                <div class='resp-nav-bar'>
                    <button class='btn menu-button' onClick='toggleDrawer()'><div class='material-icons menu-icon'>menu</div></button>
                    <div id='menu-drawer'>
                        <ul>
                            <li><a href='/' class='theme-color'>Home</a></li>
                            <li><a href='/raasotsav' class='theme-color'>Raasotsav</a></li>
                            <li><a href='/past-events' class='theme-color'>Past Events</a></li>
                            <li><a href='/clubs' class='theme-color'>Clubs</a></li>
                            <li><a href='/about' class='theme-color'>About</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </nav>
        <div class='feedback-float'><a href='/feedback'><span class='material-icons'>feedback</span></a></div>
    </header>
    <script src='./js/jquery.js'></script>
    <script src='./js/header.js'></script>