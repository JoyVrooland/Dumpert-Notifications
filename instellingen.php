<!doctype html>
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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="push.js"></script>
</head>
<!-- Cookie Consent by https://PrivacyPolicies.com -->
<script type="text/javascript" src="//www.PrivacyPolicies.com/cookie-consent/releases/3.0.0/cookie-consent.js"></script>
<script type="text/javascript">
    document.addEventListener('DOMContentLoaded', function () {
        cookieconsent.run({"notice_banner_type":"headline","consent_type":"implied","palette":"light","change_preferences_selector":"#changePreferences","language":"en","website_name":"Dumpert Notifications"});
    });
</script>

<noscript><a href="https://www.privacypolicies.com/cookie-consent/">Cookie Consent by Privacy Policies Generator</a></noscript>
<!-- End Cookie Consent -->

<style>
    :root{
        --main-bg-color: #ffffff;
        --dumpthumb: #272727;
        --dumpthumb-font: #8f8f8f;
        --dumpthumb-disc: #000000;
        --dumpthumb-h1: #000000;
        --dumpthumb-border: #e6e6e6;
        --toggle-font-color: #000000;
        --radio-border: #469d1c;
        --radio-background: #168d09;
        --radio-background2: #5bcf24;
    }
    .nightmode{
        --main-bg-color: #191919;
        --dumpthumb: #272727;
        --dumpthumb-font: #8f8f8f;
        --dumpthumb-disc: #656565;
        --dumpthumb-h1: #ffffff;
        --dumpthumb-border: #464646;
        --toggle-font-color: #ffffff;
        --radio-border: #318194;
        --radio-background: #53b8d0;
        --radio-background2: #3a889a;
    }
    .notrans{
        -webkit-transition: all 0s linear;
        -moz-transition: all 0s linear;
        -o-transition: all 0s linear;
        transition: all 0s linear;
    }
    .lijst{
        margin-top: 40px;
    }
    body{
        background-color: var(--main-bg-color);
        margin-top: -10px;
        padding-top: 10px;
        -webkit-transition: all .2s linear;
        -moz-transition: all .2s linear;
        -o-transition: all .2s linear;
        transition: all .2s linear;
    }
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
        background: #fff;
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
    .dumpertpicplayer{
        display: table-cell;
        vertical-align:middle;
        background: #000;
        border: none;
        top: 0; right: 0;
        bottom: 0; left: 0;
        height: 50%;
        z-index: -1;
        position: fixed;
    }
    .dumpertpicplayerfull{
        display: table-cell;
        vertical-align:middle;
        background: #000;
        border: none;
        top: 0; right: 0;
        bottom: 0; left: 0;
        height: 100%;
        z-index: -1;
        position: fixed;
    }
    #picplayer{
        margin: 0px auto;
        display: flex;
        justify-content: center;
        height: 100%;
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
        bottom: 9px;
        left: 50%;
        margin-left: -33px;
        color: white;
        display: none;
    }
    .terugsplit{
        width: 91px;
        height: 30px;
        position: absolute;
        bottom: 51%;
        left: 50%;
        margin-left: -33px;
        color: white;
        display: none;
    }
    .terug {
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
        position: relative;
        bottom: 5px;
        margin-left: 10px;
        z-index: 10000;
        width: 20px;
        cursor: pointer;
    }
    .fa-comments{
        position: relative;
        bottom: 2px;
        margin-left: 10px;
        z-index: 10000;
        width: 20px;
        cursor: pointer;
        font-size: 18px;
    }

    .fas fa-angle-down{
        position: relative;
        bottom: 2px;
        margin-left: 10px;
        z-index: 10000;
        width: 20px;
        cursor: pointer;
        font-size: 18px;
    }

    a.dumpthumb .details {
        position: absolute;
        left: 118px;
        top: 9px;
        width: 65%;
        word-wrap: break-word;
        font-size: 0.76923em;
        color: var(--dumpthumb-font);
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
        border: 1px solid var(--dumpthumb-border);
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
        color: var(--dumpthumb-h1);
    }
    a.dumpthumb .details date, a.dumpthumb .details .stats {
        font-size: 1em;
        color: var(--dumpthumb-font);
        z-index: 10000
    }
    a.dumpthumb span.video {
        background-position: -184px -38px;
    }
    a.dumpthumb p {
        margin: 0;
    }
    a.dumpthumb .details .description {
        margin-top: 3px;
        font-size: 1.2em;
        color: var(--dumpthumb-disc);
    }
    a.dumpthumb .details date, a.dumpthumb .details .stats {
        font-size: 1em;
        color: #8f8f8f;
    }
    a.dumpthumb span.foto, a.dumpthumb span.video {
        position: absolute;
        display: block;
        left: 85px;
        top: 89px;
        width: 20px;
        height: 20px;
        width: 18px;
        height: 15px;
        background-position: -129px -38px;
        opacity: 0.2;
    }
    a.dumpthumb span.video {
        background-position: -184px -38px;
    }
    .allsprites-sprite, a.dumpthumb span.foto, a.dumpthumb span.video, .header .dump-lgo, .header .dump-srv .nsfw, .header .dump-srv .nsfw.on, .pagination li a span, .pagination li.volgende a span, .dump-mail, .dump-embed, .dump-enhance, .dump-mut a, .dump-mut .dump-bad, .dump-wgt > a > .dump-amt:before, .dump-wgt .dump-tweet > span:first-child:before, .dump-wgt .dump-like > span:first-child:before, .dump-wgt .dump-share > span:first-child:before, #comments article footer .baby, #comments article footer a.modmark, #comments article footer a.modmark:hover, #comments article footer a.modmark.m, #comments article footer a.modmark.m:hover, #comments article footer .nsb, #comments article footer .nsb:hover, .mob-headlines li.gs .logo, .mob-headlines li.dk .logo, .mob-headlines li.uc .logo, .mob-headlines li.ab .logo, .dump-mnu, .mobnav .dump-vid span, .mobnav .dump-img span, .mobnav .dump-top span, .mobnav .dump-themas span, .mobnav .dump-view span, .mobnav .dump-dump span, .dump-soc .dump-app .dump-fb, .dump-soc .dump-app .dump-tw, .dump-soc .dump-app .dump-send, .dump-soc .dump-app .dump-wa {
        background-image: url(allsprites-s6c30d074dd.png);
        background-repeat: no-repeat;
    }

    #nav{
        position: fixed;
        z-index: 20;
        background: var(--main-bg-color);
        width: 100%;
        -webkit-transition: all .22s linear;
        -moz-transition: all .22s linear;
        -o-transition: all .22s linear;
        transition: all .22s linear;
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
        width: 370px;
        margin: 0 auto;
        margin-top: 10px;
        margin-bottom: 6px;
    }
    .labelnight {
        margin-left: 15px !important;
    }
    .label {
        display:inline-block;
        position:relative;
        top:-6px;
        height:20px;
        padding:0;
        margin:0 5px 0 0;
        margin-right:5px;
        color: var(--toggle-font-color);
        font-weight: bold;
    }
    .radio {
        display:inline-block;
        width:43px;
        height:20px;
        border-radius:10px;
        position: relative;
        zoom: 1.4;
        -moz-transform: scale(1.4);
        margin-top: -1px;
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
        /*content:"";*/
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
        border:1px solid #168d09;
        background: var(--radio-background); /* Old browsers */
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
        color: var(--dumpthumb-font);
    }

    .commenton{
        color: #5bcf24;
    }
    .commentoff{
        color: white;
    }
    .cc_css_reboot {
        position: fixed !important;
    }

    /* --------instellingen--------*/
    .instellingpopup{
        background: #191919;
        height: 100vh;
        color: #fff;
        font-weight: bold;
        min-width: 330px;
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
    }

    .instellingen{
        text-align: center;
        padding: 10px;
    }
    .instellingen > span{
        font-weight: bold;
        text-transform: uppercase;
        font-size: 1.5em;
    }
    .instellingen > i{
        font-weight: bold;
        text-transform: uppercase;
        font-size: 2em;
        margin-left: 10px;
        position: relative;
        cursor: pointer;
    }
    .closesettings{
        float: left;
    }
    .instellingsection{
        padding: 6px 20px 6px 20px;
        background-color: #353535;
        width: 100%;
        position: relative;
        text-transform: uppercase;
        font-weight: bold;
        color: #969696;
    }
    .knopveld{
        padding: 20px;
        border:1px solid #353535;
        margin-bottom: -1px;
        border-left: 0px;
        border-right: 0px;
        cursor: pointer;
    }
    .knopveld.on > i{
        display: block;
        color: #5bcf24;
    }
    .knopveld.off > i{
        display: none;
    }
    .radio, .radio2{
        float: right;
    }

    .radio2{
        font-size: 32px;
        margin-top: -4px;
        color: #5bcf24;
    }
    .on{
        color: white;
    }
    .off{
        color: gray;
    }
    .versie{
        text-align: center;
        color: gray;
        bottom: 0;
        position: absolute;
        left: 0;
        right: 0;
    }

