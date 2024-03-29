$("#add-to-album").on("click", function () {
    $.ajax({
        url: "/albums/user-albums",
        type: "GET",
        success: function (res) {
            res.forEach(album => {
                $("#lista-albumes").append('<option value="' + album.id + '">' + album.name + '</option>');
            });


            $("#add-to-album-modal").css("display", "flex");
            // $("#add-to-album-modal").show();
        }
    });
});

$("#cerrar-album-modal").on("click", function () {
    $("#lista-albumes").html("");


    $("#add-to-album-modal").css("display", "none");
    // $("#add-to-album-modal").hide();
});

$("#aceptar-album-modal").on("click", function () {
    let albumID = $("#lista-albumes").val();
    let songID = $(this).attr("data-song-id");

    $.ajax({
        url: "/songs/add-to-album/",
        type: "POST",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            song_id: songID,
            album_id: albumID
        },
        success: function () {
            $("#add-to-album-modal").html("<h2>Cancion añadida correctamente</h2>");
            setTimeout(function () {

                $("#add-to-album-modal").css("display", "none");
                // $("#add-to-album-modal").hide();
            }, 2000);
            setTimeout(function () {
                location.reload();
            }, 2000);
        }
    });
});
