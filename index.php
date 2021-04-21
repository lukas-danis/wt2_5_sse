<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>SSE generator</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
    <script src="https://cdn.plot.ly/plotly-latest.min.js"></script>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class="container">
        <h1 class="center">Prichádzajúce dáta</h1>
        <div id="result" class="center pb30"></div>

        <div class="center pb50">
            <h2 class="center">Zmeň prichádzajúce dáta</h2>
            <p class="center">Prázdna hodnota amplitúdy znamená *1</p>
            <form id="myForm">
                <span>Amplitúda</span>
                <input type="number" name="val" id="my-custom-input" min="1">
                <br>
                <input name="check1" type="checkbox" id="fn1" checked>
                <label for="fn1">sin^2</label><br>

                <input name="check2" type="checkbox" id="fn2" checked>
                <label for="fn2">cos^2</label><br>

                <input name="check3" type="checkbox" id="fn3" checked>
                <label for="fn3">sin * cos</label><br>
                <input id="btn" name="submit" type="submit" value="Submit">
            </form>
        </div>

        <p class="center">Len tak graf pre kontrolu keďže z čísiel sa veľa nevyčíta :D</p>
        <div id="myGraph"></div>
        <div class="row col-md-6 mx-auto pb30">
            <div class="col-md-4">
                <input type="checkbox" id="sin1" checked>
                <label for="sin1">cos^2</label><br>
            </div>
            <div class="col-md-4">
                <input class="pl10" type="checkbox" id="sin2" checked>
                <label class="pl10" for="sin2">sin^2</label><br>
            </div>
            <div class="col-md-4">
                <input type="checkbox" id="sin3" checked>
                <label for="sin3">sin * cos</label><br>
            </div>
        </div>
    </div>
    <footer>
        <p>Lukáš Daniš © Copyright 2021</p>
    </footer>
    <script src="script.js"></script>
</body>

</html>