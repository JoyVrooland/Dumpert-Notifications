<!DOCTYPE html>
<html>
<head>
    <title>dumpert melding scraper</title>
    <link rel="shortcut icon" href="https://cdn.freebiesupply.com/logos/large/2x/dumpert-logo-png-transparent.png" type="image/x-icon" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.all.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Arvo" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="push.js"></script>
</head>
<style>
    *{
        overflow: hidden;
    }
    iframe {
        position: fixed;
        background: #000;
        border: none;
        top: 0; right: 0;
        bottom: 0; left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    .hidden{
        display: none;
    }
    .framelist{
        display: none;
    }
    .terug{
        width: 91px;
        height: 30px;
        position: absolute;
        bottom: 12px;
        left: 50%;
        margin-left: -33px;
        color: white;
        display: none;
    }
    .terug > i {
        cursor: pointer;
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
    }
    .info{
        position: absolute;
        bottom: 2px;
        margin-left: 10px;
        z-index: 10000;
        width: 20px;
        cursor: pointer;
    }


</style>
<body>
<div class="lijst">
</div>
<div class="framelist">
    <div class="terug">
        <i title="Terug naar het menu" class="material-icons" style="font-size:36px">keyboard_arrow_down</i>
        <img class="info" src="fav.png" width="36px">
    </div>
    <iframe id="vidplayer" src="" width="100%" height="500px" class="dumpertembed" allowfullscreen></iframe>
</div>
<script>
    var link = window.location.search;
    var nowactive = '';
    var count = 0;

    if(link === "?run"){
        window.open('http://localhost/Dumpert-Notifications/','Dumpert Notifications','width=400,height=400,resizable=1');
    }
    function updatelist() {
        $.post("dumpertmelding.php", {}).done(function (data) {
            $(".lijst").html(data);
            $('.linkbtn').click(function () {
                var id = this.id;
                nowactive = id;
                var val = $('#link' + id).text();
                $('#vidplayer').attr('src', val);
                $('.lijst').hide();
                $('.framelist').show();
                window.resizeTo(800,500);
            });
            $(".info").click(function () {
                if(count < 1){
                    var val = $('#info' + nowactive).text();
                    window.open(val);
                    count++;
                }
            });
        });
    }
    updatelist();
    setInterval(function () {
        updatelist();
    }, 10000);

    function popmelding() {
        Push.create("Dumpert Notificatie",{
            body: "Er zijn weer nieuwe videos geupload!",
            icon: 'fav.png',
            timeout: 10000,
            onClick: function () {
                window.focus();
                this.close();
            }
        });
    }

    $('#vidplayer , .terug').hover(function () {
        $('.terug').stop().fadeIn();
    });

    $("#vidplayer, .terug").mouseleave(function() {
        $('.terug').stop().fadeOut();
    });

    $(".terug > i").click(function () {
        window.resizeTo(400,480);
        $('.lijst').show();
        $('.framelist').hide();
        $('#vidplayer').attr('src', '');
        count = 0;
    });

</script>

</body>
</html>