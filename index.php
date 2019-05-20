<?php session_start();
if(empty($_SESSION)){
    $_SESSION['nsfw'] = "deleted";
}
?>
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
    <link rel='stylesheet' href='https://use.fontawesome.com/releases/v5.7.0/css/all.css' integrity='sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ' crossorigin='anonymous'>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/1.17.1/simple-lightbox.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simplelightbox/1.17.1/simplelightbox.css" />
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
        --search-bg: #ededed;
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
        --search-bg: #191919;
    }
    .notrans{
        -webkit-transition: all 0s linear;
        -moz-transition: all 0s linear;
        -o-transition: all 0s linear;
        transition: all 0s linear;
    }
    .lijst{
        margin-top: 50px;
    }
    @font-face {
        font-family: dumpertfont;
        src: url(fonts/Nimbus-Sans-D-OT-Black_32742.ttf);
    }

    @font-face {
        font-family: dumpertfont;
        src: url(fonts/NimbusSanL-Bol.otf);
        font-weight: bold;
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
        /*overflow-y: hidden !important;*/
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
        /*overflow-y: hidden !important;*/
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
        -html-user-select: none; /* Konqueror HTML */
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
        text-shadow: 0px 1px 3px #272634;
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
        opacity: 0.5;
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
        z-index: 100;
        background: var(--main-bg-color);
        width: 100%;
        /*-webkit-transition: all .22s linear;*/
        /*-moz-transition: all .22s linear;*/
        /*-o-transition: all .22s linear;*/
        /*transition: all .22s linear;*/
        text-align: center;
        height: 48px;
        display:none;
    }
    #nav > .navinhoud > img{
        float: left;
        width: 40px;
        margin: 5px;
        cursor: pointer;
        margin-right: -45px;
    }
    #nav > .navinhoud > p{
        font-size: 2em;
        text-transform: uppercase;
        font-family: dumpertfont;
        color: var(--dumpthumb-h1);
    }
    .mainnav{
        box-shadow: var(--main-bg-color) 0px -13px 9px 20px;
    }
    .navinhoud{
        background: var(--main-bg-color);
        height: 40px;
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
    .fa-angle-down{
        text-shadow: 0px 1px 3px #272634;
    }

    /* --------searchpage-------*/
    .zoeken{
        color: var(--dumpthumb-h1);
        font-size: 25px;
        position: absolute;
        right: 20px;
        top: 12px;
        cursor: pointer;
    }
    .searchpage{
        background: var(--search-bg);
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
        /*overflow-y: scroll;*/
        margin-top: 50px;
        z-index: 100000;
    }
    .zoekbalk > p{
        float: right;
        font-size: 1.4em !important;
    }
    .zoekblok {
        /* background-color: white; */
        /* padding: 5px; */
        display: table;
        width: 100%;
        /* border-radius: 6px; */
        position: absolute;
        top: 0;
    }
    .zoekplaceholder{
        color: darkgray;
        font-size: 17px;
        right: -6px;
        /* top: 12px; */
        cursor: pointer;
        line-height: inherit;
        margin-right: 10px;
        margin-left: 2px;
        position: relative;
    }
    .zoekbar{
        display: table-cell;
        width: 98%;
        border: none;
        margin-left: 10px;
    }
    .zoekbg {
        background: white;
        display: table;
        width: 100%;
        padding: 5px;
        border-radius: 5px;
        margin-left: 5px;
    }
    .zoekterug{
        color: var(--dumpthumb-h1);
        font-family: dumpertfont;
        text-transform: uppercase;
        font-size: 1.3em;
        padding: 8px;
        padding-left: 15px;
        cursor: pointer;
        -webkit-touch-callout: none; /* iOS Safari */
        -webkit-user-select: none; /* Safari */
        -khtml-user-select: none; /* Konqueror HTML */
        -moz-user-select: none; /* Firefox */
        -ms-user-select: none; /* Internet Explorer/Edge */
        user-select: none; /* Non-prefixed version, currently
                                  supported by Chrome and Opera */
    }

    textarea, select, input, button { outline: none; }

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
        display: none;
        position: fixed;
        width: 100%;
        z-index: 1000;
    }

    .instellingen{
        text-align: center;
        padding: 2px;
        margin-bottom: -16px;
    }
    .instellingen > p{
        font-weight: bold;
        text-transform: uppercase;
        font-size: 1.8em;
        font-family: dumpertfont;
    }
    .instellingen > i{
        font-weight: bold;
        text-transform: uppercase;
        font-size: 2em;
        margin-left: 15px;
        position: relative;
        cursor: pointer;
        margin-top: 6px;
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
    .imglist{
        width: auto;
        height: 150px;
    }
    #picframe{
        overflow-y: scroll;
    }
    .zoekpreload {
        display: none;
        z-index: 1000;
        height: 70px;
        width: 70px !important;
        position: fixed;
        left: 0;
        right: 0;
        bottom: 50%;
        width: 30px;
        margin: 0 auto;
    }
    /* preload designs */
    @keyframes clockwise {
        to {
            transform: rotate(360deg) translatez(0);
        }
    }
    @keyframes counter-clockwise {
        to {
            transform: rotate(-360deg) translatez(0);
        }
    }
    @keyframes bounce {
        50% {
            transform: translatey(-20px);
        }
        100% {
            transform: translatey(20px);
        }
    }
    @keyframes zoom {
        to {
            width: calc(250px + 20px);
            margin-left: calc(-125px - 10px);
            margin-top: calc(-125px - 10px);
            border-width: 10px;
            border-color: white;
        }
    }
    @keyframes follow {
        0% {
            transform: translatex(-45px);
        }
        100% {
            transform: translatex(60px);
        }
    }
    .magic {
        background-color: transparent;
        width: 10px;
        height: 10px;
        border-radius: 100%;
        box-shadow: 12px -12px 0 rgba(255, 255, 255, 0.125), 17px 0 0 -1px rgba(255, 255, 255, 0.25), 12px 12px 0 -2px rgba(255, 255, 255, 0.375), 0 17px 0 -3px rgba(255, 255, 255, 0.5), -12px 12px 0 -4px rgba(255, 255, 255, 0.625), -17px 0 0 -5px rgba(255, 255, 255, 0.75), -12px -12px 0 -6px rgba(255, 255, 255, 0.875), 0 -17px 0 -7px white;
        animation: clockwise 0.75s steps(8, end) infinite;
    }

    .spin {
        background-color: transparent;
        width: 10px;
        height: 10px;
        border-radius: 100%;
        box-shadow: 12px -12px rgba(255, 255, 255, 0.125), 17px 0 rgba(255, 255, 255, 0.25), 12px 12px rgba(255, 255, 255, 0.375), 0 17px rgba(255, 255, 255, 0.5), -12px 12px rgba(255, 255, 255, 0.625), -17px 0 rgba(255, 255, 255, 0.75), -12px -12px rgba(255, 255, 255, 0.875), 0 -17px white;
        animation: clockwise 0.75s steps(8, end) infinite;
    }

    .one {
        height: 50px;
        width: 50px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent transparent rgba(255, 255, 255, 0.5);
        border-radius: 100%;
        animation: clockwise 0.35s linear infinite;
    }

    .multi {
        height: 50px;
        width: 50px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent rgba(255, 255, 255, 0.25) transparent rgba(255, 255, 255, 0.5);
        border-radius: 100%;
        animation: clockwise 1.01s linear infinite;
    }

    .multi:after {
        position: absolute;
        display: block;
        top: 5px;
        right: 5px;
        height: 30px;
        width: 30px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(255, 255, 255, 0.5) transparent transparent;
        border-radius: 100%;
    }

    .multi div {
        position: relative;
        height: 40px;
        width: 40px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(255, 255, 255, 0.25) transparent rgba(255, 255, 255, 0.5);
        border-radius: 100%;
        animation: counter-clockwise 0.49s linear infinite;
    }

    .multi div:after {
        position: absolute;
        display: block;
        top: 0;
        right: 0;
        height: 30px;
        width: 30px;
        border-width: 5px;
        border-style: solid;
        border-color: transparent transparent rgba(255, 255, 255, 0.25);
        border-radius: 100%;
    }

    /* This preloader will eventually use an SVG conical gradient; conical gradients will be available in SVG2. For now, we must use an image. */
    .conical {
        background-image: url("loader.png");
        background-position: 50%;
        background-size: cover;
        width: 70px;
        height: 70px;
        border-radius: 100%;
        -webkit-mask: radial-gradient(circle closest-side, rgba(0, 0, 0, 0), rgba(0, 0, 0, 0) 84%, black 86%, black 100%) no-repeat 50% border;
        animation: clockwise 0.75s ease-in-out infinite;
    }

    .bounce div {
        border-radius: 100%;
        height: 10px;
        width: 10px;
        background-color: white;
        animation: bounce 1s ease-in-out infinite;
        position: absolute;
        top: 0;
        transform: translatey(20px);
    }

    .bounce div:first-of-type {
        left: -20px;
        animation-delay: 0.20s;
    }

    .bounce div:nth-of-type(2) {
        animation-delay: 0.10s;
    }

    .bounce div:last-of-type {
        left: 20px;
    }

    .ios {
        width: 0;
        height: 0;
        animation: clockwise 1s steps(8, end) infinite;
    }

    .ios div {
        width: 6px;
        height: 40px;
        margin-top: calc(-40px/2);
        margin-left: calc(-6px/2);
        position: absolute;
    }

    .ios div:before,
    .ios div:after {
        background-color: rgba(255, 255, 255, 0.2);
        display: block;
        position: absolute;
        width: 100%;
        height: 25%;
    }

    .ios div:before {
        border-radius: 6px 6px 0 0;
        top: 0;
    }

    .ios div:after {
        border-radius: 0 0 6px 6px;
        bottom: 0;
    }

    .ios div:nth-of-type(1):after {
        background-color: rgba(255, 255, 255, 0.625);
    }

    .ios div:nth-of-type(2) {
        transform: rotate(45deg) translatez(0);
    }

    .ios div:nth-of-type(2):after {
        background-color: rgba(255, 255, 255, 0.75);
    }

    .ios div:nth-of-type(3) {
        transform: rotate(90deg) translatez(0);
    }

    .ios div:nth-of-type(3):after {
        background-color: rgba(255, 255, 255, 0.875);
    }

    .ios div:nth-of-type(4) {
        transform: rotate(135deg) translatez(0);
    }

    .ios div:nth-of-type(4):after {
        background-color: white;
    }

    .two {
        height: 50px;
        width: 50px;
        border-width: 5px;
        border-style: solid;
        border-color: rgba(255, 255, 255, 0.75) rgba(255, 255, 255, 0.75) rgba(255, 255, 255, 0.25) rgba(255, 255, 255, 0.25);
        border-radius: 100%;
        animation: clockwise .5s linear infinite;
    }

    .portal {
        width: 100%;
        height: 100%;
        display: flex;
        justify-content: center;
    }

    .portal > div {
        position: relative;
        width: 0;
        height: 0;
        align-self: center;
    }

    .portal > div > div {
        position: absolute;
        width: 0;
        align-self: center;
        border-width: 0;
        border-style: solid;
        border-color: rgba(255, 255, 255, 0);
        border-radius: 50%;
        animation: zoom 1s ease-in infinite;
    }

    .portal > div > div:after {
        display: block;
        padding-top: 100%;
    }

    .portal > div > div:nth-of-type(2) {
        animation-delay: 0.33s;
    }

    .portal > div > div:nth-of-type(3) {
        animation-delay: 0.67s;
    }

    .follow {
        width: 80px;
        display: flex;
        justify-content: center;
        overflow: hidden;
    }

    .follow div {
        align-self: center;
        width: 10px;
        height: 20px;
        padding: 2px;
        background-color: rgba(0, 0, 0, 0.3);
        box-shadow: -15px 0 0 rgba(0, 0, 0, 0.3), -30px 0 0 rgba(0, 0, 0, 0.3), 15px 0 0 rgba(0, 0, 0, 0.3), 30px 0 0 rgba(0, 0, 0, 0.3);
    }

    .follow div > div {
        position: relative;
        width: 100%;
        height: 100%;
        background-color: white;
        box-shadow: -15px 0 0 white, 15px 0 0 white;
        animation: follow 1s steps(7, end) infinite;
    }

    .clearinput{
        display: table-cell;
        width: 16px;
        float: right;
        margin-top: -21px;
        position: sticky;
        margin-right: 4px;
        opacity: 0.3;
        filter: grayscale(100%);
        -webkit-filter: grayscale(100%);
        display: none;
    }
    /**,*/
    /**:before,*/
    /**:after {*/
    /*    box-sizing: border-box;*/
    /*}*/

    /**:before, *:after {*/
    /*    content: '';*/
    /*}*/

