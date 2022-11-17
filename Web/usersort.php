<?php
echo '<table align="center" cellspacing="0" cellpadding="5" width="75%"> <tr>
<td align="left"><b><a href="usersort.php?sort=book_name">Book Name</a></b></td>
<td align="left"><b><a href="usersort.php?sort=author">Author</a></b></td>';
require ('mysqli_connect.php');

$sort = (isset($_GET['sortby'])) ? $_GET['sortby'] : 'tanggal pesan';

switch($sort) {
	case 'Baru Saja':
		$order_by = 'date ASC';
		break;
	case 'Seminggu yang lalu':
		$order_by = 'date ASC';
		break;
		
	default:
	$order_by = 'book_name ASC';
	$sort = 'books';
	break;
}

$q = "SELECT (book_name) AS name, (author) AS author, (publisher) AS publisher FROM books ORDER BY $order_by";
$r = @mysqli_query ($dbc, $q);
if ($r) {
echo '<table align="center" cellspacing="3" cellpadding="3" width="75%">
<tr><td align="left"><b>Book Name</b></td><td align="left"><b><Author</b></td></tr>';

while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC))
{echo '<tr><td align="left">' . $row['name'] . '</td><td align = "left">' . $row['author'] . '</td><td align = "left">' . $row['publisher'] . '</td></tr>';
}

echo '</table>';

mysqli_free_result($r);

} else {
echo 'The current books could not be retrieved.';

echo '<p>' . mysqli_error($dbc) . '<br><br>Query: ' . $q . '</p>';

}

?>