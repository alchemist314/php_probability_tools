<?php

/**
 * MIT License

  Copyright (c) 2023-2024 Golovanov Grigoriy
  Contact e-mail: magentrum@gmail.com


  Permission is hereby granted, free of charge, to any person obtaining a copy
  of this software and associated documentation files (the "Software"), to deal
  in the Software without restriction, including without limitation the rights
  to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
  copies of the Software, and to permit persons to whom the Software is
  furnished to do so, subject to the following conditions:

  The above copyright notice and this permission notice shall be included in all
  copies or substantial portions of the Software.

  THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
  IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
  FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
  AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
  LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
  OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE
  SOFTWARE.

 */

namespace CalcMean;

class cCalcMean {

    public $sMean;
    public $sSigma;
    
    public function fGetResult($aDataArray) {
        $this->fInit($aDataArray);
    }
    
/**
 * Calculate mean and standard-deviation
 * 
 * @param array $aDataArray
 */

    public function fInit($aDataArray) {
            // Average sum
            $sArraySum = array_sum($aDataArray);
            $sArrayCount = count($aDataArray);
            $this->sMean = ($sArraySum/$sArrayCount);

            foreach ($aDataArray as $sVal) {
                $aStdDevPow[] = pow(($sVal - $this->sMean), 2);
            }
            // Dispresion
            $sArraySumStdDevPow = array_sum($aStdDevPow);
            $sArraySumStdDevPowCount = count($aStdDevPow);
            $sArraySumStdDevPowDispersion = ($sArraySumStdDevPow / $sArraySumStdDevPowCount);

            $this->sSigma = sqrt($sArraySumStdDevPowDispersion);
    }
}

/*
//Example:

$oMean = new cCalcMean();
$aArray=[1514,1498,1458,1454,1528,1432,1536,1476,1611,1571,1599,1662];
$oMean->fGetResult($aArray);
print "mean: ".$oMean->sMean. " sigma: ".$oMean->sSigma;

//mean: 1528.25, sigma: 67.817309737264

*/