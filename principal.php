<?php include ('assets/includes/header.php');
include ('assets/includes/Navigation.php');
if(isset($_POST['identificar'])) {Usuario::identificar($_POST['user'],$_POST['password']);}
?>

<?php include ('assets/includes/footer.php'); ?>