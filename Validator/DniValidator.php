<?php

namespace Ideup\ExtraValidatorBundle\Validator;

use
    Symfony\Component\Validator\ConstraintValidator,
    Symfony\Component\Validator\Constraint
;

class DniValidator extends ConstraintValidator
{
    protected $dniFormatExpr = '/((^[A-Z]{1}[0-9]{7}[A-Z0-9]{1}$|^[T]{1}[A-Z0-9]{8}$)|^[0-9]{8}[A-Z]{1}$)/';
    protected $standardDniExpr = '/(^[0-9]{8}[A-Z]{1}$)/';
    protected $avaliableLastChar = 'TRWAGMYFPDXBNJZSQVHLCKE';


    public function isValid($value, Constraint $constraint)
    {
        $ret = $this->checkDni($value);

        if (!$ret) {
            $this->setMessage($constraint->message);
        }

        return $ret;
    }

    private function splitDni($dni)
    {
        return str_split($dni, 1);
    }

    protected function checkDniFormat($dni)
    {
        return preg_match($this->dniFormatExpr, $dni);
    }

    protected function isValidDniLastChar($dni)
    {
        $dniCharacters = $this->splitDni($dni);
        return ($dniCharacters[8] == substr($this->avaliableLastChar, substr($dni, 0, 8) % 23, 1));
    }

    protected function checkStandardDni($dni)
    {
        // Check if standard DNI
        if (preg_match($this->standardDniExpr, $dni)) {
            return $this->isValidDniLastChar($dni);
        }
    }

    protected function checkSpecialDni($dni)
    {
        $dniCharacters = $this->splitDni($dni);

        $plus = $dniCharacters[2] + $dniCharacters[4] + $dniCharacters[6];
        for ($i = 1; $i < 8; $i += 2) {
            $plus += (int) substr((2 * $dniCharacters[$i]), 0, 1) + (int) substr((2 * $dniCharacters[$i]), 1, 1);
        }
        $n = 10 - substr($plus, strlen($plus) - 1, 1);
        if (preg_match('/^[KLM]{1}/', $dni)) {
            return ($dniCharacters[8] == chr(64 + $n) || $this->isValidDniLastChar($dni));
        }
    }

    /**
     * @param $dni
     * @return boolean
     */
    protected function checkDni($dni)
    {
        $dni = strtoupper($dni);

        // Invalid format
        if (!$this->checkDniFormat($dni)) {
            return false;
        }

        // Standard Dnis
        if ($this->checkStandardDni($dni) || $this->checkSpecialDni($dni)) {
            return true;
        }

        return false;
    }

}
