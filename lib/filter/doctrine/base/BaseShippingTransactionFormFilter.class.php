<?php

/**
 * ShippingTransaction filter form base class.
 *
 * @package    primal
 * @subpackage filter
 * @author     Your name here
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseShippingTransactionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'expected_date' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'staff_id'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('Staff'), 'add_empty' => true)),
      'destination'   => new sfWidgetFormFilterInput(),
      'note'          => new sfWidgetFormFilterInput(),
      'isactive'      => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'created_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at'    => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'expected_date' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'staff_id'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('Staff'), 'column' => 'id')),
      'destination'   => new sfValidatorPass(array('required' => false)),
      'note'          => new sfValidatorPass(array('required' => false)),
      'isactive'      => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'created_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at'    => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('shipping_transaction_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'ShippingTransaction';
  }

  public function getFields()
  {
    return array(
      'id'            => 'Number',
      'expected_date' => 'Date',
      'staff_id'      => 'ForeignKey',
      'destination'   => 'Text',
      'note'          => 'Text',
      'isactive'      => 'Boolean',
      'created_at'    => 'Date',
      'updated_at'    => 'Date',
    );
  }
}
