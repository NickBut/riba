<!DOCTYPE html>
<html>
<body>
  
<center>
<form method="get">
  <label for="email">Подпишись:</label><br>
  <input type="text" id="e" name="email" value=""><br>
  <span id="out"></span>
</form>
<input type="submit" id="btn" value="Subscribe" onclick="Newsletter()">
</center>

<script>
  //Handle email input:
  function Newsletter() {
    out = document.getElementById('out');
    email = '<?php echo htmlspecialchars($_GET['email']);?>';
    if ( email.split("@").length == 2  ) {
        <?php
        /** Код проверки Email*/
        //Code...
        ?>
        dom = 'Привет! <b>'+email+'</b>';
        out.innerHTML = dom;
    }
  }
</script>
</body>
</html>