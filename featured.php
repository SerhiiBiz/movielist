<?php
$movie_dir = "movies/";
$movies = glob($movie_dir . "*.mp4");

foreach ($movies as $movie) {
  echo '<video width="640" height="360" controls>';
  echo '<source src="' . $movie . '" type="video/mp4">';
  echo '</video>';
}
?>