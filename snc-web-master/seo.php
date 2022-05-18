<?php
    function get_seo($title, $desc, $url) {
        return "
            <meta name='description' content='{$desc}'>
            <meta property='og:title' content='{$title}' />
            <meta property='og:type' content='article' />
            <meta property='og:url' content='$url' />
            <meta property='og:locale' content='en_US' />
            <meta property='og:image' content='https://sncpdpu.com/assets/images/SnC_logo_with_line.jpg' />
            <meta property='og:description' content='{$desc}' />
            <meta property='og:tag' content='Social and Cultural Committee of PDPU, rangtaal, raasotsav, pdpu, cultural events' />
        ";
    }

?>