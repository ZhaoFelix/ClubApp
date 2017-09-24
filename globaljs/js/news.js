function playVideo(url) {
    $("#Html5Video").attr("src", url);
}

$("#closeTV").click(function(a) {
    a.preventDefault();
    $("#videoPlay").fadeOut();
    $("#overlay").fadeOut();
    $("#Html5Video").load();
    setTimeout(function(){
        $("#Html5Video").get(0).srcSave = $("#Html5Video").get(0).src;
        $("#Html5Video").get(0).src="";
        },200);
});


$(".tvBtn").click(function(a) {
    a.preventDefault();
    $("#videoPlay").fadeIn();
    $("#overlay").fadeIn();

    $("#Html5Video").bind("playing", function() {
        this.setAttribute("_isplaying", 1);
        $(".playBtn").hide()
    }).bind("ended", function() {
        this.removeAttribute("_isplaying");
        this.currentTime = 0;
        this.pause();
        inter.setinterval();
        $(this).hide()
    }).bind("pause", function() {
        this.removeAttribute("_isplaying");
    })
});