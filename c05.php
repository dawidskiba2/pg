<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
      
    </style>
</head>
<body>
    <form method="post" action="c05.php">
        <label for="login">Login: </label>
        <input type="text" id="login" name="login">
        <label for="haslo">Hasło: </label>
        <input type="text" id="haslo" name="haslo"><br>
        <input type="submit">
    </form>
    <?php
    
  
        function czy_jest($link, $nazwa_bazy){
            $lista=mysqli_query($link, 'SHOW DATABASES');
            while($w=mysqli_fetch_array($lista)){
                return ($w[0]==$nazwa_bazy);
            }
        }
        $link=mysqli_connect('localhost','root','');
        if(!czy_jest($link, '4ag1gra')){
            echo 'baza nieistnieje';
            mysqli_query($link, 'CREATE DATABASE 4ag1gra');
            //echo mysqli_query($link, 'SHOW DATABASES * SELECT 4ag1gra');
            $link=mysqli_connect('localhost','root','','4ag1gra');
            mysqli_query($link, 'CREATE TABLE osoby(
                id INT PRIMARY KEY AUTO_INCREMENT,
                login CHAR(20),
                haslo CHAR(20)
            )');
        }
        else{
            echo 'baza istnieje<br>';
            $link=mysqli_connect('localhost','root','','4ag1gra');
            //mysqli_query($link, 'DROP DATABASE 4ag1gra');
        }
        if(isset($_POST['login'])){
            mysqli_query($link, 'INSERT INTO osoby(login, haslo) VALUES (\''.$_POST['login'].'\', \''.$_POST['haslo'].'\')');
            echo 'zapisano<bt>';
        }



        function odczyt($plik){
            $p=fopen($plik,'r');
    
            while(!feof($p)){
                $linia=trim(fgets($p));
                $tab[]=explode("|",$linia);
                return $tab;
            }
            fclose($p);
        }
    
        function zapis($dane, $link, $baza, $tabelka)
        { 
            mysqli_query($link,"SELECT $baza");
            foreach($dane as $wiersz)
            mysqli_query($link, "INSERT INTO  $tabelka VALUES(null,  $wiersz[0], $wiersz[1])");
           
        }
        $tab=odczyt('c05dane.txt');
        
        
          echo $tab ? "plik odczytany <br>" : "nie ma dancyh <br>";
          $baza=mysqli_connect("localhost","root","", "4ag1gra");
          zapis($tab, $link, $baza, 'osoby');
          



    ?>                                                               
    <table>
        <?php
            $tabela=mysqli_query($link, 'SELECT*FROM osoby');
            foreach($tabela as $wiersz){
                echo '<tr>';
                foreach($wiersz as $pole){
                    echo '<td>'.$pole.'</td>';
                }
                echo '</tr>';
            }
            mysqli_close($link);
        ?>
    </table>
</body>
</html>     