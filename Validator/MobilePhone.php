<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class MobilePhone extends Constraint
{
    public $message = "It is not a valid mobile phone number";
    public $format  = '/[67]\d{8}/';

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

