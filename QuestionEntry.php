<!DOCTYPE html>
<html lang = 'en'>
<head>
    <meta charset = "UTF-8"/>
    <title>Book Entry</title>
</head>
<body>
<?php
    $db = mysqli_connect("localhost", "root", "", "mathdb");
    if (mysqli_connect_errno()) 
    {
        print "<p> Database connection error. Please contact the system administrator. </p>";
        exit(0);
    }

    // Check if the question has already been entered

    // Variables
    $bookTitle = $_POST['book_choice'];
    $question = $_POST['question'];
    $pg = $_POST['pg_num'];
    $prb = $_POST['prb_num'];

    // The question content can not be empty
    if ((is_null($question)) || ($question == 'Enter a problem.'))
    {
        print "<p> Error: The question content can not be empty.</p>";
        exit();
    }

    // If the book is selected, both the page number and prblem number must be entered
    if (!is_null($bookTitle) && (($pg == '') || ($prb == '') || (!is_numeric($pg)) || (!is_numeric($prb))))
    {
        print "<p> Error: The page number and problem number must be provided when a book is selected.</p>";
        exit();
    }
        
    // Find the book id
    $bookTitle = "'" . $_POST['book_choice'] . "'";
    $query = mysqli_query($db, "SELECT A.bid FROM book A WHERE A.book_title = $bookTitle");
    $bidRow = mysqli_fetch_assoc($query);
    $bid = array_values($bidRow)[0];

    // Find if the question is already present and display an error if so
    $queryString = "SELECT A.book_id, A.qst_ctnt, A.pg_num, A.qst_num FROM question A WHERE A.book_id =" . "'" . $bid . "'" . " AND A.qst_ctnt = " . "'" . $question . "'" . " AND A.pg_num = " . "'" . $pg . "'" . " AND A.qst_num = " . "'" . $prb . "'" . ";";
    $query = mysqli_query($db, $queryString);
    if (mysqli_num_rows($query) > 0)
    {
        print "<p> Error: This question has already been entered. </p>";
        exit(0);
    }

    // Insert the data into the database
    $pg = "'" . $_POST['pg_num'] . "'";
    $prb = "'" . $_POST['prb_num'] . "'";
    $question = "'" . $question . "'";
    $bid = "'" . $bid . "'";

    $insert = "INSERT INTO question(`pg_num`, `qst_num`, `book_id`, `qst_ctnt`) VALUES($pg, $pg, $bid, $question)";
    if (mysqli_query($db, $insert)) print "This question has been added successfully.";
    else print "Error: This question cannot be added at this time.";

    // Free resources
    mysqli_close($db);
?>        
</body>
</html>