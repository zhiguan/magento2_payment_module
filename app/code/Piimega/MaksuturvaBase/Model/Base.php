<?php
namespace Piimega\MaksuturvaBase\Model;

class Base extends \Piimega\Maksuturva\Model\Payment
{
    protected $_code = 'maksuturva_base_payment';
    protected $_allowedMethods = [];

    public function getMethods()
    {
        if(!$this->_methods){
            $this->_methods = $this->_getPaymentMethods();
        }
        foreach($this->_methods as $method){
            if(in_array($method->code, $this->_getAllowedMethods())){
                $this->_allowedMethods[] = $method;
            }
        }
        return $this->_allowedMethods;
    }

    public function getTitle()
    {
        return $this->getConfigData('title');
    }
}
