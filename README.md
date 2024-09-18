# php_probability_tools
php probability tools

How it works:

You have noraml distribution data:
57, 56, 57, 59, 62, 58, 59, 73...
<img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/normal_distribution.png?raw=true">

You want to calculate a probability for one of them (for example: 83)

Use Laplace function:

<img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/gauss_formula_rashet_veroyatnosti.png?raw=true">

<br>1. Calculate a Mean value:
<br><img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/calculate_mean.png?raw=true">
<br>2. Calculate a Dispersion value:
<br><img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/calculate_dispersion.png?raw=true">
<br>3. Calculate a Sigma value (standard deviation):
<br><img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/calculate_sigma.png?raw=true">

Put a values to the function:
<br><img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/gauss_formula_rashet_veroyatnosti_solution.png?raw=true">

Calculate the probability:
<br><img src="https://github.com/alchemist314/images/blob/e15457d97d585379d84f178b84f0469db8c8bdb6/probability_tools/Laplace/gauss_formula_rashet_veroyatnosti_solution1.png?raw=true">

Use tools:
1. Calculate a Mean value and a Sigma value (standard deviation):

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
2. Calculate the Laplace probability:

```
<?php

use \LaplaceProbability\cLaplaceProbability;

include "class_laplace.php";

$oLaplace= new cLaplaceProbability();
// 83 - a giving value, 60 - Mu (a Mean value), 5 - a Sigma value (standard deviation)
print number_format($oLaplace->fPDF(83, 60, 5),10);

// 0.0000100000

?>
```

3. Calculate a denominator:

```
<?php

use \FindDenominator\cFindDenominator;

include "class_denominator.php";

$oFindOne = new cFindDenominator();
print "result: ".$oFindOne->fGetResult(0.0000100000,true);

// result: 1/99000

?>
```
