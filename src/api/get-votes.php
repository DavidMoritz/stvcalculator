<?php
require_once("config.php");

$key = $_GET['key'];

if(!empty($key)) {
// checking for blank values.
	$query = "
		SELECT
			vote
		FROM 
			votes
		JOIN
			ballots
		ON
			votes.ballotId = ballots.id
		WHERE 
			ballots.key = '$key';";
	$sth = $dbh->prepare($query);
	$sth->execute();
	$results=$sth->fetchAll(PDO::FETCH_ASSOC);
	print json_encode($results);
} else {
	echo "failed to supply key";
}
?>