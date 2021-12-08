<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Hikes</title>
    <link rel="stylesheet" href="../style/main.css">
</head>
<body>
    <header class="header">
        <h1 class="title">Create a new hike</h1>
    </header>
    <form action="dataHikes.php" method="post" class="updateForm">
        <ul>
            <li>
                <label for="name" class="label"> Name : </p>
                <input type="text" name="name" id="name" />
            </li>
            <li>
                <p class="label"> Difficulty:</p>
                <div>
                    <input type="radio" id="easy" name="difficulty" value="0">
                    <label for="easy" class="pointer">Easy</label>
                </div>
                <div>
                    <input type="radio" id="moderate" name="difficulty" value="1">
                    <label for="moderate" class="pointer">Moderate</label>
                </div>
                <div>
                    <input type="radio" id="hard" name="difficulty" value="2">
                    <label for="hard" class="pointer">Hard</label>
                </div>
            </li>
            <li>
                <label for="distance" class="label"> Distance: <br /></label>
                <input type="text" name="distance" id="distance" /><span style="font-size:0.7em;">km</span>
            </li>
            <li>
            <label for="duration" class="label">Duration : <br/></label>
                <input type="number" name="durationhours" id="hours" min="0" max="24" style="width: 3rem;">
                <span style="font-size:0.7em;">hours</span>
                <input type="number" name="durationminutes" id="minutes" min="0" max="59" style="width: 3rem;">
                <span style="font-size:0.7em;">minutes</span>
            </li>
            <li>
                <label for="elevation" class="label">Elevation : <br /></label>
                <input type="number" id="elevation" name="elevation"
                    min="0" max="2000"><span style="font-size:0.7em;">m</span>
            </li>
        </ul>
        <br />
        <button type="submit">Submit</button>
    </form>
    
</body>
</html>



 