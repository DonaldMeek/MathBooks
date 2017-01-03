<?php
    // Connect to the database or display an error
    $db = mysqli_connect("localhost", "root", "", "mathdb");
    if (mysqli_connect_errno() == 1)
    {
        print "<p>Database connection error. Cannot list questions.</p>";
        exit();
    }

    // Get the books and display them in a drop down menu
    $bookSelect = "SELECT A.book_title FROM book A;";
    $result = mysqli_query($db, $bookSelect);
    $rowNum = mysqli_num_rows($result);
    $choiceString = "'" . "book_choice" . "'";

    print "<select name=$choiceString id='book_title'><option>-- Select a Book --</option>";
    for($i = 0; $i < $rowNum; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $val = array_values($row);
        $valString = "'" . $val[0] . "'";
        print "<option value=$valString>$val[0]</option>";
    }
    print "</select><br/><br/>";

    // Free resources
    mysqli_close($db);
?>