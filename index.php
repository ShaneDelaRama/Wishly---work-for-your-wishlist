<?php

session_start(); 

if(!isset($_SESSION["todos"])){
    $_SESSION["todos"] = [];//makes an empty array for todos. Need to initialize this first!
}

if (isset($_POST["todo"])){ 
    if(strpos($todo, "") == false){
                            //okay we need to add PRG (post, redirect, get). Bug found adds last added word repeatedly
        $todo = $_POST["todo"];
        $_SESSION["todos"][] = $todo;//stores it in session todos
        header("Location: index.php");
        exit;
    }
    else if
        echo ("<p>Nothing entered, please try again."</p>);

}



?>

<form method = "POST"> 
    <input type = "text" name="todo">
    <button type ="submit">Add Task</button>
</form>


<?php
foreach ( $_SESSION["todos"] as $todo){ //do your request-processing logic before producing your page.
    <ul>
    echo ("<li>$todo<li>");
    </ul>
}
?>
