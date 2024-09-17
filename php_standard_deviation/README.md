# standart_deviation
calculate mean and standard deviation

Example: 

```
<?php

use \CalcMean\cCalcMean;

include "class_mean.php";
    $oMean = new cCalcMean();
    $aArray=[1514,1498,1458,1454,1528,1432,1536,1476,1611,1571,1599,1662];
    $oMean->fGetResult($aArray);
    print "mean: ".$oMean->sMean. ", sigma: ".$oMean->sSigma;

    //mean: 1528.25, sigma: 67.817309737264
?>
```

