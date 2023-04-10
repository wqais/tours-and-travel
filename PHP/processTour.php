<?php

$tourTitle = $_POST['tour-select'];
echo $tourTitle;

header("LOCATION: customTour.php?tour_title=$tourTitle");

?>