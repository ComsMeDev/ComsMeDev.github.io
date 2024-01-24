<?php

session_start();
if (!isset($_SESSION['login']) || (time() - $_SESSION['login-timeout'] > 3600)) header("Location: ../logout.php");

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>นายเล็ก Profile</title>

    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">


    <style>
        /* @import url('https://fonts.googleapis.com/css2?family=Source+Code+Pro&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Concert+One&display=swap');

        body {
            font-family: 'Source Code Pro', monospace;
            font-family: 'Concert One', cursive;
            letter-spacing: 2.5px;
        } */

        .wrapper {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background: linear-gradient(135deg, #e73c7e, #1d9bc9);
            background-size: 180% 100%;
            animation: gradient 15s ease infinite;
        }

        @keyframes gradient {
            0% {
                background-position: 0% 50%;
            }

            50% {
                background-position: 100% 50%;
            }

            100% {
                background-position: 0% 50%;
            }
        }

        .box {
            position: relative;
            width: 300px;
            height: 300px;
            cursor: pointer;
            border: 12px;
            border-radius: 50%;
            transition: .5s;
            backdrop-filter: blur(5px);
        }

        .box:hover {
            border-radius: 5px;
            width: 300px;
            height: 500px;
            background-color: rgba(255, 255, 255, .08);
        }

        .profile {
            letter-spacing: 5px;
            white-space: nowrap;
            position: relative;
            width: 300px;
            height: 300px;
            background: url("img/pf.jpg");
            cursor: pointer;
            border: 12px;
            border-radius: 50%;
            transition: .5s;
        }

        .box:hover .profile {
            transition: 1s;
            transform: scale(.5) translateY(-40px);
            border: 6px solid white;
        }

        .profile div:nth-child(1) {
            font-size: 35pt;
            position: absolute;
            color: white;
            font-weight: bold;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        .box:hover .profile div:nth-child(1) {
            top: -20%;
            opacity: 1;
            transition: .8s;
        }

        .profile div:nth-child(2) {
            font-size: 25pt;
            position: absolute;
            color: white;
            font-weight: bold;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        .box:hover .profile div:nth-child(2) {
            top: 120%;
            opacity: .75;
            transition: .8s;
        }

        .profile div:nth-child(3) {
            font-size: 18pt;
            position: absolute;
            color: white;
            font-weight: bold;
            top: 55%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        .box:hover .profile div:nth-child(3) {
            top: 135%;
            opacity: .5;
            transition: 1s;
        }

        .skill {
            letter-spacing: 3px;
            font-size: 9pt;
            width: 45%;
            position: absolute;
            top: 69%;
            left: 50%;
            transform: translate(-50%, -50%);
            color: white;
            opacity: 0;
        }

        .box:hover .skill {
            width: 80%;
            opacity: 1;
            transition: 3s;
            transition-delay: .5s;
        }

        .social-icons {
            font-size: 13pt;
            display: flex;
            padding: 0;
            bottom: 10px;
            position: absolute;
            bottom: -6%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        .social-icons div {
            letter-spacing: 5px;
            font-size: 8pt;
            color: white;
            white-space: nowrap;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            opacity: 0;
        }

        .social-icons li {
            width: 25px;
            height: 25px;
            /* border: 1px solid white; */
            margin: 5px 15px 5px 15px;
            display: flex;
            justify-content: center;
            align-items: center;
            color: white;
            opacity: .8;
            border-radius: 50px;
            transition: .5s;
        }

        .social-icons li:hover {
            background-color: white;
            color: #000;
            transform: scale(1.5);
        }

        .box:hover .social-icons {
            bottom: -1%;
            opacity: 1;
            transition: 1s;
            transition-delay: .4s;
        }

        .box:hover .social-icons div {
            top: 120%;
            opacity: .5;
            transition: .8s;
            transition-delay: 1s;
        }

        img {
            display: none;
        }



        /* .stars {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            transform: rotate(-45deg);
        }

        .star {
            --star-color: rgb(255, 255, 157);
            --star-tail-length: 6em;
            --star-tail-height: 2px;
            --star-width: calc(var(--star-tail-length) / 6);
            --tail-fade-duration: var(--fall-duration);
            position: absolute;
            top: var(--top-offset);
            left: 0;
            width: var(--star-tail-length);
            height: var(--star-tail-height);
            color: var(--star-color);
            background: linear-gradient(45deg, currentColor, transparent);
            border-radius: 50%;
            transform: translate3d(104em, 0, 0);
            animation: fall var(--fall-duration) var(--fall-delay) linear infinite, tail-fade var(--tail-fade-duration) var(--fall-delay) ease-out infinite;
        }

        .star:nth-child(1) {
            --star-tail-length: 6.68em;
            --top-offset: 20vh;
            --fall-duration: 13s;
            --fall-delay: 1s;
        }

        .star:nth-child(2) {
            --star-tail-length: 5.32em;
            --top-offset: 35vh;
            --fall-duration: 8.5s;
            --fall-delay: 14s;
        }

        .star:nth-child(3) {
            --star-tail-length: 6.67em;
            --top-offset: 50vh;
            --fall-duration: 11s;
            --fall-delay: 12s;
        }

        .star:nth-child(4) {
            --star-tail-length: 6.79em;
            --top-offset: 70vh;
            --fall-duration: 10s;
            --fall-delay: 8s;
        }

        .star:nth-child(5) {
            --star-tail-length: 6.83em;
            --top-offset: 85vh;
            --fall-duration: 9s;
            --fall-delay: 11s;
        }

        .star::before,
        .star::after {
            position: absolute;
            content: "";
            top: 0;
            left: calc(var(--star-width) / -2);
            width: var(--star-width);
            height: 100%;
            background: linear-gradient(45deg, transparent, currentColor, transparent);
            border-radius: inherit;
            animation: blink 1s linear infinite;
        }

        .star::before {
            transform: rotate(45deg);
        }

        .star::after {
            transform: rotate(-45deg);
        }

        @keyframes fall {
            to {
                transform: translate3d(-30em, 0, 0);
            }
        }

        @keyframes tail-fade {

            0%,
            50% {
                width: var(--star-tail-length);
                opacity: 1;
            }

            70%,
            80% {
                width: 0;
                opacity: 0.4;
            }

            100% {
                width: 0;
                opacity: 0;
            }
        }

        @keyframes blink {
            50% {
                opacity: 0.3;
            }
        } */
    </style>
</head>

<body>
    <div class="wrapper">
        <!-- <div class="stars">
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
            <div class="star"></div>
        </div> -->
        <div class="box">
            <div class="profile">
                <div>Hello !</div>
                <div>Sitthisak Boonmee</div>
                <div>Software Developer</div>
            </div>
            <div class="skill">
                <h6 class="text-center">SKILL</h6>
                <table style="width: 100%;">
                    <tr>
                        <td>HTML</td>
                        <td class="text-end">70%</td>
                    </tr>
                    <tr>
                        <td>CSS</td>
                        <td class="text-end">85%</td>
                    </tr>
                    <tr>
                        <td>JAVA SCRIPT</td>
                        <td class="text-end">75%</td>
                    </tr>
                    <tr>
                        <td>PHP</td>
                        <td class="text-end">80%</td>
                    </tr>
                </table>
            </div>
            <ul class="social-icons">
                <div>Social Contact</div>
                <li onclick="SocialContact('facebook')"><i class="fa fa-facebook"></i></li>
                <li onclick="SocialContact('youtube')"><i class="fa fa-youtube-play"></i></li>
                <li onclick="SocialContact('twitter')"><i class="fa fa-twitter"></i></li>
                <li onclick="SocialContact('instagram')"><i class="fa fa-instagram"></i></li>
            </ul>
        </div>
    </div>




    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
</body>

</html>

<script>
    document.onselectstart = new Function("return false");
    function SocialContact(app) {
        if (app == 'facebook') window.location = 'https://www.facebook.com/comsitthisak/';
        if (app == 'youtube') window.location = '';
        if (app == 'twitter') window.location = 'https://twitter.com/kasihttis';
        if (app == 'instagram') window.location = 'https://www.instagram.com/comsitthisak/';
    }
</script>
