<?php
$dbuser = "root";
$dbpass = "";
$host = "localhost";
$dbname = "studentrecorddb";
$mysqli = new mysqli($host, $dbuser, $dbpass, $dbname);

function checkExistence($table, $field, $value)
{
    global $mysqli;
    $result = "SELECT count(*) FROM $table WHERE $field=?";
    $stmt = $mysqli->prepare($result);
    $stmt->bind_param('s', $value);
    $stmt->execute();
    $stmt->bind_result($count);
    $stmt->fetch();
    $stmt->close();
    if ($count > 0) {
        echo "<span style='color:red'> $field Already Exist .</span>";
    }
}

if (!empty($_POST['cshort'])) {
    checkExistence('tbl_course', 'cshort', $_POST['cshort']);
}

if (!empty($_POST['cshort1'])) {
    checkExistence('subject', 'cshort', $_POST['cshort1']);
}

if (!empty($_POST['cfull'])) {
    checkExistence('tbl_course', 'cfull', $_POST['cfull']);
}

if (!empty($_POST['cfull1'])) {
    checkExistence('subject', 'cfull', $_POST['cfull1']);
}
?>
