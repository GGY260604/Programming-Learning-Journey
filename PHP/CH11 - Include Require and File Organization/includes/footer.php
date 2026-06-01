<?php
/*
  FILE: includes/footer.php
  TOPIC: CH11 - Include Require and File Organization

  PURPOSE:
  - This is a reusable footer file.
  - It contains the closing page layout.
*/

$currentYear = date("Y");
?>

        <div class="box output">
            <p class="small-note">Footer loaded from <code>includes/footer.php</code>.</p>
            <p class="small-note">Copyright <?= $currentYear ?> - PHP Learning Note</p>
        </div>
    </div>
</body>
</html>
