<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link href="css/tailwind.css" rel="stylesheet" type="text/css">
    <title>Hello, world!</title>
</head>

<body>
    <div class="h-full">
        <div class="flex p-5 justify-between text-white navbar-mobile">
            <span>ICO</span>
            <span>NAV</span>
        </div>

        <div class="flex flex-wrap justify-around items-start px-6 py-10 bg-gray-100 h-full">
        <?php
        $var = ["Prova1", "Prova2", "Prova3", "Prova4"];

        foreach ($var as $title):?>

            <div class="flex-col shadow-lg rounded-lg bg-white m-2 w-1/3">
                <img class="rounded-lg mx-auto" src="https://place-hold.it/250" alt="">
                <div class="text-center text-3xl"><span><?php echo $title; ?></span></div>
            </div>

		<?php endforeach; ?>

        </div>
    </div>
</body>

</html>