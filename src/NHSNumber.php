<?php

namespace ByStones;

/**
 * NHS number
 */
class NHSNumber {

    /** @var string The NHS number */
    protected $number = null;

    /** @var bool|null Null until the number was validated then true or false */
    protected $isValid = null;

    /**
     * Constructur
     *
     * @param $number The NHS number
     */
    public function __construct($number) {
        $this->number = $number;
    }

    /**
     * Returns the NHS number
     *
     * @return string
     */
    public function getNumber() {
        return $this->number;
    }

    /**
     * Return whether the number is valid
     *
     * @return bool
     */
    public function isValid() {
        if ($this->isValid !== null) {
            return $this->isValid;
        }

        return ($this->isValid = $this->validateNumber());
    }

    /**
     * Validates the number
     *
     * @see http://www.datadictionary.nhs.uk/version2/data_dictionary/data_field_notes/n/nhs_number_de.asp?shownav=0
     * @return bool
     */
    protected function validateNumber() {
        if (!is_numeric($this->number)) {
            return false;
        }

        $number = (String) $this->number;
        if (strlen($number) !== 10) {
            return false;
        }

        $checksum = 0;
        for ($i = 0; $i < 9; $i++) {
            $checksum += $number[$i] * (10 - $i);
        }

        $checkdigit = 11 - ($checksum % 11);
        if ($checkdigit === 11) {
            $checkdigit = 0;
        }

        return $checkdigit !== 10 && $checkdigit == $number[9];
    }
}
