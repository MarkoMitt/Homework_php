<?php
// Kas ids on olemas ja kas see on number
if(isset($_GET['ids']) && is_numeric($_GET['ids'])) {
    $sql = 'DELETE FROM simple WHERE id = '.$_GET['ids'];
    if($database->dbQuery($sql)) {
        
        $success = true;
        $url = $_SERVER['PHP_SELF'].'?page=homework';
        header("Location: ".$url);
    } else {
        $success = false;
        header('Location: index.php?page=homework');
    }
}
?>
<div class="container">
    <div class="row">
        <div class="col-sm-2"></div>

        <div class="col-sm-8">
            <h3 class="text-center">Delete - Kustuta kirje tabelist</h3>
            
            <?php
            // Kui toimus kustutamine (faili alguses olev if lause on tõene!)
            if (isset($success) && $success) {
            ?>
                <div class="alert alert-success">
                    Sissekanne on tabelist kustutatud
                </div>
            <?php
            } else if (isset($success) && !$success) {
            ?>
                <div class="alert alert-danger">
                    Sissekande kustutamisel tekkis tõrge.
                </div>
            <?php
            } 
            ?>
        </div>
        <div href="index.php?page=homework"></div>
        <div class="col-sm-2"></div>
    </div>
</div>