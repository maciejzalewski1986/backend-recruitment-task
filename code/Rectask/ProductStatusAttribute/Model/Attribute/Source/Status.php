<?php

namespace Rectask\ProductStatusAttribute\Model\Attribute\Source;

use Magento\Eav\Model\Entity\Attribute\Source\AbstractSource;

class Status extends AbstractSource
{
    /**
     * Get all options
     * @return array
     */
    public function getAllOptions()
    {
        if (!$this->_options) {

        	$this->_options = [
        			['label' => __('Nowy'), 'value' => 1],
        			['label' => __('Powystawowy'), 'value' => 2],
        			['label' => __('Poleasingowy'), 'value' => 3],
        			['label' => __('Używany'), 'value' => 4],
        			['label' => __('Zwrócony'), 'value' => 5],
        	];

        }
        return $this->_options;
    }
}