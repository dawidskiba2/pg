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
            <form action="index.php" method="get">
                od: <input type="range" id="od_range"  min="0" max="100000" value="<?php echo $_GET['od']; ?>"><br>
                do: <input type="range" id="do_range" min="0" max="100000" value="<?php echo $_GET['do']; ?>"><br>
                <input type="number" id="od" readonly="readonly" name="od" value="<?php echo $_GET['od']; ?>">
                <input type="number" id="do" readonly="readonly" name="do" value="<?php echo $_GET['do']; ?>"><br>
                <select name="marka" id="lista">
                    <option value=""></option>
                    <option value="Mercedes">Mercedes</option>
                    <option value="Volkswagen">Volkswagen</option>
                    <option value="Opel">Opel</option>
                    <option value="Tesla">Tesla</option>
                    <option value="Audi">Audi</option>
                </select>
                <input type="submit">
            </form>
        </div>
        <div id="right">
            <?php
                $link = mysqli_connect('localhost', 'root', '', 'komissamochodowy');
                function daneDoBazy($link)
                {
                    $plik = fopen('dane.txt', 'r');
                    while(!feof($plik))
                    {
                        $linia = fgets($plik);
                        $arr = explode('|', $linia);
                        $query = "INSERT INTO auta (id, rok, marka, model, cena) VALUES (NULL, '$arr[0]', '$arr[1]', '$arr[2]', '$arr[3]')";
                        var_dump($arr);
                        mysqli_query($link, $query);
                    }
                    
                }   
            ?>
            Wybrane: <br>
            Marka: <span id="wyb_marka"></span><br>
            Cena od: <span id="wyb_od"></span> do: <span id="wyb_do"></span><br>

            <table>
                <tr>
                    <th>id</th>
                    <th>marka</th>
                    <th>model</th>
                    <th>rok</th>
                    <th>cena</th>
                </tr>
                <?php   
                    $Q = "SELECT * FROM auta";
                    if(isset($_GET['od'])){
                        $od = $_GET['od'];
                        $do = $_GET['do'];
                        $Q = "SELECT * FROM auta WHERE cena BETWEEN $od AND $do";
                        if($_GET['marka'] != '')
                        {
                            $marka = $_GET['marka'];
                            $Q = "SELECT * FROM auta where cena BETWEEN $od AND $do AND marka='$marka'";                           
                        }
                    }                    
                    $wynik = mysqli_query($link, $Q);
                    foreach($wynik as $row)
                    {
                        echo '<tr>';
                            echo '<td>'.$row['id'].'</td>';
                            echo '<td>'.$row['marka'].'</td>';
                            echo '<td>'.$row['model'].'</td>';
                            echo '<td>'.$row['rok'].'</td>';
                            echo '<td>'.$row['cena'].'</td>';
                        echo '</tr>';
                    }
                ?>
            </table>
        </div>
    </div>
    <footer>

    </footer>


    <script src="script.js"></script>
</body>
</html>