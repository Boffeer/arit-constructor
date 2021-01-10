const SITE_URL = `https://m.habr.ru`;
const WHITE_BG = true;
const SITE_TYPE = 'url';
const RENDER_DELAY = 9000;

const webshot = require(`webshot`)

// Webshot
// -------
const options = {
    siteType: SITE_TYPE,

    // It's make only screenshot of the selected container.
    // It can be a class
    // captureSelector: `body`,
    screenSize: {
        width: 414,
        height: 736
    },
    shotSize: {
        width: 414,
        height: `all`
    },
    userAgent: `Mozilla/5.0 (iPhone; U; CPU iPhone OS 3_2 like Mac OS X; en-us) AppleWebKit/531.21.20 (KHTML, like Gecko) Mobile/7B298g`,
    defaultWhiteBackground: WHITE_BG,
    renderDelay: RENDER_DELAY,

}

webshot(SITE_URL, `qa/site.jpg`, options, function (err) {
    if (!err) {
    }
})
