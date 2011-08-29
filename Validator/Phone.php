<?php
/* vim: set expandtab tabstop=4 shiftwidth=4: */

namespace Ideup\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Phone extends Constraint
{
    public $message = "It is not a valid phone number";
    public $format;

    public function requiredOptions()
    {
        return array('format');
    }

    public function defaultOption()
    {
        return 'format';
    }

    public function validatedBy()
    {
        return __CLASS__.'Validator';
    }
}

