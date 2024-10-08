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

namespace LaplaceProbability;


class cLaplaceProbability {

    // Laplace integral function table
    public $aLaplaceTable = [
            '0' => 0,
            '0.01' => 0.004,
            '0.02' => 0.008,
            '0.03' => 0.012,
            '0.04' => 0.016,
            '0.05' => 0.0199,
            '0.06' => 0.0239,
            '0.07' => 0.0279,
            '0.08' => 0.0319,
            '0.09' => 0.0359,
            '0.1' => 0.0398,
            '0.11' => 0.0438,
            '0.12' => 0.0478,
            '0.13' => 0.0517,
            '0.14' => 0.0557,
            '0.15' => 0.0596,
            '0.16' => 0.0636,
            '0.17' => 0.0675,
            '0.18' => 0.0714,
            '0.19' => 0.0753,
            '0.2' => 0.0793,
            '0.21' => 0.0832,
            '0.22' => 0.0871,
            '0.23' => 0.091,
            '0.24' => 0.0948,
            '0.25' => 0.0987,
            '0.26' => 0.1026,
            '0.27' => 0.1064,
            '0.28' => 0.1103,
            '0.29' => 0.1141,
            '0.3' => 0.1179,
            '0.31' => 0.1217,
            '0.32' => 0.1255,
            '0.33' => 0.1293,
            '0.34' => 0.1331,
            '0.35' => 0.1368,
            '0.36' => 0.1406,
            '0.37' => 0.1443,
            '0.38' => 0.148,
            '0.39' => 0.1517,
            '0.4' => 0.1554,
            '0.41' => 0.1591,
            '0.42' => 0.1628,
            '0.43' => 0.1664,
            '0.44' => 0.17,
            '0.45' => 0.1736,
            '0.46' => 0.1772,
            '0.47' => 0.1808,
            '0.48' => 0.1844,
            '0.49' => 0.1879,
            '0.5' => 0.1915,
            '0.51' => 0.195,
            '0.52' => 0.1985,
            '0.53' => 0.2019,
            '0.54' => 0.2054,
            '0.55' => 0.2088,
            '0.56' => 0.2123,
            '0.57' => 0.2157,
            '0.58' => 0.219,
            '0.59' => 0.2224,
            '0.6' => 0.2257,
            '0.61' => 0.2291,
            '0.62' => 0.2324,
            '0.63' => 0.2357,
            '0.64' => 0.2389,
            '0.65' => 0.2422,
            '0.66' => 0.2454,
            '0.67' => 0.2486,
            '0.68' => 0.2517,
            '0.69' => 0.2549,
            '0.7' => 0.258,
            '0.71' => 0.2611,
            '0.72' => 0.2642,
            '0.73' => 0.2673,
            '0.74' => 0.2703,
            '0.75' => 0.2734,
            '0.76' => 0.2764,
            '0.77' => 0.2794,
            '0.78' => 0.2823,
            '0.79' => 0.2852,
            '0.8' => 0.2881,
            '0.81' => 0.291,
            '0.82' => 0.2939,
            '0.83' => 0.2967,
            '0.84' => 0.2995,
            '0.85' => 0.3023,
            '0.86' => 0.3051,
            '0.87' => 0.3078,
            '0.88' => 0.3106,
            '0.89' => 0.3133,
            '0.9' => 0.3159,
            '0.91' => 0.3186,
            '0.92' => 0.3212,
            '0.93' => 0.3238,
            '0.94' => 0.3264,
            '0.95' => 0.3289,
            '0.96' => 0.3315,
            '0.97' => 0.334,
            '0.98' => 0.3365,
            '0.99' => 0.3389,
            '1' => 0.3413,
            '1.01' => 0.3438,
            '1.02' => 0.3461,
            '1.03' => 0.3485,
            '1.04' => 0.3508,
            '1.05' => 0.3531,
            '1.06' => 0.3554,
            '1.07' => 0.3577,
            '1.08' => 0.3599,
            '1.09' => 0.3621,
            '1.1' => 0.3643,
            '1.11' => 0.3665,
            '1.12' => 0.3686,
            '1.13' => 0.3708,
            '1.14' => 0.3729,
            '1.15' => 0.3749,
            '1.16' => 0.377,
            '1.17' => 0.379,
            '1.18' => 0.381,
            '1.19' => 0.383,
            '1.2' => 0.3849,
            '1.21' => 0.3869,
            '1.22' => 0.3883,
            '1.23' => 0.3907,
            '1.24' => 0.3925,
            '1.25' => 0.3944,
            '1.26' => 0.3962,
            '1.27' => 0.398,
            '1.28' => 0.3997,
            '1.29' => 0.4015,
            '1.3' => 0.4032,
            '1.31' => 0.4049,
            '1.32' => 0.4066,
            '1.33' => 0.4082,
            '1.34' => 0.4099,
            '1.35' => 0.4115,
            '1.36' => 0.4131,
            '1.37' => 0.4147,
            '1.38' => 0.4162,
            '1.39' => 0.4177,
            '1.4' => 0.4192,
            '1.41' => 0.4207,
            '1.42' => 0.4222,
            '1.43' => 0.4236,
            '1.44' => 0.4251,
            '1.45' => 0.4265,
            '1.46' => 0.4279,
            '1.47' => 0.4292,
            '1.48' => 0.4306,
            '1.49' => 0.4319,
            '1.5' => 0.4332,
            '1.51' => 0.4345,
            '1.52' => 0.4357,
            '1.53' => 0.437,
            '1.54' => 0.4382,
            '1.55' => 0.4394,
            '1.56' => 0.4406,
            '1.57' => 0.4418,
            '1.58' => 0.4429,
            '1.59' => 0.4441,
            '1.6' => 0.4452,
            '1.61' => 0.4463,
            '1.62' => 0.4474,
            '1.63' => 0.4484,
            '1.64' => 0.4495,
            '1.65' => 0.4505,
            '1.66' => 0.4515,
            '1.67' => 0.4525,
            '1.68' => 0.4535,
            '1.69' => 0.4545,
            '1.7' => 0.4554,
            '1.71' => 0.4564,
            '1.72' => 0.4573,
            '1.73' => 0.4582,
            '1.74' => 0.4591,
            '1.75' => 0.4599,
            '1.76' => 0.4608,
            '1.77' => 0.4616,
            '1.78' => 0.4625,
            '1.79' => 0.4633,
            '1.8' => 0.4641,
            '1.81' => 0.4649,
            '1.82' => 0.4656,
            '1.83' => 0.4664,
            '1.84' => 0.4671,
            '1.85' => 0.4678,
            '1.86' => 0.4686,
            '1.87' => 0.4693,
            '1.88' => 0.4699,
            '1.89' => 0.4706,
            '1.9' => 0.4713,
            '1.91' => 0.4719,
            '1.92' => 0.4726,
            '1.93' => 0.4732,
            '1.94' => 0.4738,
            '1.95' => 0.4744,
            '1.96' => 0.475,
            '1.97' => 0.4756,
            '1.98' => 0.4761,
            '1.99' => 0.4767,
            '2' => 0.4772,
            '2.02' => 0.4783,
            '2.04' => 0.4793,
            '2.06' => 0.4803,
            '2.08' => 0.4812,
            '2.1' => 0.4821,
            '2.12' => 0.483,
            '2.14' => 0.4838,
            '2.16' => 0.4846,
            '2.18' => 0.4854,
            '2.2' => 0.4861,
            '2.22' => 0.4868,
            '2.24' => 0.4875,
            '2.26' => 0.4881,
            '2.28' => 0.4887,
            '2.3' => 0.4893,
            '2.32' => 0.4898,
            '2.34' => 0.4904,
            '2.36' => 0.4909,
            '2.38' => 0.4913,
            '2.4' => 0.4918,
            '2.42' => 0.4922,
            '2.44' => 0.4927,
            '2.46' => 0.4931,
            '2.48' => 0.4934,
            '2.5' => 0.4938,
            '2.52' => 0.4941,
            '2.54' => 0.4945,
            '2.56' => 0.4948,
            '2.58' => 0.4951,
            '2.6' => 0.4953,
            '2.62' => 0.4956,
            '2.64' => 0.4959,
            '2.66' => 0.4961,
            '2.68' => 0.4963,
            '2.7' => 0.4965,
            '2.72' => 0.4967,
            '2.74' => 0.4969,
            '2.76' => 0.4971,
            '2.78' => 0.4973,
            '2.8' => 0.4974,
            '2.82' => 0.4976,
            '2.84' => 0.4977,
            '2.86' => 0.4979,
            '2.88' => 0.498,
            '2.9' => 0.4981,
            '2.92' => 0.4982,
            '2.94' => 0.4984,
            '2.96' => 0.4985,
            '2.98' => 0.4986,
            '3' => 0.49865,
            '3.2' => 0.49931,
            '3.4' => 0.49966,
            '3.6' => 0.49984,
            '3.8' => 0.49992,
            '4' => 0.49996,
            '4.1' => 0.49997,
            '4.2' => 0.49997,
            '4.3' => 0.49998,
            '4.4' => 0.49998,
            '4.5' => 0.49999,
            '4.6' => 0.49999,
            '4.7' => 0.49999,
            '4.8' => 0.49999,
            '4.9' => 0.49999,
            '5' => 0.49999
        ];
    
/**
 * Return float result
 * ssX - value, $sMu - (mean), $sSigma - standard deviation
 * 
 * @param int $sX
 * @param float $sMu
 * @param float $sSigma
 * @return float
 */

