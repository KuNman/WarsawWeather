<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Required meta tags -->

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container">
    <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
            <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
            <div class="carousel-item active">
                <img src="http://www.tapeciarnia.pl/tapety/normalne/tapeta-oswietlone-wiezowce-i-palac-kultury-i-nauki-w-warszawie.jpg"  style="width:100%;height:40%">
                <div class="carousel-caption d-none d-md-block" style="position: absolute;top: 20%;">
                    <h2>Current weather for {{ $city }} </h2>
                    <p>last update {{ $date }}</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://wojteksadlej.files.wordpress.com/2010/01/warszawa_noc.jpg"  style="width:100%;height:40%">
                <div class="carousel-caption d-none d-md-block" style="position: absolute;top: 20%;">
                    <h2>Temp : </h2>
                    <p>{{ $temp }} &#8451</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="http://s8.flog.pl/media/foto/7936678_warszawa--starowka--part-i.jpg" style="width:100%;height:40%">
                <div class="carousel-caption d-none d-md-block" style="position: absolute;top: 20%;">
                    <h2>Wind : </h2>
                    <p>{{ $wind }} km/h</p>
                </div>
            </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="sr-only">Next</span>
        </a>
    </div>
    <div class="col-sm-14">
        <footer>
            <p><center>&copy; KuNman</center></p>
        </footer>
    </div>
</div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<script src="https://code.jquery.com/jquery-3.1.1.slim.min.js" integrity="sha384-A7FZj7v+d/sdmMqp/nOQwliLvUsJfDHW+k9Omg/a/EheAdgtzNs3hpfag6Ed950n" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
</body>
</html>