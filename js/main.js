requirejs(['detectIE','nav','header', 'moveImage','filter', 'modal', 'scroll', 'portfolio','lazyLoad', 'fadeTransition', 'showImages', 'prism'], 
function (DetectIE, Nav, Header, moveImage, Filter, Modal, Scroll, Portfolio, LazyLoad, FadeTransition, ShowImages, Prism) {

    DetectIE.init();
    LazyLoad.init();
    FadeTransition.init();
    //Task.init();
    ShowImages.init();
    Nav.init();
    Header.init();
    Scroll.init();
    //Typewriter.init();
    Portfolio.init();
    //ColourExtract.init();

    if ($('body').hasClass('portfolio')) {
        Filter.init();
    }

    if ($('body').hasClass('single-project') || $('body').hasClass('blog')) {
        Modal.init();    
        moveImage.init();

    }

    
    

});
