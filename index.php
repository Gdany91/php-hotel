<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>

     

        .green {

            color: green;
        }
        .red {

            color: red;
        }

    </style>
    <?php

// definisco l array
        $hotels = [

            [
                'name' => 'Hotel Belvedere',
                'description' => 'Hotel Belvedere Descrizione',
                'parking' => true,
                'vote' => 4,
                'distance_to_center' => 10.4
            ],
            [
                'name' => 'Hotel Futuro',
                'description' => 'Hotel Futuro Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 2
            ],
            [
                'name' => 'Hotel Rivamare',
                'description' => 'Hotel Rivamare Descrizione',
                'parking' => false,
                'vote' => 1,
                'distance_to_center' => 1
            ],
            [
                'name' => 'Hotel Bellavista',
                'description' => 'Hotel Bellavista Descrizione',
                'parking' => false,
                'vote' => 5,
                'distance_to_center' => 5.5
            ],
            [
                'name' => 'Hotel Milano',
                'description' => 'Hotel Milano Descrizione',
                'parking' => true,
                'vote' => 2,
                'distance_to_center' => 50
            ],

        ];
    
        $parkingFltr = $_GET["parking"] ?? false;

        $voteFltr = $_GET["vote"] ?? 0;
    ?>
</head>
<body>
    
    <form>
        <label for="parking">Parking</label>
        <input type="checkbox" name="parking" 
            <?php
                if ($parkingFltr) {

                    echo "checked";
                }
            ?>
        >
        <br><br>
        <label for="vote">Vote</label>
        <input type="number" name="vote" 
                <?php
                    if ($voteFltr != 0) {

                        echo "value='" . $voteFltr . "'";
                    }
                ?>
        >
        <br><br>
        <input type="submit" value="FILTER">
    </form>

    <br><br>

    <table border="1">
        <tr>
            <th>Name</th>
            <th>Description</th>
            <th>Parking</th>
            <th>Vote</th>
            <th>Distance to Center</th>
        </tr>
        <?php

            foreach ($hotels as $hotel) {

                $name = $hotel['name'];
                $description = $hotel['description'];
                $parking = $hotel['parking'];
                $vote = $hotel['vote'];
                $distance_to_center = $hotel['distance_to_center'];

                if ($vote >= $voteFltr
                    && (!$$parkingFltr 
                        || ($$parkingFltr && $parking)
                    )) {

              
                    echo "<tr>" 
                            . "<td>". $name . "</td>"
                            . "<td>". $description . "</td>"
                            . "<td>". ( $parking ? "YES" : "NO" ) . "</td>"
                            . "<td>". $vote . "</td>"
                            . "<td>". $distance_to_center . " Km</td>"
                        . "</tr>";

                    }
                }
        ?>
    </table>
</body>
</html>