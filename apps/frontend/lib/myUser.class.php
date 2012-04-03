<?php

class myUser extends sfGuardSecurityUser
{

    function isAdmin() {
        return ($this->hasGroup('am_admin') || $this->hasGroup('req_admin'));
    }

    function getStaff() {

      return Doctrine_Query::create() 
             ->from('staff s')
             ->where('s.sf_guard_user_id = ?',$this->getId())
             ->fetchOne();

    }

    function getStaffId() {
 
      $staff = $this->getStaff()->id;
      return $staff;

    }
}
