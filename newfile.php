<!DOCTYPE html>
<html>
<style>
    body {
        /*background-color: black;*/
        background-color: white;
        /*color: beige;*/
        color: black;
    }
    input {
        width: 100%;
        background-color: beige;
    }
    a {
        text-decoration: none;
        color: beige;
    }
</style><!--
<header>
    <input type="text" placeholder="Search..">
</header>-->

<body>
    <table>
    <?php
    $host="foodlist.cvzwyzvcphe7.us-east-2.rds.amazonaws.com"; // Host name.
    $db_user="viewonly"; // MySQL username.
    $db_password="password"; // MySQL password.
    $database="recipes"; // Database name.
    $link = mysqli_connect($host,$db_user,$db_password,$database);
    if (!$link) {
    echo('Could not connect: ' . mysql_error());
    }
    $sql = "SELECT RecipeID,RecipeName from recipe limit 100";
    $result = $link-> query($sql);
    if (!$result) {
        trigger_error('Invalid query: ' . $link->error);
    }
    if ($result->num_rows >0){
        while($row = $result -> fetch_assoc()){
            echo "<tr><td>". $row["RecipeID"]. "</td><td>". $row["RecipeName"]. "</td><tr>";  
        }
        echo "</table>";
    }
    else
    {
        echo "it is borked";
    }
    mysqli_close($link);
    ?>
        
    <!--
    &nbsp;&nbsp;
        <table style="width:100%">
                <tr>
                  <td><a href="https://www.allrecipes.com/recipe/21014/good-old-fashioned-pancakes/" target="allrecipes">Test Recipe</td>
                </tr>
                <tr>
                        <td><a href="https://www.allrecipes.com/recipe/45396/easy-pancakes/" target="allrecipes">Test Recipe 2</td>
                </tr>
              </table>-->
</body>
</html>