</style>
<body>
<div class="notrunning">
    <div class="content">
        <img src="fav.png" width="300px">
        <center>
            <button class="ctabtn" onclick="opstarten()">Start de applicatie</button>
            <span class="version">© Dumpert Notifications - v</span>
        </center>
    </div>
</div>
<div class="instellingpopup">
    <nav class="instellingen">
        <i class="closesettings fa fa-close"></i>
        <p>Instellingen</p>
    </nav>
    <div class="instellingsection">Voorkeuren</div>
    <div class="knopveld off commentsknop">
        <span class="knoptitel">Dumpert comments</span>
        <div id="toggle" class="radio off">
            <div class="icon"></div>
            <div class="switch"></div>
        </div>
    </div>
    <div class="knopveld off nightmodeknop">
        <span class="knoptitel">Nightmode</span>
        <div id="nightmode" class="radio off">
            <div class="icon"></div>
            <div class="switch"></div>
        </div>
    </div>
    <div class="knopveld off nsfwknop">
        <span class="knoptitel">NSFW</span>
        <div id="nsfw" class="radio off">
            <div class="icon"></div>
            <div class="switch"></div>
        </div>
    </div>
    <div class="instellingsection">Filter</div>
    <div id="alles" class="knopveld on">
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
<div id="nav">
    <div class="navinhoud mainnav">
        <img class="settingstoggle" src="menu.png">
        <img class="settingstoggle" style="display:none" src="menunight.png">
        <i class="zoeken fa fa-search" aria-hidden="true"></i>
        <p>Dumpert</p>
    </div>
    <div class="navinhoud zoekblok" style="display: none">
        <div class="zoekbg" style="">
            <i class="zoekplaceholder fa fa-search" aria-hidden="true" style="display: table-cell; width:1px;"></i>
            <input class="zoekbar" type="text" placeholder="Typ hier je trefwoord" style="display:table-cell;">
            <img src="error.svg" class="clearinput">
        </div>
        <label class="zoekterug" for="MyInput" style="display:table-cell; width:1px">terug</label>
    </div>
