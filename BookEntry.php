<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Book Entry Confirmation</title>
</head>
<body>
<?php
    // Connect to the database, or display an error if unable to connect
    $db = mysqli_connect("localhost", "root", "", "mathDB");
    if (mysqli_connect_errno())
    {
        printf("Mysql connection failure: %s", mysqli_connect_error());
        exit();
    }

    // Create the INSERT statement
    $book = "'" . $_POST['book_title'] . "'";
    $sub = "'" . $_POST['subtitle'] . "'";
    $auth = "'" . $_POST['authors'] . "'";
    $isbn = "'" . $_POST['ISBN'] . "'";
    $edtn = "'" . $_POST['edition'] . "'";
    $y = "'" . $_POST['year'] . "'";
    $pub = "'" . $_POST['publisher'] . "'";
    $chap = "'" . $_POST['chapters'] . "'";
    $date = "'" . date('Y-m-d H:i:s') . "'";
    date_default_timezone_set('America/Chicago');
    $bid = 1 + mysqli_num_rows(mysqli_query($db, "SELECT bid FROM book;"));// The book id is the number of rows in the table + 1
    $insert = "INSERT INTO book(`bid`, `book_title`, `subtitle`, `authors`, `isbn`, `edition_number`, `year_number`, `publisher`, `number_of_chapters`, `create_time`) 
      VALUES(" . $bid  ."," . $book . "," . $sub . "," . $auth . "," . $isbn . "," . $edtn . "," . $y . "," . $pub . "," . $chap . "," . $date . ");";// String for the INSERT

    // Display a message and end if there is a duplicate isbn
    $book = mysqli_query($db, "SELECT * FROM book");
    $tup = mysqli_fetch_assoc($book);
    $r = mysqli_num_rows($book);
    $c = mysqli_num_fields($book);
    if ($r > 0) {
        for ($i = 0; $i < $r; $i++) {
            $vals = array_values($tup);
            for ($j = 0; $j < $c; $j++) {
                if ($vals[$j] == $_POST['ISBN'])
                {
                    print("<p> A book with this ISBN has already been entered. </p>");
                    exit();
                }
            }
        }
        $tup = mysqli_fetch_assoc($book);
    }

    // Perform the INSERT
    if (mysqli_query($db, $insert)) print("<p> The book has been entered successfully. </p>");
    else print("<p> Unfortunately, this book can not be entered. Please review book entry instructions or contact a MathBooks moderator.</p>");

    // End
    mysqli_close($db);
?>
</body>
</html>
