<?php

session_start();

//TODOS
if(!isset($_SESSION["todos"])){
    $_SESSION["todos"] = [];//makes an empty array for todos. Need to initialize this first!
}

if (isset($_POST["todo"])){ 
    if(!empty($todo)){ //checks for no empty strings
        $todo = $_POST["todo"];
        $_SESSION["todos"][] = $todo;//stores it in session todos
        header("Location: index.php");
        exit;
    }
    else{
        echo ("<p>Nothing entered, please try again.</p>");
    }
}
//WISHLIST
if (!isset($_SESSION["wish"])){
    $_SESSION["wishes"]= [];
}

if (isset($_POST["wish"])){
    if(!empty($wish)){
        $wish = $_POST["wish"];
        $_POST["wish"] = $_SESSION["wishes"];
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
<?php
foreach ( $_SESSION["todos"] as $todo){ //do your request-processing logic before producing your page.
    
    echo "<li>$todo</li>";
}

foreach ( $_SESSION["wishes"] as $wish){
    
    echo "<li>$wish</li>";
}
?>
</ul>
