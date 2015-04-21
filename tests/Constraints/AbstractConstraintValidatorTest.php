<?php

namespace SLLH\IsoCodesValidator\Constraints;

use Symfony\Component\Validator\Constraint;
use Symfony\Component\Validator\Constraints\Blank;
use Symfony\Component\Validator\Tests\Constraints\AbstractConstraintValidatorTest as BaseAbstractConstraintValidatorTest;
use Symfony\Component\Validator\Validation;


abstract class AbstractConstraintValidatorTest extends BaseAbstractConstraintValidatorTest
{
    /**
     * @var Constraint
     */
    protected $constraint;

    protected function setUp()
    {
        parent::setUp();

        $this->constraint = $this->createConstraint();
    }

    protected function getApiVersion()
    {
        return Validation::API_VERSION_2_5_BC;
    }

    public function testUnexpectedConstraintException()
    {
        $this->setExpectedException(
            'Symfony\Component\Validator\Exception\UnexpectedTypeException',
            sprintf('Expected argument of type "%s", "Symfony\Component\Validator\Constraints\Blank" given', get_class($this->constraint))
        );

        $this->validator->validate(null, new Blank());
    }

    public function testNullIsValid()
    {
        $this->validator->validate(null, $this->createConstraint());

        $this->assertNoViolation();
    }

    public function testEmptyStringIsValid()
    {
        $this->validator->validate('', $this->createConstraint());

        $this->assertNoViolation();
    }

    abstract protected function createConstraint();
}