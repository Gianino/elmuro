
window.addEventListener('load', function(event) {
    var y = 0;
    

    function isInViewport(elem) {
        var distance = elem.getBoundingClientRect();
        return (
            distance.top < (window.innerHeight || document.documentElement.clientHeight) && distance.bottom > 0
        );
    }

    var intervalRecargar = setInterval(recargar, 3000);
    var intervalScroll = setInterval(scroll, 10);

    function recargar(){
        location.reload()
    }
    function scroll(){
        const top = document.getElementById('titulo');
        const bottom = document.getElementById('firma');

        if(isInViewport(top)){
            var y = 1
        }
        if(isInViewport(bottom)){
            var y = -1
        }
        

        window.scrollBy(0, y); 
    }
});