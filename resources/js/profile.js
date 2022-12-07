$("#song-list").on("click", function () {
    $("#song-list").css("background-color", "#6C0F8E");
    $("#album-list").css("background-color", "black");
    $("#songs-user").show();
    $("#albums-user").hide();

    // btn hide
    $("#btnCreateAlbumShow").attr("id", "btnCreateAlbum");
});
$("#album-list").on("click", function () {
    $("#album-list").css("background-color", "#6C0F8E");
    $("#song-list").css("background-color", "black");
    $("#albums-user").show();
    $("#songs-user").hide();

    // btn show
    $("#btnCreateAlbum").attr("id", "btnCreateAlbumShow");
});

// Pausar resto de audio

document.addEventListener('play', function (e) {
    var audios = document.getElementsByTagName('audio');
    for (var i = 0, len = audios.length; i < len; i++) {
        if (audios[i] != e.target) {
            audios[i].pause();
        }
    }
}, true);
