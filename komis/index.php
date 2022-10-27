<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Komis samochodowy</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div id="header">
        <img src="grafika/auto.png" alt="auto">
        <h1>Komis samochodowy</h1>
    </div>
    <div id="main">
        <div id="left">
            <h3>Filtry:</h3>
            <form action="">
                od: <input type="range" id="od_range"><br>
                do: <input type="range" id="do_range"><br>
                <input type="number" id="od">
                <input type="number" id="do"><br>
                <select name="" id="lista">
                    <option value=""></option>
                    <option value="mercedes">Mercedes</option>
                    <option value="volkswagen">Volkswagen</option>
                    <option value="opel">Opel</option>
                    <option value="tesla">Tesla</option>
                    <option value="audi">Audi</option>
                </select>

            </form>
        </div>
        <div id="right">
            <?php
                $link = mysqli_connect('localhost', 'root', '', 'komissamochodowy');
                function dane($link)
                {
                    $plik = fopen('dane.txt', 'r');
                    while(!feof($plik))
                    {
                        $linia = fgets($plik);
                        $arr = explode('|', $linia);
                        $query = "INSERT INTO auta (id, rok, marka, model, cena) VALUES (NULL, '$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]')";
                        var_dump($arr);
                        // $istnieje = mysqli_query($link, "SELECT id FROM auta");
                        // if()
                        // mysqli_query($link, $query);
                        
                    }
                    
                }
                dane($link);
                
            ?>
        </div>
    </div>
    <footer>

    </footer>


    <script src="js/script.js"></script>
</body>
</html>