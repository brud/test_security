<?php

namespace AppBundle\Entity;

use Symfony\Bridge\Doctrine\Security\User\UserLoaderInterface;
use Doctrine\ORM\EntityRepository;

class ManagerRepository extends EntityRepository implements UserLoaderInterface
{
    public function loadUserByUsername($email)
    {
        die($email);
        return $this->findOneBy(['email', $email]);
    }
}