<?php
require "dbConnect.php";
$db = getDB();

foreach ($db->query('SELECT books.title, authorsinfo.name FROM shelf
                     INNER JOIN books ON shelf.book_id=books.id
                     INNER JOIN authorsinfo ON shelf.author_id=authorsinfo.id') as $row)
{
    echo "<img src=\"$row['cover']\">" . " " . $row['title'] . " by " . $row['name'] . "<br/><br/>";
    //<img src="<? php echo $row['cover']; ?>">
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Testing</title>
    </head>
    <body>
        <h1>TESTING</h1>
    </body>
</html>