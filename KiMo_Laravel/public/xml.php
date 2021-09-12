<?php
use Illuminate\Support\Facades\Auth;
//$userID=Auth::user()->id;
$username="root";
$password="KiMo";
$database="kiMo";

function parseToXML($htmlStr)
{
    $xmlStr=str_replace('<','&lt;',$htmlStr);
    $xmlStr=str_replace('>','&gt;',$xmlStr);
    $xmlStr=str_replace('"','&quot;',$xmlStr);
    $xmlStr=str_replace("'",'&#39;',$xmlStr);
    $xmlStr=str_replace("&",'&amp;',$xmlStr);
    return $xmlStr;
}

// Opens a connection to a MySQL server
$connection = mysqli_connect("localhost", "root", "", "KiMo");
if (!$connection) {
    die('Not connected : ' . mysqli_error());
}


// Set the active MySQL database
$db_selected = mysqli_select_db( $connection, $database);
if (!$db_selected) {
    die ('Can\'t use db : ' . mysqli_error());
}

$query = "SELECT * FROM kids k join user_kid uk on k.id_kid=uk.id_kid WHERE k.followed=1 ";
$result = mysqli_query($connection, $query);
if (!$result) {
    die('Invalid query: ' . mysqli_error());
}

header("Content-type: text/xml");

// Start XML file, echo parent node
echo '<markers>';

// Iterate through the rows, printing XML nodes for each
while ($row = @mysqli_fetch_assoc($result)){
    //$sql = "UPDATE kiddos SET state=1 WHERE id=$row[id]";
   // if ($connection->query($sql) === TRUE) {
    //    echo "Record deleted successfully";
    //} else {
    //    echo "Error deleting record: " . $connection->error;
   // }

    // Add to XML document node
    echo '<marker ';

    echo 'name="' . parseToXML($row['NAME']) . '" ';
    echo 'lat="' . $row['LAT'] . '" ';
    echo 'lng="' . $row['LNG'] . '" ';


    echo '/>';
}

// End XML file
echo '</markers>';

?>