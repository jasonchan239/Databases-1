
<!DOCTYPE html>
<html>
    <?php include "connecttodb.php";?>
    <head>
        <title>Bus Trip</title>
        <link rel="stylesheet" type="text/css" href="website.css">
        <link href="https://fonts.googleapis.com/css?family=Mali" rel="stylesheet">
    </head>
    <body>
        <h1>Bus trips</h1>
        <p>Sort by:</p>
        <input type="radio" id="TripName" name="fav_language" value="HTML">
        <label for="TripName">HTML</label><br>
        <input type="radio" id="Country" name="fav_language" value="CSS">
        <label for="Country">CSS</label><br>
        <script src="website.js"></script>
        


        <?php include "getwebsite.php";?>


    </body>
</html>


