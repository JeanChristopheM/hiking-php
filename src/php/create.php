<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hikes</title>
</head>
<body>
<form action="dataHikes.php" method="post">
 <p> Nom : <input type="text" name="name" /></p>
 <p> Difficulty:</p>
 <div>
  <input type="radio" id="difficulty" name="difficulty" value="0">
  <label for="easy">Easy</label>
</div>
<div>
  <input type="radio" id="dewey" name="difficulty" value="1">
  <label for="moderate">Moderate</label>
</div>
<div>
  <input type="radio" id="hard" name="difficulty" value="2">
  <label for="hard">Hard</label>
</div>
 <p> Distance: <input type="text" name="distance" /></p>
 <p> Duration: </p>
 <label for="hours"></label>
 <input type="number" id="hours" name="durationhours"
       min="0" max="24">
 <label for="hours"></label>
 <input type="number" id="minutes" name="durationminutes"
       min="0" max="59">
 <p> Elevation:</p>
 <label for="hours"></label>
 <input type="number" id="elevation" name="elevation"
       min="0" max="2000">
 <p><button type="submit">OK</button></p>
</form>
    
</body>
</html>



 