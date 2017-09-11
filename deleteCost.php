<?php
    include 'header.php';

    if($_POST){
        if(isset($_POST['deleteAll'])){
            delDatabase('cost', $con);
        }
    }
?>
<div class="container">
    <form method="post">
        <h2>Cost tábla adatainak törlése</h2>
        <input type="submit" name="deleteAll" class="deleteBtn" value="DB Töröl">
    </form>
</div>
<?php
    include 'footer.php';
?>