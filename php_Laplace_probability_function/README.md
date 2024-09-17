# php_Laplace_probability_function
calculate Laplace probability function

Example: 

```
<?php

use \LaplaceProbability\cLaplaceProbability;

include "class_laplace.php";

$oLaplace= new cLaplaceProbability();
// 83 - Value, 60 - Mu (mean), 5 - Sigma (standard deviation)
print number_format($oLaplace->fPDF(83, 60, 5),10);

// 0.0000100000

?>
```