</style>
<body>
<div class="instellingpopup">
<nav class="instellingen">
    <i class="closesettings fa fa-close"></i>
    <span>Instellingen</span>
</nav>
<div class="instellingsection">Voorkeuren</div>
    <div class="knopveld on commentsknop">
        <span class="knoptitel">Dumpert comments</span>
        <div id="toggle" class="radio off">
            <div class="icon"></div>
            <div class="switch"></div>
        </div>
    </div>
    <div class="knopveld on nightmodeknop">
        <span class="knoptitel">Nightmode</span>
        <div id="nightmode" class="radio off">
            <div class="icon"></div>
            <div class="switch"></div>
        </div>
    </div>
<div class="instellingsection">Filter</div>
    <div id="alles" class="knopveld off">
        <span class="knoptitel">Alles</span>
        <i class="material-icons radio2 on" style="font-size:36px">check</i>
    </div>
    <div id="alleenfilmpjes" class="knopveld off">
        <span class="knoptitel">Alleen filmpjes</span>
        <i class="material-icons radio2 on" style="font-size:36px">check</i>
    </div>
    <div id="alleenplaatjes" class="knopveld off">
        <span class="knoptitel">Alleen plaatjes</span>
        <i class="material-icons radio2 on" style="font-size:36px">check</i>
    </div>
    <div class="versie"></div>
