<?php

session_start();


// =====================
// INITIALIZE LISTS
// =====================

if (!isset($_SESSION["todos"])) {
    $_SESSION["todos"] = [];
}

if (!isset($_SESSION["wishes"])) {
    $_SESSION["wishes"] = [];
}


// =====================
// TODO SUBMIT
// =====================

if (isset($_POST["todo"])) {

    $todo = $_POST["todo"];

    if (!empty($todo)) {

        // Add the new todo to the session array
        $_SESSION["todos"][] = $todo;

        // POST -> Redirect -> GET
        header("Location: index.php");
        exit;
    }
}


// =====================
// TODO DELETE
// =====================

if (isset($_POST["delete"])) {

    // The Delete button sends us the index
    $todo_index = $_POST["delete"];

    // Delete that specific todo
    unset($_SESSION["todos"][$todo_index]);

    // Prevent resubmission on refresh
    header("Location: index.php");
    exit;
}


// =====================
// WISH SUBMIT
// =====================

if (isset($_POST["wish"])) {

    $wish = $_POST["wish"];

    if (!empty($wish)) {

        // Add the new wish to the session array
        $_SESSION["wishes"][] = $wish;

        // POST -> Redirect -> GET
        header("Location: index.php");
        exit;
    }
}

?>


<!-- =====================
     INPUT FORMS
====================== -->

<form method="POST">
    <input type="text" name="todo">
    <button type="submit">Add Task</button>
</form>

<br>

<form method="POST">
    <input type="text" name="wish">
    <button type="submit">Add Wish</button>
</form>


<!-- =====================
     TODO LIST
====================== -->

<h3>TO-DO LIST:</h3>

<ul>

    <?php foreach ($_SESSION["todos"] as $todo_index => $todo): ?>

        <li>

            <?= $todo ?>

            <form method="POST" style="display: inline;">

                <button
                    type="submit"
                    name="delete"
                    value="<?= $todo_index ?>"
                >
                    Delete
                </button>

            </form>

        </li>

    <?php endforeach; ?>

</ul>


<!-- =====================
     WISHLIST
====================== -->

<h3>WISHLIST:</h3>

<ul>

    <?php foreach ($_SESSION["wishes"] as $wish): ?>

        <li>
            <?= $wish ?>
        </li>

    <?php endforeach; ?>

</ul>