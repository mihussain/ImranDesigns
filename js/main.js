requirejs.config({
    baseUrl: '/wp-content/themes/imrandesigns-portfolio/js',
    paths: {
        'jquery': 'vendor/jquery-3.1.1.min',
        'mixItUp': 'vendor/jquery.mixitup.min',
        'transit': 'vendor/jquery.transit.min'
    }
});

requirejs(['task','detectIE','nav','header','filter', 'modal', 'scroll'], function (Task, DetectIE, Nav, Header, Filter, Modal, Scroll) {

    DetectIE.init();
    Task.init();
    Nav.init();
    Header.init();
    Filter.init();
    Modal.init();
    Scroll.init();

});
