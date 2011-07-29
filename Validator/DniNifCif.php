<?php

namespace Ideup\ExtraValidatorBundle\Validator;

use
    Symfony\Component\Validator\Constraint
;

class DniNifCif extends Constraint
{
    public $message = "El valor no es un DNI/NIF/CIF válido";

    public function validatedBy()
    {
        return get_class($this).'Validator';
    }
}
