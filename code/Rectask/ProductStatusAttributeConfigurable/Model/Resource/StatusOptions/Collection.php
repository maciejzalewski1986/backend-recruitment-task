<?php

namespace Rectask\ProductStatusAttributeConfigurable\Model\Resource\News;

use Magento\Framework\Model\Resource\Db\Collection\AbstractCollection;

class Collection extends AbstractCollection
{
    /**
     * Define model & resource model
     */
    protected function _construct()
    {
        $this->_init(
            'Rectask\ProductStatusAttributeConfigurable\Model\News',
            'Rectask\ProductStatusAttributeConfigurable\Model\Resource\News'
        );
    }
}