</div>
<div class="zoekpreload">
    <div class="conical">
        <div></div>
        <div></div>
        <div></div>
    </div>
</div>
<div id="searchpage" class="searchpage" style="display: none">
</div>
<div class="lijst">
</div>
<div class="framelist">
        <div id="terug" class="terug">
            <div class="menubar">
            <i id="lijstterug" title="Terug naar het menu" class="fas fa-angle-down" style="font-size:26px"></i>
            <i id="searchterug" title="Terug naar het menu" class="fas fa-angle-down" style="font-size:26px; display: none;"></i>
            <img class="info" src="fav.png" width="36px">
            <i id="comtoggle" title="" class='fas fa-comments'></i>
        </div>
    </div>
    <iframe id="vidplayer" src="" width="100%" height="500px" class="fullplayer" allowfullscreen></iframe>
    <div id="picframe" class="dumpertpicplayer hidden">
        <a id="piclink" href="" target="_blank" title="volledige grote"><img id="picplayer" src="" class="hidden"></a>
        <div class="imageGallery">
        </div>
    </div>
    <iframe src="" width="100%" height="500px" class="commentpage" style="display: none;"></iframe>
</div>
<script>
    var link = window.location.search;
    var nowactive = '';
    var count = 0;
    var nsfw = "deleted";
    var comments = "off";
    var nightmode = "off";
    var thumbtype = '';
    var filter = 'alles';
    var xsize = 800;
    var ysize = 1000;
    var scrolltop = 0;
    var searchpage = 1;
    var lijstpage = 1;
    var searchpageupdate = 0;
    var lastsearchid = 0;

    var versie = '1.0.8';

    if(link === "?run"){
        window.open('index.php?running','Dumpert Notifications','width=800,height=1000,resizable=1');
    }else if(link === "?running"){
        $('.notrunning').remove();
        $('.wrapper').show();
        $('#nav').show();
    }else{
        $('.lijst').remove();
        $('#nav').remove();
    }

    function setCookie(cname, cvalue, exdays) {
        var d = new Date();
        d.setTime(d.getTime() + (exdays*24*60*60*1000));
        var expires = "expires="+ d.toUTCString();
        document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
    }

    function getCookie(cname) {
        var name = cname + "=";
        var decodedCookie = decodeURIComponent(document.cookie);
        var ca = decodedCookie.split(';');
        for(var i = 0; i <ca.length; i++) {
            var c = ca[i];
            while (c.charAt(0) == ' ') {
                c = c.substring(1);
            }
            if (c.indexOf(name) == 0) {
                return c.substring(name.length, c.length);
            }
        }
        return "";
    }

    function updatefoto(site) {
        $.post("dumpertfotos.php", {'site': site}).done(function (data) {
            $('.imageGallery').html(data);
            $('#picplayer').attr('src', data);
            $('#piclink').attr('href', data);
            // or if using jQuery
            $('.imageGallery a').simpleLightbox();
        })
    }
    function updatecomment(site) {
        $.post("dumpertcomments.php", {'site': site}).done(function (data) {
            $('.commentpage').attr('src', data);
        })
    }

    function search(key) {
        searchpageupdate = 1;
        $.post("search.php", {'filter': key, 'nsfw': nsfw, 'page': searchpage, 'lastsearchid': lastsearchid}).done(function (data) {
            lastsearchid = lastsearchid + 15;
            searchpageupdate = 0;
            $('.zoekpreload').hide();
            $(".searchpage").append(data);
            $('.linkbtn').click(function () {
                $('#lijstterug').hide();
                var id = this.id;
                var val = $('#link' + id).text();
                var site = $('#info' + id).text();
                nowactive = id;

                if($('#thumb' + nowactive).hasClass('foto') === true){
                    updatefoto(site);
                    $('#vidplayer').hide();
                    $('#picframe').show();
                    $('#searchterug').show();
                }else{
                    $('#picframe').hide();
                    $('#vidplayer').show();
                    $('#vidplayer').attr('src', val);
                    $('#searchterug').show();
                }
                $('.framelist').show();
                $('.wrapper ').hide();
                $('.searchpage').hide();
                $('.lijst').hide();
                $('#nav').hide();
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
    }, 30000);

    function updatelist(melding) {
        if (melding == null){
            melding = '';
        }
        $.post("dumpertmelding2.php", {'filter': filter, 'silent': melding, 'nsfw': nsfw}).done(function (data) {
            $(".lijst").html(data);
            $('.linkbtn').click(function () {
                $('#searchterug').hide();
                $('#lijstterug').show();
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
                $('#nav').hide();
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


    function opstarten(){
        // var status = "off";
        // if($( "#toggle" ).hasClass( "on" ) == true){
        //     status = "on";
        // }else{
        //     status = "off";
        // }
        // $.post("ajax.php", {'status': 'commentToggle', 'val': status});
        window.open('index.php?running','Dumpert Notifications','width=800,height=1000,resizable=1');
    }

    function popmelding(melding) {
        if(melding !== "silent"){
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
    }

    $('#vidplayer , #terug, .dumpertpicplayer').hover(function () {
        $('#terug').stop().fadeIn();
    });

    $("#vidplayer, #terug, .dumpertpicplayer").mouseleave(function() {
        $('#terug').stop().fadeOut();
    });

    $("#lijstterug").click(function () {
        window.resizeTo(xsize,ysize);
        $('.lijst').show();
        $('.wrapper ').show();
        $('#nav').show();
        $('.framelist').hide();
        $(window).scrollTop(scrolltop);
        $('#vidplayer').attr('src', '');
        $('.commentpage').attr('src', '');
        $('#picplayer').attr('src', '');
        $('#piclink').attr('href', '');
        $('.imageGallery').html('');
        count = 0;
    });

    $('#searchterug').click(function () {
        window.resizeTo(xsize,ysize);
        $('.lijst').hide();
        $('.searchpage').show();
        $('.wrapper ').show();
        $('#nav').show();
        $('.framelist').hide();
        $(window).scrollTop(scrolltop);
        $('#vidplayer').attr('src', '');
        $('.commentpage').attr('src', '');
        $('#picplayer').attr('src', '');
        $('#piclink').attr('href', '');
        $('.imageGallery').html('');
        count = 0;
    });

    $(".zoekterug").click(function () {
        $('.zoekblok').stop().toggle( "slide" );
        $('.lijst').stop().fadeIn();
        // $('.searchpage').fadeOut();
        setTimeout(function () {
            $('.zoekbar').val('');
            $('.searchpage').html('');
            $('.clearinput').hide();
        },250);
        $('.zoekbar').focus();
    });

    $(".zoeken ").click(function () {
        $('.zoekblok').stop().toggle( "slide" );
        $('.lijst').stop().fadeOut();
        $('.searchpage').fadeIn();
        $('.zoekbar').focus();
    });

    $('.zoekbar').on('keyup',function(e) {
        if( $(this).val().length !== 0 ) {
            $('.clearinput').show();
        }else{
            $('.clearinput').hide();
        }
        if (e.which == 13) {
            $('.zoekpreload').show();
            $('.searchpage').html('');
            var lastsearch = getCookie('lastsearch');
            var searchkey = $('.zoekbar').val();
            searchpage = 1;
            setCookie('lastsearch', searchkey, 1);
            search(searchkey);
        }
    });

    $('.clearinput').click(function () {
        $('.zoekbar').val('');
        $('.clearinput').hide();
    });
    
    $(".nightmodeknop").click(function () {
        if($("#nightmode").hasClass("on") === true) {
            nightmode = "off";
            setCookie('nightmode', 0, 60);
            $("#nightmode").attr("class", "radio off");
            $(".nightmodeknop").attr("class", "knopveld off nightmodeknop");
            $("body").attr("class", "");
        } else {
            nightmode = "on";
            setCookie('nightmode', 1, 60);
            $("#nightmode").attr("class", "radio on");
            $(".nightmodeknop").attr("class", "knopveld on nightmodeknop");
            $("body").attr("class", "nightmode");
        }
        $(".settingstoggle").toggle();
        $.post("ajax.php", {'status': 'nightmodeToggle', 'val': nightmode}).done(function (data) {
        });
    });

    $(".nsfwknop").click(function () {
        if($("#nsfw").hasClass("on") === true) {
            nsfw = 'deleted';
            setCookie('nsfw', 'deleted', 60);
            $("#nsfw").attr("class", "radio off");
            $(".nsfwknop").attr("class", "knopveld off nsfwknop");
        } else {
            nsfw = '1';
            setCookie('nsfw', 1, 60);
            $("#nsfw").attr("class", "radio on");
            $(".nsfwknop").attr("class", "knopveld on nsfwknop");
        }
        $.post("ajax.php", {'status': 'nsfwToggle', 'val': nsfw}).done(function (data) {
            updatelist('silent');
        });
    });

    $('.commentsknop').on('click', function () {
        if($('#toggle').hasClass("on") === true) {
            comments = "off";
            setCookie('comments', 0, 60);
            $('.commentpage').hide();
            $('#toggle').addClass('off').removeClass('on');
            $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
            $('#terug').addClass('terugfull').removeClass('terugsplit');
            $('#comtoggle').addClass('commentoff').removeClass('commenton').attr('title', 'Schakel de comments in');
            $('#picframe').addClass('dumpertpicplayerfull').removeClass('dumpertpicplayer');
            $(".commentsknop").attr("class", "knopveld off commentsknop");
        }else {
            comments = "on";
            setCookie('comments', 1, 60);
            $('.commentpage').show();
            $('#toggle').addClass('on').removeClass('off');
            $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
            $('#terug').addClass('terugsplit').removeClass('terugfull');
            $('#comtoggle').addClass('commenton').removeClass('commentoff').attr('title', 'Schakel de comments uit');
            $('#picframe').addClass('dumpertpicplayer').removeClass('dumpertpicplayerfull');
            $(".commentsknop").attr("class", "knopveld on commentsknop");
        }
        $.post("ajax.php", {'status': 'commentToggle', 'val': comments}).done(function () {
        });
        console.log(comments);
        $.post("ajax.php", {'status': 'commentToggle', 'val': comments}).done(function () {
        });
    });

    $('.settingstoggle').click(function () {
        $('.instellingpopup').stop().fadeToggle();
        $('.mainnav').stop().fadeToggle();
    });
    $('.closesettings').click(function () {
        $('.instellingpopup').stop().fadeToggle();
        $('.mainnav').stop().fadeToggle();
    });


    $('#comtoggle').on('click', function () {
        if($('#comtoggle').hasClass("commenton") === true) {
            comments = "off";
            setCookie('comments', 0, 60);
            $('.commentpage').hide();
            $('#toggle').addClass('off').removeClass('on');
            $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
            $('#terug').addClass('terugfull').removeClass('terugsplit');
            $('#comtoggle').addClass('commentoff').removeClass('commenton').attr('title', 'Schakel de comments in');
            $('#picframe').addClass('dumpertpicplayerfull').removeClass('dumpertpicplayer');
            $(".commentsknop").attr("class", "knopveld off commentsknop");
            window.resizeTo(800,500);
        }else {
            comments = "on";
            setCookie('comments', 1, 60);
            $('.commentpage').show();
            $('#toggle').addClass('on').removeClass('off');
            $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
            $('#terug').addClass('terugsplit').removeClass('terugfull');
            $('#comtoggle').addClass('commenton').removeClass('commentoff').attr('title', 'Schakel de comments uit');
            $('#picframe').addClass('dumpertpicplayer').removeClass('dumpertpicplayerfull');
            $(".commentsknop").attr("class", "knopveld on commentsknop");
            window.resizeTo(800,935);
        }
        // $.post("ajax.php", {'status': 'commentToggle', 'val': comments});
    });
    //filter sectie

    $('#alles').click(function () {
        $("#alles").attr("class", "knopveld on");
        $("#alleenfilmpjes").attr("class", "knopveld off");
        $("#alleenplaatjes").attr("class", "knopveld off");
        filter = 'alles';
        setCookie('filter', 'alles', 60);
        updatelist('silent');
        // $.post("ajax.php", {'status': 'filterradio', 'val': filter}).done(function () {
        //     updatelist('silent');
        // });
    });
    $('#alleenfilmpjes').click(function () {
        $("#alleenfilmpjes").attr("class", "knopveld on");
        $("#alles").attr("class", "knopveld off");
        $("#alleenplaatjes").attr("class", "knopveld off");
        filter = 'alleenfilmpjes';
        setCookie('filter', 'alleenfilmpjes', 60);
        updatelist('silent');
        // $.post("ajax.php", {'status': 'filterradio', 'val': filter}).done(function () {
        //     updatelist('silent');
        // });
    });
    $('#alleenplaatjes').click(function () {
        $("#alleenplaatjes").attr("class", "knopveld on");
        $("#alleenfilmpjes").attr("class", "knopveld off");
        $("#alles").attr("class", "knopveld off");
        filter = 'alleenplaatjes';
        setCookie('filter', 'alleenplaatjes', 60);
        updatelist('silent');
        // $.post("ajax.php", {'status': 'filterradio', 'val': filter}).done(function () {
        //     updatelist('silent');
        // });
    });

    $(document).ready(function () {
        filterdata = getCookie('filter');
            if(filterdata == "alles") {
                filter = "alles";
                $("#alles").attr("class", "knopveld on");
                $("#alleenfilmpjes").attr("class", "knopveld off");
                $("#alleenplaatjes").attr("class", "knopveld off");
                // $.post("ajax.php", {'status': 'filterradio', 'val': filter});
                updatelist('silent');
            }
            else if(filterdata == "alleenfilmpjes") {
                filter = "alleenfilmpjes";
                $("#alleenfilmpjes").attr("class", "knopveld on");
                $("#alles").attr("class", "knopveld off");
                $("#alleenplaatjes").attr("class", "knopveld off");
                // $.post("ajax.php", {'status': 'filterradio', 'val': filter});
                updatelist('silent');
            }
            else if(filterdata == "alleenplaatjes") {
                filter = "alleenplaatjes";
                $("#alleenplaatjes").attr("class", "knopveld on");
                $("#alleenfilmpjes").attr("class", "knopveld off");
                $("#alles").attr("class", "knopveld off");
                // $.post("ajax.php", {'status': 'filterradio', 'val': filter});
                updatelist('silent');
            }else{
                filter = "alleen";
            }
        });

    $(window).resize(function(){
        if($('.lijst').is(":visible")){
            xsize = $(window).width() + 15;
            ysize = $(window).height() + 64;
        }
    });

    $(document).ready(function () {
        $('.versie').html(versie);
        $('.version').append(versie);


        var cookies = $(".cc_dialog");

        if ( cookies.length){
            $('.ctabtn').attr("disabled", true);
            $('button[class=ctabtn]').css( 'cursor', 'not-allowed' );

            $('.cc_b_ok').on('click', function () {
                $('.ctabtn').attr("disabled", false);
                $('button[class=ctabtn]').css( 'cursor', 'pointer' );
            })
        }

        setTimeout(function () {
            // $.post("ajax.php", {'status': 'checkToggleState'}).done(function (data) {
                commentdata = getCookie('comments');
                if(commentdata == 1) {
                    comments = "on";
                    $("#toggle").attr("class", "radio on");
                    $('.commentpage').show();
                    $('#vidplayer').addClass('dumpertembed').removeClass('fullplayer');
                    $('#terug').addClass('terugsplit').removeClass('terugfull');
                    $('#picframe').addClass('dumpertpicplayer').removeClass('dumpertpicplayerfull');
                    $('#comtoggle').addClass('commenton').removeClass('commentoff').attr('title', 'Schakel de comments uit');
                    $(".commentsknop").attr("class", "knopveld on commentsknop");
                } else {
                    comments = "off";
                    $("#toggle").attr("class", "radio off");
                    $('.commentpage').hide();
                    $('#vidplayer').addClass('fullplayer').removeClass('dumpertembed');
                    $('#terug').addClass('terugfull').removeClass('terugsplit');
                    $('#picframe').addClass('dumpertpicplayerfull').removeClass('dumpertpicplayer').attr('title', 'Schakel de comments in');
                    $('#comtoggle').addClass('commentoff').removeClass('commenton').attr('title', 'Schakel de comments in');
                    $(".commentsknop").attr("class", "knopveld off commentsknop");
                }
        }, 250);
        if(getCookie('nightmode') == 1){
            nightmode = "on";
            $(".settingstoggle").toggle();
            $("#nightmode").attr("class", "radio on");
            $(".nightmodeknop").attr("class", "knopveld on nightmodeknop");
            $("body").attr("class", "notrans nightmode");
            setTimeout(function () {
                $("body").attr("class", "nightmode");
            },500)
        }else{
            nightmode = "off";
            $("#nightmode").attr("class", "radio off");
            $(".nightmodeknop").attr("class", "knopveld off nightmodeknop");
            $("body").attr("class", "");
        }
        // $.post("ajax.php", {'status': 'checkNightmodeState'}).done(function (data) {
        //     if(data == "on") {
        //         nightmode = "on";
        //         $(".settingstoggle").toggle();
        //         $("#nightmode").attr("class", "radio on");
        //         $(".nightmodeknop").attr("class", "knopveld on nightmodeknop");
        //         $("body").attr("class", "notrans nightmode");
        //         setTimeout(function () {
        //             $("body").attr("class", "nightmode");
        //         },500)
        //     } else {
        //         nightmode = "off";
        //         $("#nightmode").attr("class", "radio off");
        //         $(".nightmodeknop").attr("class", "knopveld off nightmodeknop");
        //         $("body").attr("class", "");
        //     }
        // });

        if(getCookie('nsfw') == 1){
            nsfw = "1";
            $("#nsfw").attr("class", "radio on");
            $(".nsfwknop").attr("class", "knopveld on nsfwknop");
        }else{
            nsfw = "deleted";
            $("#nsfw").attr("class", "radio off");
            $(".nsfwknop").attr("class", "knopveld off nsfwknop");
        }
        // $.post("ajax.php", {'status': 'checkNsfwState'}).done(function (data) {
        //     if(data == 1) {
        //         nsfw = "1";
        //         $("#nsfw").attr("class", "radio on");
        //         $(".nsfwknop").attr("class", "knopveld on nsfwknop");
        //     } else {
        //         nsfw = "deleted";
        //         $("#nsfw").attr("class", "radio off");
        //         $(".nsfwknop").attr("class", "knopveld off nsfwknop");
        //     }
        // });
    });


    $(window).scroll(function () {
        if($('.searchpage').is(":visible")){
        if ($(window).scrollTop() + $(window).height() >=
            $('.searchpage').offset().top + $('.searchpage').height() ) {
            if(searchpageupdate == 0){
                searchpage++;
                var searchkey = $('.zoekbar').val();
                console.log(searchpage);
                search(searchkey);
            }
        }}
    });

</script>

</body>
</html>