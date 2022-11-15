<?php
// VERIFY ROLE / TIME OUT / ETC
if (isset($_SESSION['authenticated'])) {
}
// elseif FOR other condition
else {
    header("location: plugins/cmuoauth/callback.php"); // OR login page
}
