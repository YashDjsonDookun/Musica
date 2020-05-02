<<<<<<< HEAD
<?php
    include "./assets/src/includes/includedFiles.php";
?>

<h1 class="pageHeadingBig">You Might Also Like</h1>
<div class="gridViewContainer">
	<?php
		$albumQuery = mysqli_query($conn, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
		while($row = mysqli_fetch_array($albumQuery))
		{
			echo "<div class='gridViewItem'>
					<span role=\"link\" tabindex=\"0\" onclick=\"openPage('album.php?id=".$row['id']."')\"'>
                        <img src='".$row['artworkPath']."'>
                        <div class='gridViewInfo'>"
                            . $row['title'] .
                        "</div>
					</span>
				</div>
			";
		}
	?>
=======
<?php
    include "./assets/src/includes/includedFiles.php";
?>

<h1 class="pageHeadingBig">You Might Also Like</h1>
<div class="gridViewContainer">
	<?php
		$albumQuery = mysqli_query($conn, "SELECT * FROM albums ORDER BY RAND() LIMIT 10");
		while($row = mysqli_fetch_array($albumQuery))
		{
			echo "<div class='gridViewItem'>
					<span role=\"link\" tabindex=\"0\" onclick=\"openPage('album.php?id=".$row['id']."')\"'>
                        <img src='".$row['artworkPath']."'>
                        <div class='gridViewInfo'>"
                            . $row['title'] .
                        "</div>
					</span>
				</div>
			";
		}
	?>
>>>>>>> 3419a102e75c0ad4c0302c7e5d2083de5b0c796e
</div>