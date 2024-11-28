<?php
// URL
$url = "https://data.gov.bh/api/explore/v2.1/catalog/datasets/01-statistics-of-students-nationalities_updated/records?where=colleges%20like%20%22IT%22%20AND%20the_programs%20like%20%22bachelor%22&limit=100";

// Fetch data from API url
$response = file_get_contents($url);

// Check if the response is false
if ($response === false) {
    die("Error: Unable to fetch data from API.");
}


$data = json_decode($response, true);
//to check if data was retrieved 
//echo "<pre>";
//print_r($data);
//echo "</pre>";


?>

<!DOCTYPE html>
<html>

<head>
    <title>UOB student records</title>
    <link rel="stylesheet" href="css/pico.min.css">
</head>

<body>
    <table class="striped">
        <thead>
            <tr>
                <th>Year</th>
                <th>Semester</th>
                <th>The Programs</th>
                <th>Nationality</th>
                <th>Colleges</th>
                <th>Number of Students</th>
            </tr>
        </thead>

        <tbody>
            <?php foreach ($data['results'] as $index => $record): ?>
                <tr>
                    <td><?php echo $record['year']; ?></td>
                    <td><?php echo $record['semester']; ?></td>
                    <td><?php echo $record['the_programs']; ?></td>
                    <td><?php echo $record['nationality']; ?></td>
                    <td><?php echo $record['colleges']; ?></td>
                    <td><?php echo $record['number_of_students']; ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>


    </table>

</body>

</html>