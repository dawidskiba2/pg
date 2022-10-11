<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table, tr, td, th{
            border: 1px solid black;
            border-collapse: collapse;
        }
        th{
            background-color: yellow;
        }
        tr:nth-child(3n-1){
            background-color: lightgreen;
        }
    </style>
</head>
<body>
    <h3>Dodaj uzytkownika:</h3>
    <form action="c06.php" method="post">
        <input type="text" placeholder="login" name="login">
        <input type="text" placeholder="haslo" name="haslo">
        <input type="submit" value="dodaj">
    </form>
    <?php
        function dodajUzytkownika()
        {
            if(isset($_POST['login']))
            {
                $link = mysqli_connect('localhost');
            }
        }
        function czyIstnieje($link, $login)
        {
            $query = "SELECT $login FROM osoby";
            try{
                mysqli_query($link, $query);
                return true;
            }
            catch{
                return false;
            }
            
        }
        function wyswietl($db, $nazwaTabeli)
        {
            $query = "SELECT * FROM $nazwaTabeli";
            $result = mysqli_query($db, $query);

            echo '<table>';
                echo '<tr><th>ID</th><th>login</th><th>haslo</th><tr>';
                foreach($result as $row)
                {
                    echo '<tr>';
                        echo '<td>'.$row['id'].'</td>';
                        echo '<td>'.$row['login'].'</td>';
                        echo '<td>'.$row['haslo'].'</td>';
                    echo '</tr>';
                }
            echo '</table>';
        }
        $link = mysqli_connect('localhost', 'root', '', '4ag1gra');
        wyswietl($link, 'osoby');
        echo czyIstnieje($link, 'marek');
    ?>
</body>
</html>