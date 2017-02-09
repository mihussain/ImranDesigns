requirejs.config({
    baseUrl: '/wp-content/themes/imrandesigns-portfolio/js',
    paths: {
        'jquery': 'vendor/jquery-3.1.1.min',
        'mixItUp': 'vendor/jquery.mixitup.min',
        'transit': 'vendor/jquery.transit.min'
    }
});

requirejs(['task'], function (Task) {

    Task.init();

});
