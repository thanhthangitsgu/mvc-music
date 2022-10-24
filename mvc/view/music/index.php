<?php

use mvc\core\View; ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= View::assets('css/main.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/music.css') ?>">
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='shortcut icon' href='<?= View::assets('image\icon\icons8-watermelon-60.png') ?>' />
    <script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
    <title>Music</title>
    <style>
        ul {
            padding-left: 0px;
        }

        .content {
            display: flex;
            gap: 0 10px;
        }

        body {
            color: black;
        }

        .title {
            width: 100%;

        }

        #number-song {
            text-align: right;
        }

        .filter {
            display: flex;
            margin-top: 0.7rem;
            gap: 0 25px;
        }
        .filter select{
            border-radius: 5px;
            border: none;
            background-color: #DDDDDD;
            height: 30px;
        }
        .filter option{
            background-color:#EEEEEE;
        }
        .search-form{
            background-color: #EEEEEE;
            transition: 0.5s;
        
        }
        .search-form:focus-within{
            background-color: #DDDDDD;
        }
        .filter option
    </style>
    
</head>

<body>
    <?= View::partial('sidebar') ?>
    <div class="home-section">
        <div class="backdrop">
        </div>
        <div class="content">
            <div class="music">
                <div class="music-thumb">
                    <img src="<?= View::assets('image\conan-jpg\104954e18b85d28b0d5931a3e3ad8b1d.jpg') ?>">
                </div>
                <h3 class="music-name"> Chiều nay không có mưa bay </h3>
                <input type="range" name="range" class="range" id="range">
                <audio src="public/assets/audio/matmoc.mp3" id="song"></audio>
                <div class="time">
                    <div class="current"></div>
                    <div class="duration"></div>
                </div>
                <div class="control">
                    <ion-icon name="play-back" class="play-back"></ion-icon>
                    <div class="play">
                        <div class="player-inner">
                            <ion-icon name="play" class="play-icon"></ion-icon>
                        </div>
                    </div>
                    <ion-icon name="play-forward" class="play-forward"></ion-icon>
                </div>
            </div>
            <div class="list-music">
                <form class="search-form">
                    <input type="search" value="" placeholder="Tìm kiếm..." class="search-input">
                    <button type="submit" class="search-button">
                        <svg class="submit-button">
                            <use xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="#search"></use>
                        </svg>
                    </button>
                <svg xmlns="http://www.w3.org/2000/svg" width="0" height="0" display="none">
                    <symbol id="search" viewBox="0 0 32 32">
                        <path d="M 19.5 3 C 14.26514 3 10 7.2651394 10 12.5 C 10 14.749977 10.810825 16.807458 12.125 18.4375 L 3.28125 27.28125 L 4.71875 28.71875 L 13.5625 19.875 C 15.192542 21.189175 17.250023 22 19.5 22 C 24.73486 22 29 17.73486 29 12.5 C 29 7.2651394 24.73486 3 19.5 3 z M 19.5 5 C 23.65398 5 27 8.3460198 27 12.5 C 27 16.65398 23.65398 20 19.5 20 C 15.34602 20 12 16.65398 12 12.5 C 12 8.3460198 15.34602 5 19.5 5 z" />
                    </symbol>
                </svg>
                </form>
                <div class="filter">
                    <select name="category" id="category">
                        <option value="-1">Thể loại</option>
                        <option value="1">Tình cảm</option>
                    </select>
                    <select name="listname" id="listname">
                        <option value="-1">Danh sách</option>
                        <option value="-1">Danh sách 1</option>
                    </select>
                    <select name="listname" id="listname">
                        <option value="-1">Quốc gia</option>
                        <option value="-1">Viet Nam</option>
                        <option value="-1">Viet Nam</option>
                    </select>
                    <div class="favourite">
                        <input type="checkbox" value="">
                        <label for="">Yêu thích</label>
                    </div>

                </div>
                <div id="list">

                </div>
            </div>
        </div>
    </div>
    <script src="<?= View::assets('js/main.js') ?>"> </script>
    <script src="<?= View::assets('js/jquery-3.6.1.js') ?>"> </script>
    <script>
        const song = $('#song')[0];
        let dir = "public/assets/";
        const musics = ["audio/cochangtraivietlencay.mp3", "audio/matmoc.mp3", "audio/comotnoinhuthe.mp3"];
        let isPlaying = false;
        let currentSong = 0;
        const durationTime = $('.duration');
        const __currentTime = $('.current');
        const rangeBar = $('.range[name=range]');
        rangeBar.val(0);
        $('')
        $(function() {
            setInterval(displayTime, 1000);
            displayTime();
            song.setAttribute("src", dir + musics[currentSong]);
            $('.player-inner').bind('click', function(event) {
                controlPlay();
            })
            $('.play-back').bind('click', function(event) {
                currentSong--;
                song.setAttribute("src", dir + musics[currentSong]);
                song.play();
            })
            $('.play-forward').bind('click', function(event) {
                currentSong++;
                song.setAttribute("src", dir + musics[currentSong]);
                song.play();

            })
            $(window).keypress(function(e) {
                if (e.keyCode == 32) {
                    controlPlay();
                };
            });
            rangeBar.change(function() {
                changeBar();
            })
        })
        //Phát nhạc

        function controlPlay() {
            if (!isPlaying) {
                song.play();
                isPlaying = true;
                $('.player-inner').html('<ion-icon name="pause" class="pause-icon"></ion-icon>')
            } else {
                song.pause();
                isPlaying = false;
                $('.player-inner').html('   <ion-icon name="play" class="play-icon"></ion-icon>')
            }
        }
        //Hiển thị thời gian

        function displayTime() {
            const {
                duration,
                currentTime
            } = song;
            rangeBar.attr('max', duration);
            rangeBar.val(currentTime);
            __currentTime.text(formatTime(currentTime));
            if (!duration) {
                durationTime.text("00:00");
            } else {
                durationTime.text(formatTime(duration));
            }
        }
        //format thời gian
        function formatTime(number) {
            let minutes = Math.floor(number / 60);
            if (minutes < 10) minutes = "0" + minutes;
            let seconds = Math.floor(number - minutes * 60)
            if (seconds < 10) seconds = "0" + seconds;
            return `${minutes}:${seconds}`
        }
        //Tua nhạc
        function changeBar() {
            song.currentTime = rangeBar.val();
        }
    </script>
</body>

</html>