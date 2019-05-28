<?php
require "dbConnect.php";
$db = getDB();
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <title>My Shelf</title>
        <style>
            img {
                width: 15%;
            }
        </style>
    </head>
    <body>
        <header>
            <a href="library_shelf.php">Home</a><br/><br/>
        </header>
        <form method="post" action="library_search.php">
            <input type="text" name="searchbar" placeholder="Search by Title or Author">
            <button>Search</button>
        </form>
        <?php	
        if (isset($_POST['searchbar']))
        {
            $searchstring = $_POST['searchbar'];
            echo $searchstring . "<br/>";
            
            //$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
            //$stmt->bindValue(':id', $id, PDO::PARAM_INT);
            //$stmt->bindValue(':name', $name, PDO::PARAM_STR);
            //$stmt->execute();
            //$stmt->execute(array(':name' => $name, ':id' => $id));
            //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            //or
            //$stmt = $db->prepare('SELECT * FROM table WHERE id=:id AND name=:name');
            //$stmt->execute(array(':name' => $name, ':id' => $id));
            //$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            $stmt = $db->prepare("SELECT * FROM books WHERE title LIKE \'%:search%\'");
            $stmt->execute(array(':search' => $searchstring));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            /*
            foreach ($db->query("SELECT * 
                                FROM books
                                WHERE title LIKE \'%$searchstring%\'") as $row)
            {
                $bookid = $row['book_id'];
                $authorid = $row['author_id'];
                $title = $row['title'];
                $name = $row['name'];
                $cover = $row['cover'];
                echo "<img src=\"$cover\" alt=$cover><br/>" . 
                    "<a href='library_book.php?book_id=$bookid'>$title</a>" . 
                    "<br/>by " . "<a href='library_author.php?author_id=$authorid'>$name</a>" . "<br/><br/>";
            }
            */
        }
        ?>
    </body>
</html>