<?php

// Get given year variables or use defaults if not given.
$startYear = (isset($argv[1]) ? $argv[1] : date('Y'));
$endYear   = (isset($argv[2]) ? $argv[2] : $startYear);

// Start with an empty data list
$data = [];

// Loop through all years from start year to end year
for ($year = $startYear; $year <= $endYear; $year++) {
    // If this loop is not the first add extra whitespace for styling
    if ($year !== $startYear) {
        $data[] = [];
    }

    // Add header for readability
    $data[] = [$year];
    $data[] = ['Month', 'Salary date', 'Bonus date'];

    for ($month = 1; $month <= 12; $month++) {
        // Set the dates to their default values
        $bonusDate  = new DateTime($year . '-' . $month . '-15');
        $salaryDate = new DateTime($bonusDate->format('Y-m-t'));

        // If the last day of the month is a saturday or sunday make the payment the friday before.
        if ($salaryDate->format('w') === '0') {
            $salaryDate->sub(new DateInterval('P2D'));
        } else if ($salaryDate->format('w') === '6') {
            $salaryDate->sub(new DateInterval('P1D'));
        }

        // If the 15th of the month is a saturday or sunday make the payment the next wensday.
        if ($bonusDate->format('w') === '0') {
            $bonusDate->add(new DateInterval('P3D'));
        } else if ($bonusDate->format('w') === '6') {
            $bonusDate->add(new DateInterval('P4D'));
        }

        // Add the dates to the dataset for writing later
        $data[] = [$salaryDate->format('m F'),
                   $salaryDate->format('d-m-Y l'),
                   $bonusDate->format('d-m-Y l')];
    }
}

// Print all the data to the file PayDates.cvs. Will create it if it doesn't exist, will override current data if it does.
$file = fopen('PayDates.csv', 'w');
foreach($data as $line) {
    fputcsv($file, $line);
}
fclose($file);
