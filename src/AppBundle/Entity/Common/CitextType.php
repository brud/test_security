<?php

namespace AppBundle\Entity\Common;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * Type that maps an PgSQL citext to a PHP string.
 *
 */
class CitextType extends Type
{
    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return 'citext';
    }

    /**
     * {@inheritdoc}
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if($platform->getName() === 'postgresql') return 'CITEXT';
        else return $platform->getVarcharTypeDeclarationSQL([]);
    }

    /**
     * {@inheritdoc}
     */
    public function getBindingType()
    {
        return \PDO::PARAM_STR;
    }

    /**
     * {@inheritdoc}
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return (null === $value) ? null : (string) $value;
    }
}