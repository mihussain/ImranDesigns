requirejs(['detectIE','nav','header', 'moveImage','filter', 'modal', 'scroll', 'portfolio','lazyLoad'], function (DetectIE, Nav, Header, moveImage, Filter, Modal, Scroll, Portfolio, LazyLoad) {

    DetectIE.init();
    LazyLoad.init();
    //Task.init();
    Nav.init();
    Header.init();
    Scroll.init();
    //Typewriter.init();
    Portfolio.init();
    //ColourExtract.init();

    if ($('body').hasClass('portfolio')) {
        Filter.init();
    }

    if ($('body').hasClass('portfolio') || $('Bbody').hasClass('blog')) {
        Modal.init();    
        moveImage.init();

    }

    
    

});
