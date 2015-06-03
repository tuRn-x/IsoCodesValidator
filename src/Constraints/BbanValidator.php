<?php

namespace SLLH\IsoCodesValidator\Constraints;

use IsoCodes;
use SLLH\IsoCodesValidator\AbstractIsoCodesConstraintValidator;
use Symfony\Component\Validator\Constraint;

/**
 * Class BbanValidator.
 *
 * @author Sullivan Senechal <soullivaneuh@gmail.com>
 */
class BbanValidator extends AbstractIsoCodesConstraintValidator
{
    /**
     * {@inheritdoc}
     */
    public function validate($value, Constraint $constraint)
    {
        parent::validate($value, $constraint);

        if ($value && !IsoCodes\Bban::validate($value)) {
            $this->createViolation($constraint->message);
        }
    }
}
