<?php
        $conn=mysqli_connect("localhost","root","","egzamin6");
?>

<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Organizer</title>
    <link rel="stylesheet" type="text/css" href="styl6.css">
</head>
<body>
    <div id="pierwszy">
        <h2>Mój organizer</h2>
    </div>
    <div id="drugi">
        <form action="organizer.php" method="post">
            <label>Wpis wydarzenia:</label>
            <input type="text" id="wydarzenie">
            <input type="submit" value="ZAPISZ">
            <?php
                if(isset($_POST['wydarzenie'])){
                    $wydarzenie=$_POST['wydarzenie'];

                    mysqli_query($conn,"UPDATE zadania SET zadania.wpis='$wydarzenie' WHERE dataZadania = '2020-08-27'");
                }
            ?>
        </form>
    </div>
    <div id="trzeci">
        <img src="logo2.png" alt="Mój organizer">
    </div>
    <div>
        <?php
        $query=mysqli_query($conn,"SELECT datazadania,miesiac,wpis FROM zadania WHERE miesiac = 'sierpien'");
        while($row=mysqli_fetch_assoc($query)){
            echo "<div id=main><h6>".$row['dataZadnia'].", ".$row['miesiac']."</h6><p>".$row['wpis']."</p></div>";
        }
        ?>
    </div>
    <footer>
        <?php
        $query_2=mysqli_query($conn,"SELECT miesiac,rok FROM zadania WHERE dataZadania = '2020-08-01'");
            $row2=mysqli_fetch_assoc($query_2);
            echo "<h1>miesiąc: ".$row2['miesiac'].", rok:".$row2['row']."</h1>";
        mysqli_close($conn);
        ?>
        <p>Stronę wykonał: Joszczyk Hubert</p>
    </footer>
</body>
</html>