    public function fPDF($sX, $sMu, $sSigma) {
        $sFormulaPartOne = round(((($sX + 1) - $sMu) / $sSigma),1);
        $sFormulaPartTwo = round(((($sX - 1) - $sMu) / $sSigma),1);
        $sX2 = $this->fFindValue($sFormulaPartOne);
        $sX1 = $this->fFindValue($sFormulaPartTwo);
        $sFinalResult = ($sX2 - $sX1);
        return $sFinalResult;
    }

/**
 * Calculate formula
 * 
 * @param float $sFormulaPart
 * @return float
 */

    private function fFindValue($sFormulaPart) {
        $sMinusFlag = false;
        if ($sFormulaPart < 0) {
            $sFormulaPart = abs($sFormulaPart);
            $sMinusFlag = true;
        }
        $sFormulaPart > 5 ? $sFormulaPart = 5 : "";
        foreach ($this->aLaplaceTable as $sFx => $sVal) {
            if ($sFx == $sFormulaPart) {
                $sValue = $sVal;
                break;
            }
            if ($sFx > $sFormulaPart) {
                $sValue = $sOldVal;
                break;
            }
            $sOldVal = $sVal;
            $sOldFx = $sFx;
        }
        ($sMinusFlag == true) ? $sValue = -$sValue : "";
        return $sValue;
    }
}

/*
//Example: 

$oLaplace= new cLaplaceProbability();
//$oLaplace->fPDF($sX, $sMu, $sSigma);
print number_format($oLaplace->fPDF(83, 60, 5),10);

// 0.0000100000

*/