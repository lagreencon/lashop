myjs.jsvar content = $('#content');
function resetStyles() {
content.attr('style','').removeAttr('style');
}
function applyStyles() {
content.css({
opacity : 1,
transform: 'scale(1.0,1.0)',
WebkitTransform: 'scale(1.0,1.0)',
transition : 'transform 0.4s ease-in-out, opacity 0.4s ease-in-out',
WebkitTransition : '-webkit-transform 0.4s ease-in-out, opacity 0.4s ease-in-out'
});
};
applyStyles();
setInterval(function(){|
resetStyles();
setTimeout(function(){
applyStyles();
},1000)
},3000)