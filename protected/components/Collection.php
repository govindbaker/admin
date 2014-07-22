<?php
class Collection extends CActiveRecord{
// company_id, customer_id and employee_id are automatically populated with the current context as appropriate
  public function defaultScope() {
    if ($this->hasAttribute('company_id')){
      $returnScope = array(
        //'condition'=>'(company_id='.Controller::getCompanyId().')',
        'condition'=>$this->getTableAlias(false,false) . '.company_id='.Controller::getCompanyId(),
      );
    } else {
      $returnScope = array();
    }

    return $returnScope;
  }
}
