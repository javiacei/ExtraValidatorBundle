<?php

namespace Ideup\ExtraValidatorBundle\Validator;

use
    Symfony\Component\Validator\Constraint
;

/**
 * @Annotation
 */
class Dni extends Constraint
{
    public $message = "It is not a valid DNI";

    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}
