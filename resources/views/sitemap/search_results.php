<?php
$results = "";
$letter = "";
if(isset($_GET['letter']) && strlen($_GET['letter']) == 1){
    $letter = preg_replace('#[^a-z]#i', '', $_GET['letter']);
    if(strlen($letter) != 1){
        echo "ERROR: Hack Attempt, after filtration the variable is empty.";
        exit();
    }
    // Connect to database here now
    // SELECT * FROM movies WHERE title LIKE '%$letter'
    // Use a while loop to append database results into the $results variable ($results .=)
    // Close your database connection here after your while loop closes
    
    // The line below is only to use for testing purposes before you
    // attempt to connect to your database and query it, remove this line after initial test
    $results = "PHP recognizes the dynamic ".$letter." and can search MySQL using it";
}
?>
<html>
<body>
<?php echo $results; ?>
</body>
</html>