<?php

class SocialUserIdentity extends CUserIdentity
{
	/**
	 * Authenticates a user.
	 * The example implementation makes sure if the username and password
	 * are both 'demo'.
	 * In practical applications, this should be changed to authenticate
	 * against some persistent user identity storage (e.g. database).
	 * @return boolean whether authentication succeeds.
	 */
    private $_id;

    public function authenticate()
    {
        $user=StudentReg::model()->findByAttributes(array('email'=>$this->username));
        if($user===null)
            $this->errorCode=self::ERROR_USERNAME_INVALID;
        else
        {
            $this->_id=$user->id;
            $this->setState('email', $user->email);
            $this->errorCode=self::ERROR_NONE;
        }
        return !$this->errorCode;
    }

    public function getId()
    {
        return $this->_id;
    }
}