</div>
</body>
<script>
    var link = window.location.search;
    var nowactive = '';
    var count = 0;
    var comments = "off";
    var nightmode = "off";
    var thumbtype = '';
    var versie = 'v1.0.4';

    if(link === "?run"){
        window.open('instellingen.php','Dumpert Notifications','width=400,height=500,resizable=1');
    }else if(link === "?running"){
        $('.notrunning').remove();
        $('.wrapper').show();
    }else{
        $('.lijst').remove();
    }
    function updatefoto(site) {
        $.post("dumpertfotos.php", {'site': site}).done(function (data) {
            // console.log(data);
            $('#picplayer').attr('src', data);
            $('#piclink').attr('href', data);
        })
    }
    function updatecomment(site) {
        $.post("dumpertcomments.php", {'site': site}).done(function (data) {
            $('.commentpage').attr('src', data);
        })
    }

    function updatelist() {
        $.post("dumpertmelding.php", {}).done(function (data) {
            $(".lijst").html(data);
            $('#comtoggle').on('click', function () {
                if($('#comtoggle').hasClass("commenton") === true) {
                    comments = "off";
                    $('.commentpage').hide();
                    $('#toggle').addClass('off').removeClass('on');
                    $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
                    $('#terug').addClass('terugfull').removeClass('terugsplit');
                    $('#comtoggle').addClass('commentoff').removeClass('commenton').attr('title', 'Schakel de comments in');
                    $('#picframe').addClass('dumpertpicplayerfull').removeClass('dumpertpicplayer');
                    window.resizeTo(800,500);
                }else {
                    comments = "on";
                    $('.commentpage').show();
                    $('#toggle').addClass('on').removeClass('off');
                    $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
                    $('#terug').addClass('terugsplit').removeClass('terugfull');
                    $('#comtoggle').addClass('commenton').removeClass('commentoff').attr('title', 'Schakel de comments uit');
                    $('#picframe').addClass('dumpertpicplayer').removeClass('dumpertpicplayerfull');
                    window.resizeTo(800,935);

                }
                $.post("ajax.php", {'status': 'commentToggle', 'val': comments});
            });
            $('.linkbtn').click(function () {
                var id = this.id;
                var val = $('#link' + id).text();
                var site = $('#info' + id).text();
                nowactive = id;

                if($('#thumb' + nowactive).hasClass('foto') === true){
                    updatefoto(site);
                    $('#vidplayer').hide();
                    $('#picframe').show();
                }else{
                    $('#picframe').hide();
                    $('#vidplayer').show();
                    $('#vidplayer').attr('src', val);
                }
                $('.framelist').show();
                $('.wrapper ').hide();
                $('.lijst').hide();
                updatecomment(site);
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
    }, 1000000);

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

    $('#vidplayer , #terug, .dumpertpicplayer').hover(function () {
        $('#terug').stop().fadeIn();
    });

    $("#vidplayer, #terug, .dumpertpicplayer").mouseleave(function() {
        $('#terug').stop().fadeOut();
    });

    $(".fa-angle-down").click(function () {
        // window.resizeTo(400,480);
        $('.lijst').show();
        $('.wrapper ').show();
        $('.framelist').hide();
        $('#vidplayer').attr('src', '');
        $('.commentpage').attr('src', '');
        $('#picplayer').attr('src', '');
        $('#piclink').attr('href', '');
        count = 0;
    });


    $(".nightmodeknop").click(function () {
        if($("#nightmode").hasClass("on") === true) {
            nightmode = "off";
            $("#nightmode").attr("class", "radio off");
            $("body").attr("class", "");
        } else {
            nightmode = "on";
            $("#nightmode").attr("class", "radio on");
            $("body").attr("class", "nightmode");
        }
        $.post("ajax.php", {'status': 'nightmodeToggle', 'val': nightmode}).done(function (data) {
        });
    });


    $('.commentsknop').on('click', function () {
        if($('#toggle').hasClass("on") === true) {
            comments = "off";
            $('.commentpage').hide();
            $('#toggle').addClass('off').removeClass('on');
            $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
            $('#terug').addClass('terugfull').removeClass('terugsplit');
            $('#comtoggle').addClass('commentoff').removeClass('commenton').attr('title', 'Schakel de comments in');
            $('#picframe').addClass('dumpertpicplayerfull').removeClass('dumpertpicplayer');
        }else {
            comments = "on";
            $('.commentpage').show();
            $('#toggle').addClass('on').removeClass('off');
            $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
            $('#terug').addClass('terugsplit').removeClass('terugfull');
            $('#comtoggle').addClass('commenton').removeClass('commentoff').attr('title', 'Schakel de comments uit');
            $('#picframe').addClass('dumpertpicplayer').removeClass('dumpertpicplayerfull');

        }
        $.post("ajax.php", {'status': 'commentToggle', 'val': comments}).done(function () {
        });
        console.log(comments);
        $.post("ajax.php", {'status': 'commentToggle', 'val': comments}).done(function () {
        });
    });












    $(document).ready(function () {

        $('.versie').html(versie);
        var cookies = $(".cc_dialog");

        if ( cookies.length){
            alert('ja');
            $('.ctabtn').attr("disabled", true);
            $('button[class=ctabtn]').css( 'cursor', 'not-allowed' );

            $('.cc_b_ok').on('click', function () {
                $('.ctabtn').attr("disabled", false);
                $('button[class=ctabtn]').css( 'cursor', 'pointer' );
            })
        }

        setTimeout(function () {
            $.post("ajax.php", {'status': 'checkToggleState'}).done(function (data) {
                if(data == "on") {
                    comments = "on";
                    $("#toggle").attr("class", "radio on");
                    $('.commentpage').show();
                    $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
                    $('#terug').addClass('terugsplit').removeClass('terugfull');
                    $('#picframe').addClass('dumpertpicplayer').removeClass('dumpertpicplayerfull');
                    $('#comtoggle').addClass('commenton').removeClass('commentoff').attr('title', 'Schakel de comments uit');
                } else {
                    comments = "off";
                    $("#toggle").attr("class", "radio off");
                    $('.commentpage').hide();
                    $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
                    $('#terug').addClass('terugfull').removeClass('terugsplit');
                    $('#picframe').addClass('dumpertpicplayerfull').removeClass('dumpertpicplayer').attr('title', 'Schakel de comments in');
                    $('#comtoggle').addClass('commentoff').removeClass('commenton').attr('title', 'Schakel de comments in');
                }
            });
        }, 250);
        $.post("ajax.php", {'status': 'checkNightmodeState'}).done(function (data) {
            if(data == "on") {
                nightmode = "on";
                $("#nightmode").attr("class", "radio on");
                $("body").attr("class", "notrans nightmode");
                setTimeout(function () {
                    $("body").attr("class", "nightmode");
                },500)
            } else {
                nightmode = "off";
                $("#nightmode").attr("class", "radio off");
                $("body").attr("class", "");
            }
        });
    });

</script>

</html>