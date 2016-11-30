<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Adventskalender</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />

    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>

    <style>
        body {
            background-image: url('./images/background.jpg');
            background-position: center top;
            background-attachment: fixed;
        }

        h1 {
            color: white;
        }

        div.day {
            border: 1px grey solid;
            margin-bottom: 25px;
            padding: 10px;
            height: 260px;
            background: white;
            opacity: 0.8;
        }

        div.day h2 {
            margin-top: 0;
        }

        div.day a.btn {
            margin-top: 10px;
        }

        div.today {
            cursor: pointer;
        }

        div.today div.title,
        div.today div.description,
        div.today div.link
        {
            display: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12 text-center">
                <h1>Adventskalender</h1>
            </div>
        </div>

        <div class="row">
<?php

use Caldera\Adventskalender\CalendarBuilder;

require "./classes/Calendar.php";
require "./classes/CalendarBuilder.php";
require "./classes/Day.php";

$cb = new CalendarBuilder();
$cb->loadXmlConfig('./config/days.xml');
$cb->build();

$c = $cb->getCalendar();
$days = $c->getDays();

foreach ($days as $day) {
    ?>
    <div class="col-xs-12 col-sm-6 col-md-3">
        <div class="day<?php if ($day->isToday()) { echo ' today'; } ?>">

            <div class="row dayNumber">
                <div class="col-md-12 text-right">
                    <h2><?php echo $day->getDate()->format('d'); ?></h2>
                </div>
            </div>

            <?php if ($day->isPast() or $day->isToday()) { ?>

            <div class="row title">
                <div class="col-md-12 text-center">
                    <h3><?php echo $day->getTitle(); ?></h3>
                </div>
            </div>

            <div class="row description">
                <div class="col-md-12 text-center">
                    <p><?php echo $day->getDescription(); ?></p>
                </div>
            </div>

            <div class="row link">
                <div class="col-md-12 text-center">
                    <a href="<?php echo $day->getLink(); ?>" class="btn btn-success">weiter</a>
                </div>
            </div>
            <?php } ?>
        </div>
    </div>

    <?php
            }
?>
        </div>
    </div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>

<script>
    $('.today').on('click', function() {
       $('.today div').fadeIn();
    });
</script>
</body>
</html>