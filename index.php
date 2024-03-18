<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance to center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance to center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance to center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance to center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance to center' => 50
        ],

    ];

    $parkingValue = $_GET['parking'];
    $filteredHotels = [];
?>

<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PHP - Hotels</title>

    <!-- link to bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="container my-5 ">

    <form method="get" action="./index.php" class="row">

        <div class="mb-3 col">
            <label for="parking" class="form-label">Filter by parking:</label>

            <select class="form-select" name="parking" id="parking">
                <option value=""> All </option>
                <option value="1"> With parking </option>
                <option value="0"> Without parking </option>
            </select>
        </div>

        <div class="col">
            -- ALTRO FORM DA STRUTTURARE --
        </div>




        <div class="d-flex justify-content-center">
            <button type="submit" class="btn btn-primary w-25 ">Filter</button>
        </div>
    </form>

    <table class="table">
        <thead>
            <?php
            $hotelProperties = array_keys( $hotels[0] );
                echo "
                <tr> ";
                    foreach ($hotelProperties as $property) {
                        echo "
                        <th>
                            $property
                        </th>
                        ";
                    }
                echo "
                </tr>
                ";
            ?>
        </thead>


        <tbody>
            <?php

            if ($parkingValue == null) {
                $filteredHotels = $hotels;
            } else {
                $filteredHotels = array_filter($hotels, function ($hotel) use ($parkingValue) {

                    return $hotel['parking'] == $parkingValue;

                });
            }

            foreach ($filteredHotels as $currentHotel) {
                echo "
                <tr> ";
                    foreach ($currentHotel as $key => $value ) {

                        if ($key == 'parking') {
                            $value = ($value) ? 'yes' : 'no';
                        }

                        echo "
                        <td>
                            $value 
                        </td>
                        ";
                    }
                echo "
                </tr>
                ";
            } 



            ?>
        </tbody>
    </table>

</div>
    

    <!-- link to bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>