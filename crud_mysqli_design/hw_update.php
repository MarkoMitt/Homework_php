<?php
// Kas submit nuppu on vajutatud klikiti update-by-id vormil
if (isset($_POST['submit'])) {
    //$database->show($_POST); // Test!
    $id = $_POST['sid'];
    $name = $_POST['name'];
    $birth = $_POST['birth'];
    $salary = $_POST['salary'];
    $height = $_POST['height'];
    if (empty($salary)) {
        $salary = 'NULL';
    }
    if (empty($height)) {
        $height = 'NULL';
    }
    $sql = 'UPDATE simple SET
            name = ' . $database->dbFIX($name) . ',
            birth = ' . $database->dbFIX($birth) . ',
            salary = ' . $salary . ',  
            height = ' . $height . ',
            added = added 
            WHERE id = ' . $id;

    //echo $sql; // TEST
    if ($database->dbQuery($sql)) {
        $success = true;
        $_POST = array();
    } else {
        $success = false;
    }

}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Update - Kliki muutmis ikoonil muutmiseks</h3>
            <?php
            // Kui toimus uuendamine (faili alguses olev if lause on tõene!)
            if (isset($success) && $success) {
            ?>
                <div class="alert alert-success">
                    Sissekanne on uuendatud tabelis.
                </div>
            <?php
            } else if (isset($success) && !$success) {
            ?>
                <div class="alert alert-danger">
                    Sissekande uuendamisel tekkis tõrge.
                </div>
            <?php
            }
            ?>
            <?php
            header("Location: hw_index.php");
            exit();
            ?>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>
