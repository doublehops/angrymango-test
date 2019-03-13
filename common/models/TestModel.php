<?php
namespace common\models;

use Yii;
use yii\base\Model;
use yii\base\UserException;

/**
 * Login form
 */
class TestModel extends Model
{
    public $name;
    public $number;


    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'number'], 'required'],
			['name', 'match', 'pattern' => '/^[a-zA-Z .]+$/', 'message' => 'Valid chars are A-Z, space and full-stop.'],
			['number', 'match', 'pattern' => '/^[0-9]+.[0-9]{2}$/', 'message' => 'Should be a valid dollar and cents amount such as 123.45. Commas are not accepted.'],
        ];
    }

    public function fields()
    {
        return [
            'name',
            'originalNumber' => function() {
                return $this->number;
            },
            'convertedNumber' => function() {
                return $this->convertNumber($this->number);
            },
        ];
    }

    /**
     * Convert number to English.
     *
     * @param string $number
     * @return string
     */
	public function convertNumber($number)
	{
		list($dollars, $cents) = explode('.', $number);

        if ($dollars > 9999) {
            throw new UserException('Sorry, the application currently can only handle to 9999.99');
        }

        $cents = $this->convert($cents) .' cents';
        $dollarStr = '';
        
        if (strlen($dollars) == 4) {
            $dollarStr .= $this->convert($dollars[0]) . ' thousand ';
            $dollars = substr($dollars, 1);
        }
        
        if (strlen($dollars) == 3) {
            $dollarStr .= $this->convert($dollars[0]) . ' hundred and ';
            $dollars = substr($dollars, 1);
        }

        $dollarStr .= $this->convert($dollars) .' dollars';

		return strtoupper($dollarStr .' and '. $cents);
	}

    /**
     * Grab number and find appropriate method to convert with.
     *
     * @param string $number
     * @return string
     */
	protected function convert($number)
	{
        if ($number[0] == 0) {
            $number = substr($number, 1);
        }

        if ($number < 21) {
            return (string)$this->upTo20($number);
        }

        $string = $this->getTens(substr($number, 0, 1) .'0');
        $string .= '-'. $this->upTo20(substr($number, 1));

        return $string;
    }

    /**
     * Find English number below 20.
     *
     * @param string $number
     * @return string
     */
    protected function upTo20($number)
    {
        if ($number > 20) {
            throw new UserException('Number is out of range');
        }

        return $this->numbersTo20()[$number];
    }

    /**
     * Get English number for tens.
     *
     * @param string $number
     * @return string
     */
    protected function getTens($number)
    {
        return $this->tens()[$number]; 
    }

    /**
     * Return array of English tens.
     *
     * @return array
     */
    protected function tens()
    {
        return [
            '10' => 'ten',
            '20' => 'twenty',
            '30' => 'thirty',
            '40' => 'fourty',
            '50' => 'fifty',
            '60' => 'sixty',
            '70' => 'seventy',
            '80' => 'eigthy',
            '90' => 'ninety',
        ];
    }

    /**
     * Return array of English numbers up to 20.
     *
     * @return array
     */
    protected function numbersTo20()
    {
        return [
            '1'  => 'one',
            '2'  => 'two',
            '3'  => 'three',
            '4'  => 'four',
            '5'  => 'five',
            '6'  => 'six',
            '7'  => 'seven',
            '8'  => 'eight',
            '9'  => 'nine',
            '10' => 'ten',
            '11' => 'eleven',
            '12' => 'twelve',
            '13' => 'thirteen',
            '14' => 'fourteen',
            '15' => 'fifteen',
            '16' => 'sixteen',
            '17' => 'seventeen',
            '18' => 'eighteen',
            '19' => 'nineteen',
            '20' => 'twenty',
        ];
    }
}
