<?php

/**
 * Base project form.
 * 
 * @package    primal
 * @subpackage form
 * @author     Your name here 
 * @version    SVN: $Id: BaseForm.class.php 20147 2009-07-13 11:46:57Z FabianLange $
 */
class BaseForm extends sfFormSymfony
{
    protected function unsetTimeStampable() {
        unset(
            $this['created_at'],
            $this['updated_at']
        );
    } 

    protected function embedUser() {
        unset($this['sf_guard_user_id']);
        $formUser = new SfGuardUserEditForm($this->getObject()->getUser());
        $this->embedForm('User',$formUser);
    }

    function getCurrentUser() {
        return sfContext::getInstance()->getUser();
    }
} 
