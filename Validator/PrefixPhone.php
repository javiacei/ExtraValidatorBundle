<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class PrefixPhone extends Constraint
{
    public $message = "It is not a valid phone number";
    public $format  = '/(\+\d{2,3})?\s+(\d{2,3}\s)+|(\d+)/';

    public function requiredOptions()
    {
        return array();
    }

    public function defaultOption()
    {
        return '';
    }

    public function validatedBy()
    {
        return __NAMESPACE__.'\PhoneValidator';
    }
}

