function detectBrowser() {
    if (navigator.userAgent.indexOf('Chrome') !== -1) return 'Chrome';
    else if (navigator.userAgent.indexOf('Mozilla') !== -1) return 'Firefox';
    else if (navigator.userAgent.indexOf('Safari') !== -1) return 'Safari';
    else if (navigator.userAgent.indexOf('Opera') !== -1) return 'Opera';
    else if (navigator.userAgent.indexOf('MSEI') !== -1) return 'MSEI';
    else if (navigator.userAgent.indexOf('Trident') !== -1) return 'Trident';
    else if (navigator.userAgent.indexOf('Edge') !== -1) return 'Edge';
    else return 'Unknown';
}

function detectPlatform() {
    if (navigator.userAgent.indexOf('Windows') !== -1) return 'Windows';
    else if (navigator.userAgent.indexOf('Linux') !== -1) return 'Linux';
    else if (navigator.userAgent.indexOf('Mac') !== -1) return 'Mac';
    else return 'Unknown';
}

function check_field(value) {
    return value !== null && value !== undefined && value !== '';
}