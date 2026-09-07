<?php

session_start();

//TODOS
if(!isset($_SESSION["todos"])){
    $_SESSION["todos"] = [];//makes an empty array for todos. Need to initialize this first!
}

if (isset($_POST["todo"])){ 
    $todo = $_POST["todo"];
    if(!empty($todo)){ //checks for no empty strings
        $_SESSION["todos"][] = $todo;//stores it in session todos
        header("Location: index.php");
        exit;
        }
        else{
        echo ("<p>Nothing entered, please try again.</p>");
    }
}
//WISHLIST
if (!isset($_SESSION["wishes"])){
    $_SESSION["wishes"]= [];
}

if (isset($_POST["wish"])){ 
    $wish = $_POST["wish"]; //destination = value;  were adding the input from the post into the wish array. typically we're initializing and making this new variable
    if(!empty($wish)){
       $_SESSION["wishes"][]= $wish;
        header("location: index.php");
    }
    else{
        echo ("<p>Nothing entered, please try again.</p>");
    }
}



?>

<form method = "POST"> 
    <input type = "text" name="todo">
    <button type ="submit">Add Task</button>
</form>

<form method = "POST"> 
    <input type = "text" name="wish">
    <button type ="submit">Add Wish</button>
</form>

<ul>
<?php //to do print
echo "TO-DO LIST:";
foreach ( $_SESSION["todos"] as $todo){ //do your request-processing logic before producing your page.
    
    echo "<li>$todo</li>";
}
?>
</ul>


<ul>
<?php //wish print
echo "WISHLIST:";
foreach ( $_SESSION["wishes"] as $wish){
    
    echo "<li>$wish</li>";
}
?>
</ul>