<?php

use mvc\core\View;

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="<?= View::assets('css/main.css') ?>">
    <link href='https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css' rel='stylesheet'>
    <link rel='shortcut icon' href='<?= View::assets('image\icon\icons8-watermelon-60.png') ?>' />
    <link rel="stylesheet" href="<?= View::assets('css/bootstrap.css') ?>">
    <title>Begin</title>
    <style>
        #content {  
            display: flex;
            height: 100%;
            width: 100%;
            background-image: linear-gradient(#ff9966, #ff5e62);
            justify-content: center;
            align-items: center;
        }

        .div-center {
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .sticker-sm {
            width: 15%;
        }

        html,
        body {
            margin: 0;
            height: 100%;
            width: 100%;
            cursor: url("https://1.bp.blogspot.com/-qbWo9mPKO2Y/YL9utYdQBdI/AAAAAAAAFs4/mtjGu6u2uGwtJsT4gZG4lbhLV1a5lG6OQCLcBGAsYHQ/s0/mouse-f1.png"), auto;
        }

        a {
            text-decoration: none;
        }
    </style>
</head>

<body>
    <div id="content">
        <div class="modal fade" id="flipFlop" tabindex="-1" role="dialog" aria-labelledby="modalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered" id="test" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="modalLabel">NHẬP MẬT KHẨU ĐI Ạ!!! <img class="sticker-sm" src="<?= View::assets('image/conan-gif/detective-conan (1).gif') ?>"> </h4>
                    </div>
                    <div class="modal-body">
                        <div class="div-center">
                            <input class="form-control" id="password" style="width:50%; " type="password">
                        </div>

                        <div class="div-center">
                            <a href="<?= View::url('music')?>">
                                <button type="button" style="margin-top: 1em; text-decoration:none" class="btn btn-primary"> Submit</button>
                            </a>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <script src="<?= View::assets("js\jquery-3.6.1.js") ?>"></script>  
    <script src="<?= View::assets("js\js\bootstrap.min.js") ?>"></script>   
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script> -->
    <script>
        $(function() {
            $('#flipFlop').modal({
                'backdrop': 'static',
                'keyboard': false,
                'show': true,
                'focus': false
            });
        })
    </script>
</body>

</html>