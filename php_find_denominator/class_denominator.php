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

namespace FindDenominator;

/**
 * Find denominator for number one
 */

class cFindDenominator {
    
/**
 * 
 * Prepare number (replace exponential format to ordinary format)
 * 
 * @param float $sNumber
 * @return integer
 */
    private function fModifyNumber($sNumber) {

        $sFormatNumber = number_format($sNumber, 1000);
        $sModifiedCounter = 1;
        if (floor($sFormatNumber) == 0) {
            $aString = str_split($sFormatNumber);
            foreach ($aString as $sVal) {
                if ($sVal == 0) {
                    $sCount++;
                } else {
                    if ($sVal !== ".") {
                        break;
                    }
                }
            }
            $sCount = $sCount - 3;
            if ($sCount >= 1) {
                $sModifiedNumber = $sFormatNumber * pow(10, $sCount);
                $sModifiedCounter = pow(10, $sCount);
            } else {
                $sModifiedNumber = $sFormatNumber;
            }
        }

        $sValue=$sModifiedNumber;
        while($sValue<1) {
            $sValue +=$sModifiedNumber;
            $sIteration+=1;
        }
        
        return ($sIteration * $sModifiedCounter);
    }
    
/**
 * Return float denominator or full fraction string
 * 
 * @param float $sNumber
 * @param boolean $sOneFlag
 * @return string or integer
 */
    public function fGetResult($sNumber, $sOneFlag=false) {
        if (($sNumber>0) && ($sNumber<1)) { 
            ($sOneFlag==true) ? $sResult="1/".$this->fModifyNumber($sNumber) : $sResult=$this->fModifyNumber($sNumber);
        } else {
            print "Error: value is null or equal one, or greater than one! ".$sNumber."\n";
        }
        
        return $sResult;
    }
}

/*      
//Example:

$oFindOne = new cFindDenominator();
print "result: ".$oFindOne->fGetResult(0.088168188,true);

// result: 1/11

*/

?>