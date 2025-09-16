<?php
session_start();
?>
<form action="process.php" method='post'>
    <input type="text" name="name" placeholder="type something">
    <button type="submit" >Submit</button>
</form>
<?php
if(isset($_SESSION['flash'])){
    echo "<p style='color:green>{$_SESSION['flash']}</p>";
    unset($_SESSION['flash']);
}
