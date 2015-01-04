<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\ConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Checks if given phone number matches with constraint format.
 * Note that this validator does not validate blank fields, use NotBlank assert instead.
 *
 * @author Moisés Maciá <moises.macia@ideup.com>
 */
class PhoneValidator extends ConstraintValidator
{
    /**
     * @param $value
     * @param Constraint $constraint
     * @return bool
     * @deprecated In Symfony 2.6 does not work but remains backward compatibility 2.3
     */
    public function isValid($value, Constraint $constraint)
    {
        $this->validate($value, $constraint);
    }

    public function validate($value, Constraint $constraint)
    {
        if (empty($value)) {
            return true;
        }

        $ret = $this->validateNumber($value, $constraint->format);

        if (!$ret) {
            $this->setMessage($constraint->message);
        }

        return $ret;
    }

    /**
     * @param string $value
     * @param string $format Regular expression format
     * @return bool
     */
    protected function validateNumber($value, $format)
    {
        $ret = preg_match($format, trim($value));
        return ($ret !== false && $ret >= 1);
    }
}

