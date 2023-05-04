<!-- Questo è il mio array di hotels  -->

<?php

$hotels = [

    [
        'Name' => 'Hotel Belvedere',
        'Description' => 'Hotel Belvedere Descrizione',
        'Parking' => true,
        'Vote' => 4,
        'Distanza dal centro (KM)' => 10.4
    ],
    [
        'Name' => 'Hotel Futuro',
        'Description' => 'Hotel Futuro Descrizione',
        'Parking' => true,
        'Vote' => 2,
        'Distanza dal centro (KM)' => 2
    ],
    [
        'Name' => 'Hotel Rivamare',
        'Description' => 'Hotel Rivamare Descrizione',
        'Parking' => false,
        'Vote' => 1,
        'Distanza dal centro (KM)' => 1
    ],
    [
        'Name' => 'Hotel Bellavista',
        'Description' => 'Hotel Bellavista Descrizione',
        'Parking' => false,
        'Vote' => 5,
        'Distanza dal centro (KM)' => 5.5
    ],
    [
        'Name' => 'Hotel Milano',
        'Description' => 'Hotel Milano Descrizione',
        'Parking' => true,
        'Vote' => 2,
        'Distanza dal centro (KM)' => 50
    ],

];

// creo un array di array per creare le option del select vote PER CREARMI DIFFICOLTA
$options = [
    '0',            
    '1',
    '2',
    '3',
    '4',
    '5'
]

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <!-- BOOTSTRAP -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" crossorigin="anonymous">

    <!-- CUSTOM CSS -->
    <link rel="stylesheet" href="./css/style.css">

    <title>&#128520; HOTEL DA INCUBO</title>
</head>

<body>
    <div class="wrapper container mt-5 text-center">
        <h1 class="my-5">&#128520; Hotel da incubo &#128520;</h1>

        <form action="index.php" method="GET"> <!-- metodo GET perche voglio che i dati siano visibili nell'url -->


            <!-- SELECT PARKING SECTION -->

            <label class="m-4" for="parking">Filtra per parcheggio</label>
            <select class="my-5" id="parking" name="parking">
                <option value="">TUTTI</option>
                <option value="withparking">Con parcheggio</option>
                <option value="notparking">Senza parcheggio</option>
            </select>

            <!-- SELECT VOTE SECTION -->
            <!-- Mi sono complicato la vita creando questo select tramite ciclo foreach -->
            <label class="m-4" for="vote">Filtra per voto</label>
            <select name="vote" id="vote">
                <option value="">TUTTI</option>
                <?php
                foreach ($options as $value) {
                    echo "<option value='$value'>$value</option>";
                }
                ?>
            </select>


            <button class="btn m-4 btn-success" type="submit">CERCA</button>
            <button class="btn m-4 btn-success" onclick="reset()" >RESET</button>


            <!-- TABLE SECTION -->
            <table class="table table-hover">
                <thead>
                    <tr>
                        <!-- scelgo di proposito il primo elemento perche le key sono uguali per tutti -->
                        <?php foreach ($hotels[0] as $key => $hotel) { ?>
                            <th scope="col"><?php echo $key ?></th>
                        <?php } ?>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    if (isset($_GET["parking"]) && isset($_GET["vote"])) {
                        $filter_parking = $_GET['parking'];    // prendo il valore del select parking
                        $filter_vote = $_GET['vote'];      // prendo il valore del select vote
                    } else {
                        $filter_parking = "";
                        $filter_vote = "";
                    }
                    echo $filter_;
                    ?>
                    
                    <?php foreach ($hotels as $hotel) { 
                        if (($filter_parking === "" || ($filter_parking === "withparking" && $hotel['Parking'] === true) || ($filter_parking === "notparking" && $hotel['Parking'] === false)) && ($filter_vote === "" || $hotel['Vote'] == $options[$filter_vote])) { 
                    ?>
                            <tr>
                                <td><?php echo $hotel['Name']; ?></td>
                                <td><?php echo $hotel['Description']; ?></td>
                                <td><?php echo $hotel['Parking'] ? 'Yes' : 'No'; ?></td>
                                <td><?php echo $hotel['Vote']; ?></td>
                                <td><?php echo $hotel['Distanza dal centro (KM)']; ?></td>
                            </tr>
                        <?php } ?>
                    <?php } ?>

                </tbody>
            </table>
        </form>

    </div>
    <script>
        function reset() {  // Funzione che mostra un alert e poi dopo 2 secondi ti riporta alla pagina iniziale
            setInterval(function() {
                window.location.href = "./";
            }, 1000);
        }
    </script>

</body>

</html>