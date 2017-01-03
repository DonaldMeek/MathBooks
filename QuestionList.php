<?php
    // Connect to  mathdb database
    $mathdb = mysqli_connect("localhost", "root", "", "mathdb");
    if (mysqli_connect_errno() == 1) 
    {
        print "<p>Database connection error. Cannot list questions.</p>";
        exit();
    }
    
    /* Find and display each question */
    
    // Query question content from the database
    $select = "SELECT A.qst_ctnt FROM question A;";
    $result = mysqli_query($mathdb, $select);
    if (is_null($result)) exit();

    // Display each question
    $rowNum = mysqli_num_rows($result);
    print "<p>";
    for($i = 0; $i < $rowNum; $i++)
    {
        $row = mysqli_fetch_assoc($result);
        $val = array_values($row); // Only one value in the query
        if (!is_null($val[0])) print"$val[0]<br/><br/>";
    }
    print "</p>";
    // Free resources
    mysqli_close($mathdb);
?>
