// window.addEventListener('load', function(event) {
//     var intervalID = setInterval(scrolear, 10,);

//     function scrolear(){
//         window.scrollBy(0, 1); 
//     }
// });

window.addEventListener('load', function(event) {
    var intervalID = setInterval(recargar, 1000,);

    function recargar(){
        location.reload()    }
});