<?php session_start(); ?>
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
    .fullplayer {
        position: fixed;
        background: #000;
        border: none;
        top: 0; right: 0;
        bottom: 0; left: 0;
        width: 100%;
        height: 100%;
        z-index: -1;
    }
    .commentpage{
        position: fixed;
        /*background: #000;*/
        border: none;
        right: 0;
        bottom: 0; left: 0;
        width: 100%;
        height: 50%;
        z-index: -1;
    }
    .dumpertembed{
        position: fixed;
        background: #000;
        border: none;
        top: 0; right: 0;
        bottom: 0; left: 0;
        width: 100%;
        height: 50%;
        z-index: -1;
    }
    .hidden{
        display: none;
    }
    .framelist{
        display: none;
    }
    #terug{
        cursor: pointer;
    }
    .terugfull{
        width: 91px;
        height: 30px;
        position: absolute;
        bottom: 12px;
        left: 50%;
        margin-left: -33px;
        color: white;
        display: none;
    }
    .terugsplit{
        width: 91px;
        height: 30px;
        position: absolute;
        bottom: 50%;
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
    .wrapper {
        height: 22px;
        width: 200px;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 6px;
    }
    .label {
        display:inline-block;
        position:relative;
        top:-6px;
        height:20px;
        padding:0;
        margin:0 5px 0 0;
        margin-right:5px;
    }
    .radio {
        display:inline-block;
        width:43px;
        height:20px;
        border-radius:10px;
        position: relative;
    }
    .radio .icon {
        display:inline-block;
        position:absolute;
        width:16px;
        height:16px;
        top:2px;
        color:#ffffff;
        text-shadow:0 1px 0 rgba(0,0,0,0.3);
    }

    .radio .switch {
        display:block;
        height:20px;
        width:20px;
        border-radius:10px;
        border:1px solid #848b83;
        position:relative;
        top:-1px;
        background: #f4f4f4; /* Old browsers */
        background: -moz-linear-gradient(top,  #f4f4f4 0%, #ebebeb 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#f4f4f4), color-stop(100%,#ebebeb)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #f4f4f4 0%,#ebebeb 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #f4f4f4 0%,#ebebeb 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #f4f4f4 0%,#ebebeb 100%); /* IE10+ */
        background: linear-gradient(top,  #f4f4f4 0%,#ebebeb 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr ='#f4f4f4', endColorstr='#ebebeb',GradientType=0 ); /* IE6-9 */
        -webkit-transition: left 150ms ease;
        -moz-transition: left 150ms ease;
        -ms-transition: left 150ms ease;
        -o-transition: left 150ms ease;
        transition: left 150ms ease;
    }
    .radio:hover {
        cursor:pointer;
    }
    .radio .switch:after {
        content:"";
        display:block;
        position: relative;
        width:10px;
        height:10px;
        border-radius:5px;
        top:5px;
        left:5px;
        background: #8e8e8e; /* Old browsers */
        background: -moz-linear-gradient(top,  #8e8e8e 0%, #bcbcbc 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8e8e8e), color-stop(100%,#bcbcbc)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #8e8e8e 0%,#bcbcbc 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #8e8e8e 0%,#bcbcbc 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #8e8e8e 0%,#bcbcbc 100%); /* IE10+ */
        background: linear-gradient(top,  #8e8e8e 0%,#bcbcbc 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8e8e8e', endColorstr='#bcbcbc',GradientType=0 ); /* IE6-9 */
        -webkit-box-shadow:0 1px 0 #ffffff;
        box-shadow:0 1px 0 #ffffff;
    }
    .radio.on {
        border:1px solid #469d1c;
        background: #168d09; /* Old browsers */
        background: -moz-linear-gradient(top, #168d09 0%, #5bcf24 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#168d09), color-stop(100%,#5bcf24)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top, #168d09 0%,#5bcf24 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top, #168d09 0%,#5bcf24 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top, #168d09 0%,#5bcf24 100%); /* IE10+ */
        background: linear-gradient(top, #168d09 0%,#5bcf24 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#168d09', endColorstr='#5bcf24',GradientType=0 ); /* IE6-9 */
    }
    .radio.on .switch {
        left:25px;
    }
    .radio.off {
        border:1px solid #989898;
        background: #8a8a8a; /* Old browsers */
        background: -moz-linear-gradient(top,  #8a8a8a 0%, #7C7C7C 100%); /* FF3.6+ */
        background: -webkit-gradient(linear, left top, left bottom, color-stop(0%,#8a8a8a), color-stop(100%,#7C7C7C)); /* Chrome,Safari4+ */
        background: -webkit-linear-gradient(top,  #8a8a8a 0%,#7C7C7C 100%); /* Chrome10+,Safari5.1+ */
        background: -o-linear-gradient(top,  #8a8a8a 0%,#7C7C7C 100%); /* Opera 11.10+ */
        background: -ms-linear-gradient(top,  #8a8a8a 0%,#7C7C7C 100%); /* IE10+ */
        background: linear-gradient(top,  #8a8a8a 0%,#7C7C7C 100%); /* W3C */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#8a8a8a', endColorstr='#7C7C7C',GradientType=0 ); /* IE6-9 */
    }
    .radio.off .switch {
        left:-2px;
    }

    .version{
        position: relative;
        display: block;
        margin-top: 14px;
        font-family: sans-serif;
    }
</style>
<body>
<div class="notrunning">
    <div class="content">
        <img src="fav.png" width="300px">
        <center>
            <button class="ctabtn" onclick="opstarten()">Start de applicatie</button>
            <span class="version">© Dumpert Notifications - v1.0.1</span>
        </center>
    </div>
</div>
<div class="wrapper hidden">
    <div class="label">Dumpert comments:</div>
    <div id="toggle" class="radio off">
        <div class="icon"></div>
        <div class="switch"></div>
    </div>
    <p class="comtog"></p>
</div>
<div class="lijst">
</div>
<div class="framelist">
        <div id="terug" class="terug">
            <div class="menubar">
            <i title="Terug naar het menu" class="material-icons" style="font-size:36px">keyboard_arrow_down</i>
            <img class="info" src="fav.png" width="36px">
        </div>
    </div>
    <iframe id="vidplayer" src="" width="100%" height="500px" class="fullplayer" allowfullscreen></iframe>
    <iframe src="" width="100%" height="500px" class="commentpage" style="display: none;"></iframe>
</div>
<script>
    var link = window.location.search;
    var nowactive = '';
    var count = 0;
    var comments = "off";

    if(link === "?run"){
        window.open('index.php?running','Dumpert Notifications','width=400,height=500,resizable=1');
    }else if(link === "?running"){
        $('.notrunning').remove();
        $('.wrapper').show();
    }else{
        $('.lijst').remove();
    }
    function updatecomment(site) {
        $.post("dumpertcomments.php", {'site': site}).done(function (data) {
            $('.commentpage').attr('src', data);
        })
    }

    function updatelist() {
        $.post("dumpertmelding.php", {}).done(function (data) {
            $(".lijst").html(data);
            $('.linkbtn').click(function () {
                var id = this.id;
                nowactive = id;
                var val = $('#link' + id).text();
                var site = $('#info' + id).text();
                updatecomment(site);
                $('#vidplayer').attr('src', val);
                $('.lijst').hide();
                $('.wrapper ').hide();
                $('.framelist').show();
                if(comments == "on"){
                    window.resizeTo(800,935);
                }else{
                    window.resizeTo(800,500);
                }
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

    function opstarten(){
        var status = "off";
        if($( "#toggle" ).hasClass( "on" ) == true){
            status = "on";
        }else{
            status = "off";
        }
        $.post("ajax.php", {'status': 'commentToggle', 'val': status});
        window.open('index.php?running','Dumpert Notifications','width=400,height=500,resizable=1');
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

    $('#vidplayer , #terug').hover(function () {
        $('#terug').stop().fadeIn();
    });

    $("#vidplayer, #terug").mouseleave(function() {
        $('#terug').stop().fadeOut();
    });

    $("#terug > .menubar > i").click(function () {
        window.resizeTo(400,480);
        $('.lijst').show();
        $('.wrapper ').show();
        $('.framelist').hide();
        $('#vidplayer').attr('src', '');
        $('.commentpage').attr('src', '');
        count = 0;
    });

    $(".radio").click(function () {
        if($("#toggle").hasClass("on") === true) {
            //$(".icon").html("✗");
            $("#toggle").attr("class", "radio off");
        } else {
            //$(".icon").html("✓");
            $("#toggle").attr("class", "radio on");
        }
    });


    $('#toggle').on('click', function () {
        if($('#toggle').hasClass("on") === true) {
            comments = "on";
            $('.commentpage').show();
            $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
            $('#terug').addClass('terugsplit').removeClass('terugfull');
        } else {
            comments = "off";
            $('.commentpage').hide();
            $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
            $('#terug').addClass('terugfull').removeClass('terugsplit');
        }
        $.post("ajax.php", {'status': 'commentToggle', 'val': comments});
    });

    $(document).ready(function () {
        setTimeout(function () {
            $.post("ajax.php", {'status': 'checkToggleState'}).done(function (data) {
                if(data == "on") {
                    comments = "on";
                    $("#toggle").attr("class", "radio on");
                    $('.commentpage').show();
                    $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
                    $('#terug').addClass('terugsplit').removeClass('terugfull');
                } else {
                    comments = "off";
                    $("#toggle").attr("class", "radio off");
                    $('.commentpage').hide();
                    $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
                    $('#terug').addClass('terugfull').removeClass('terugsplit');
                }
            });
        }, 250);
    });

</script>


</body>
</html>