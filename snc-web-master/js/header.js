let lastScrollTop = 0;
document.onscroll = (e) => {
    if (window.scrollY > 0) document.querySelector('header').style.background = '#E7E7E7';
    else document.querySelector('header').style.background = '#EEEEEEDD';

    let scrollTop=(window.pageYOffset || document.documentElement.scrollTop);
    
    if(scrollTop > lastScrollTop) document.getElementById('SnC_Logo').style.width = '90px';
    else document.getElementById('SnC_Logo').style.width = '110px';
    
    lastScrollTop = scrollTop;
}

if (window.location.pathname.indexOf('feedback') !== -1) {
    document.getElementsByClassName('feedback-float')[0].style.display = 'none';
}

let drawer_opened = false;
function toggleDrawer() {
    if (drawer_opened) document.getElementById('menu-drawer').style.display = 'none';
    else document.getElementById('menu-drawer').style.display = 'block';
    drawer_opened = !drawer_opened;
}