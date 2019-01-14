<?php

	$query = $db->prepare("SELECT * FROM tartisma ");
	$query->execute();
	$fetch = $query->fetchAll(PDO::FETCH_ASSOC);

  ?>