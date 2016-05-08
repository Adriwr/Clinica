<?php
// src/Facto/UserBundle/Document/User.php

namespace AppBundle\Document\User;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ODM\MongoDB\Mapping\Annotations as ODM;

/**
 * @ODM\Document(repositoryClass="AppBundle\Repository\User\UserRepository")
 */
class User extends BaseUser
{
    /**
     * @ODM\Id(strategy="auto")
     */
    protected $id;
    /**
     * @ODM\String
     */
    protected $masterAccountId;
    /**
     * @ODM\String
     */
    protected $masterAccount;
}
