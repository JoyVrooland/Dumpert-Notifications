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
    a.dumpthumb .details {
        position: absolute;
        left: 118px;
        top: 9px;
        width: 65%;
        word-wrap: break-word;
        font-size: 0.76923em;
        color: #8f8f8f;
        max-height: 100px;
        overflow: hidden;
    }
    a.dumpthumb:hover {
        border: 1px solid #66c221;
    }
    a.dumpthumb img {
        position: absolute;
        left: 9px;
        top: 9px;
        height: 100px;
        width: 100px;
    }

    a.dumpthumb {
        position: relative;
        display: block;
        width: 98%;
        height: 118px;
        overflow: hidden;
        margin: 0 4px 10px 4px;
        border: 1px solid #e6e6e6;
        margin: -1px 3px 9px 3px;
        color: #000;
        text-decoration: none;
    }
    a.dumpthumb .details h1 {
        margin-bottom: 3px;
        font-size: 1.3em;
        line-height: 1.07692em;
        max-height: 2.15385em;
        overflow: hidden;
        color: #000;
    }
    a.dumpthumb .details date, a.dumpthumb .details .stats {
        font-size: 1em;
        color: #8f8f8f;
    }

    a.dumpthumb p {
        margin: 0;
    }
    a.dumpthumb .details .description {
        margin-top: 3px;
        font-size: 1.2em;
        color: #000;
    }
    .content{
        margin:0 auto;
        width: 300px;
        margin-top: 80px;
    }
    .ctabtn {
        margin-top: 25px;
        background-color: #2ecc71;
        padding: 23px;
        padding-left: 40px;
        padding-right: 40px;
        color: white;
        border: none;
        font-size: 1em;
        margin-top: 40px;
        font-size: 24px;
    }
    .ctabtn:hover{
        background-color: #27ae60;
    }
    ::-webkit-scrollbar {
        display: none;
    }
</style>
<body>
<div class="notrunning">
    <div class="content">
        <img src="fav.png" width="300px">
        <center><button class="ctabtn" onclick="javascript:window.open('http://localhost/Dumpert-Notifications/?running','Dumpert Notifications','width=400,height=500,resizable=1');">Start de applicatie</button></center>
    </div>
</div>
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
        window.open('http://localhost/Dumpert-Notifications/','Dumpert Notifications','width=400,height=500,resizable=1');
    }else if(link === "?running"){
        $('.notrunning').remove();
    }else{
        $('.lijst').remove();
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

    function updatecomment(site) {
        $.post("dumpertcomments.php", {'site': site}).done(function () {

        })
    }

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