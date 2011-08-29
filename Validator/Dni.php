<?php

namespace Ideup\ExtraValidatorBundle\Validator;

use Symfony\Component\Validator\Constraint;

/**
 * @Annotation
 */
class Dni extends Constraint
{
    public $message = "It is not a valid DNI";

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
        return __CLASS__.'Validator';
    }
}
