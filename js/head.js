/**
 * Created by mac on 16/10/17.
 */
(function() {


    var bodyEl = document.body,
        openbtn = document.getElementById( 'open-button' ),
        closebtn = document.getElementById( 'close-button' ),
        isOpen = false;

    function init() {
        initEvents();
    }
    window.onscroll = function(){
        var t =document.body.scrollTop;
        if(t>350&&!isOpen){
            toggleMenu();
        }
        if(t<350&&isOpen){
            toggleMenu();
        }


    }
    function initEvents() {
        openbtn.addEventListener( 'click', toggleMenu );
        if( closebtn ) {
            closebtn.addEventListener( 'click', toggleMenu );
        }

    }

    function toggleMenu() {
        if( isOpen ) {
            classie.remove( bodyEl, 'show-menu' );
        }
        else {
            classie.add( bodyEl, 'show-menu' );
        }
        isOpen = !isOpen;
    }

    init();

})();