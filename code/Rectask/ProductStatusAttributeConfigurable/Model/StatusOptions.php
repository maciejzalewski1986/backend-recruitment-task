<?php

namespace  Rectask\ProductStatusAttributeConfigurable\Model;

use Magento\Framework\Model\AbstractModel;

class StatusOptions extends AbstractModel
{
    /**
     * Define resource model
     */
    protected function _construct()
    {
        $this->_init('Rectask\ProductStatusAttributeConfigurable\Model\Resource\StatusOptions');
    }
}