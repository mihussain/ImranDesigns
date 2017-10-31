requirejs.config({
    baseUrl: '/wp-content/themes/imrandesigns-portfolio/js',
    paths: {
        'jquery': 'vendor/jquery-3.1.1.min',
        'mixItUp': 'vendor/jquery.mixitup.min',
        'transit': 'vendor/jquery.transit.min'
    }
});

requirejs(['task','detectIE','nav','header', 'moveImage','filter', 'modal', 'scroll', 'typewriter', 'portfolio'], function (Task, DetectIE, Nav, Header, moveImage, Filter, Modal, Scroll, Typewriter, Portfolio) {

    DetectIE.init();
    Task.init();
    Nav.init();
    Header.init();
    moveImage.init();
    Filter.init();
    Modal.init();
    Scroll.init();
    Typewriter.init();
    Portfolio.init();

});
