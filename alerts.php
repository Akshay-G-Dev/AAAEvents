<style>
.alert {
  padding: 20px;
  position:fixed;
  top:0;
  float:right;
  right:0;
  background-color: #f44336;
  color: white;
  opacity: 1;
  transition: opacity 0.6s;
  margin-bottom: 15px;
}

.alert.success {background-color: #04AA6D;}
.alert.info {background-color: #2196F3;}
.alert.warning {background-color: #ff9800;}


.alertclosebtn {
  margin-left: 15px;
  color: white;
  font-weight: bold;
  float: right;
  font-size: 22px;
  line-height: 20px;
  cursor: pointer;
  transition: 0.3s;
}

.closebtn:hover {
  color: black;
}
</style>
<script type="text/javascript" src="login.js"></script>
<?php


if(isset($_SESSION['error_message']) && $_SESSION['error_message']){
    echo '<div class="alert warning">
      <span class="alertclosebtn">&times;</span>  
      '.$_SESSION['error_message'].'
    </div>';
    
    if(isset($_SESSION['error_message_type'])){
        echo '<script>open_popup("'.$_SESSION['error_message_type'].'");</script>';
    }
}
elseif(isset($_SESSION['success_message']) && $_SESSION['success_message']){
    echo '<div class="alert success">
      <span class="alertclosebtn">&times;</span>  
      '.$_SESSION['success_message'].'
    </div>';
}
?>

<script>
var close = document.getElementsByClassName("alertclosebtn");
var i;

for (i = 0; i < close.length; i++) {
  close[i].onclick = function(){
    var div = this.parentElement;
    div.style.opacity = "0";
    setTimeout(function(){ div.style.display = "none"; }, 600);
  }
}
</script>

<?php
    unset($_SESSION['message']);
    unset($_SESSION['error_message']);
    unset($_SESSION['error_message_type']);
    unset($_SESSION['success_message']);
?>