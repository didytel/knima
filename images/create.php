<?php

require "callapi.php";


$v = CallAPI("DELETE", "http/images/test:knime_api");

?>

<pre>
<?php var_dump($v); ?>
</pre>
