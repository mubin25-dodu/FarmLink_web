<?php
   if(isset($_SESSION['msg'])){
    echo "<script>".$_SESSION['msg']."</script>";
    unset($_SESSION['msg']);
}
?>