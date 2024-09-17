# php_find_denominator
calculate denominator

Example: 

```
<?php

use \FindDenominator\cFindDenominator;

include "class_denominator.php";

$oFindOne = new cFindDenominator();
print "result: ".$oFindOne->fGetResult(0.088168188,true);

// result: 1/11

?>
```

