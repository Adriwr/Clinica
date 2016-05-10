<?php

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

    /**
     * Set masterAccountId
     *
     * @param string $masterAccountId
     * @return self
     */
    public function setMasterAccountId($masterAccountId)
    {
        $this->masterAccountId = $masterAccountId;
        return $this;
    }

    /**
     * Get masterAccountId
     *
     * @return string $masterAccountId
     */
    public function getMasterAccountId()
    {
        return $this->masterAccountId;
    }

    /**
     * Set masterAccount
     *
     * @param string $masterAccount
     * @return self
     */
    public function setMasterAccount($masterAccount)
    {
        $this->masterAccount = $masterAccount;
        return $this;
    }

    /**
     * Get masterAccount
     *
     * @return string $masterAccount
     */
    public function getMasterAccount()
    {
        return $this->masterAccount;
    }
}
