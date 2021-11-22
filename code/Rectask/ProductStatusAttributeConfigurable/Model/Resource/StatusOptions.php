<?php

namespace Rectask\ProductStatusAttributeConfigurable\Model\Resource;

use Magento\Framework\Model\Resource\Db\AbstractDb;

class News extends AbstractDb
{
    /**
     * Define main table
     */
    protected function _construct()
    {
        $this->_init('product_status_attribute_configurable_options', 'id');
    }
}