
var ONE_THOUSAND = Math.pow(10, 3);
var ONE_MILLION = Math.pow(10, 6);
var ONE_BILLION = Math.pow(10, 9);
var ONE_TRILLION = Math.pow(10, 12);
var ONE_QUADRILLION = Math.pow(10, 15);
var ONE_QUINTILLION = Math.pow(10, 18);

function integerToWord(integer) {
    var prefix = '';
    var suffix = '';

    if (!integer){ return "zero"; }

    if(integer < 0){
        prefix = "negative";
        suffix = integerToWord(-1 * integer);
        return prefix + " " + suffix;
    }
    if(integer <= 90){
        switch (integer) {
            case integer < 0:
                prefix = "negative";
                suffix = integerToWord(-1 * integer);
                return prefix + " "  + suffix;
            case 1: return "one";
            case 2: return "two";
            case 3: return "three";
            case 4:  return "four";
            case 5: return "five";
            case 6: return "six";
            case 7: return "seven";
            case 8: return "eight";
            case 9: return "nine";
            case 10: return "ten";
            case 11: return "eleven";
            case 12: return "twelve";
            case 13: return "thirteen";
            case 14: return "fourteen";
            case 15: return "fifteen";
            case 16: return "sixteen";
            case 17: return "seventeen";
            case 18: return "eighteen";
            case 19: return "nineteen";
            case 20: return "twenty";
            case 30: return "thirty";
            case 40: return "forty";
            case 50: return "fifty";
            case 60: return "sixty";
            case 70: return "seventy";
            case 80: return "eighty";
            case 90: return "ninety";
            default: break;
        }
    }

    if(integer < 100){
        prefix = integerToWord(integer - integer % 10);
        suffix = integerToWord(integer % 10);
        return prefix + "-"  + suffix;
    }

    if(integer < ONE_THOUSAND){
        prefix = integerToWord(parseInt(Math.floor(integer / 100), 10) )  + " hundred";
        if (integer % 100){ suffix = " and "  + integerToWord(integer % 100); }
        return prefix + suffix;
    }

    if(integer < ONE_MILLION){
        prefix = integerToWord(parseInt(Math.floor(integer / ONE_THOUSAND), 10))  + " thousand";
        if (integer % ONE_THOUSAND){ suffix = integerToWord(integer % ONE_THOUSAND); }
    }
    else if(integer < ONE_BILLION){
        prefix = integerToWord(parseInt(Math.floor(integer / ONE_MILLION), 10))  + " million";
        if (integer % ONE_MILLION){ suffix = integerToWord(integer % ONE_MILLION); }
    }
    else if(integer < ONE_TRILLION){
        prefix = integerToWord(parseInt(Math.floor(integer / ONE_BILLION), 10))  + " billion";
        if (integer % ONE_BILLION){ suffix = integerToWord(integer % ONE_BILLION); }
    }
    else if(integer < ONE_QUADRILLION){
        prefix = integerToWord(parseInt(Math.floor(integer / ONE_TRILLION), 10))  + " trillion";
        if (integer % ONE_TRILLION){ suffix = integerToWord(integer % ONE_TRILLION); }
    }
    else if(integer < ONE_QUINTILLION){
        prefix = integerToWord(parseInt(Math.floor(integer / ONE_QUADRILLION), 10))  + " quadrillion";
        if (integer % ONE_QUADRILLION){ suffix = integerToWord(integer % ONE_QUADRILLION); }
    } else {
        return '';
    }
    return prefix + " "  + suffix;
}

/*
 function moneyToWord(value){
 var decimalValue = (value % 1);
 var integer = value - decimalValue;
 decimalValue = Math.round(decimalValue * 100);
 var decimalText = !decimalValue? '': integerToWord(decimalValue) + ' cent' + (decimalValue === 1? '': 's');
 var integerText= !integer? '': integerToWord(integer) + ' dollar' + (integer === 1? '': 's');
 return (
 integer && !decimalValue? integerText:
 integer && decimalValue? integerText + ' and ' + decimalText:
 !integer && decimalValue? decimalText:
 'zero cents'
 );
 }
 */

function floatToWord(value){
    var decimalValue = (value % 1);
    var integer = value - decimalValue;
    decimalValue = Math.round(decimalValue * 100);
    var decimalText = !decimalValue? '':
        decimalValue < 10? "point o' " + integerToWord(decimalValue):
            decimalValue % 10 === 0? 'point ' + integerToWord(decimalValue / 10):
            'point ' + integerToWord(decimalValue);
    return (
        integer && !decimalValue? integerToWord(integer):
            integer && decimalValue? [integerToWord(integer),  decimalText].join(' '):
                !integer && decimalValue? decimalText:
                    integerToWord(0)
    );
}


function digitToWord(val){
    var word = floatToWord(val);
    document.getElementById('valueintaka').setAttribute("value", word);
    document.getElementById('div').innerHTML = word;
}