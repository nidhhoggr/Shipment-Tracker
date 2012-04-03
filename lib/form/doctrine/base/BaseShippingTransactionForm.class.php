<?php

/**
 * ShippingTransaction form base class.
 *
 * @method ShippingTransaction getObject() Returns the current form's model object
 *
 * @package    primal
 * @subpackage form
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseShippingTransactionForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'            => new sfWidgetFormInputHidden(),
      'expected_date' => new sfWidgetFormDate(),
      'staff_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'), 'add_empty' => false)),
      'destination'   => new sfWidgetFormInputText(),
      'note'          => new sfWidgetFormTextarea(),
      'isactive'      => new sfWidgetFormInputCheckbox(),
      'created_at'    => new sfWidgetFormDateTime(),
      'updated_at'    => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'            => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'expected_date' => new sfValidatorDate(array('required' => false)),
      'staff_id'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'))),
      'destination'   => new sfValidatorString(array('max_length' => 32, 'required' => false)),
      'note'          => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'isactive'      => new sfValidatorBoolean(array('required' => false)),
      'created_at'    => new sfValidatorDateTime(),
      'updated_at'    => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('shipping_transaction[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShippingTransaction';
  }

}
