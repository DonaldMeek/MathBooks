<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome to MathBooks!</title>
</head>
<body>
    <form action = "QuestionEntry.php" method = "post" id = "mainID">
        <textarea name="question" id="qtn" rows="10" cols="200">Enter a problem.</textarea><br/>
        <?php include 'BookDropDown.php'; ?>
        <input type="text" value="Page Number"  name="pg_num" id="pg"/><br/><br/>
        <input type="text" value="Problem Number" name="prb_num" id="prb"/><br/><br/>
        <input type="submit" value="enter" name="qtn_submit"/><br/><br/>
        <p>Questions:</p>
        <?php include 'QuestionList.php'; ?>
    </form>
</body>
</html>
