include("session.php");
$_SESSION['login_user']=NULL;
header("Location: index.php");