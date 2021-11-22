<?php

namespace Rectask\ProductStatusAttributeConfigurable\Model\Config\Source;


use Magento\Eav\Model\ResourceModel\Entity\Attribute\OptionFactory;
use Magento\Framework\DB\Ddl\Table;

class Status extends AbstractSource
{
	public function __construct(\Vendor\Module\Model\CustomFactory $customFactory)
	{
		$this->customFactory = $customFactory;
	}
	
	public function getAllOptions()
	{
		$customCollection = $this->customFactory->create()->getCollection();

		foreach($customCollection as $custom)
		{
			$this->_options[] = ['label'=> $custom->getFieldName(), 'value' => $custom->getId()];
		}
		return $this->_options;
	}
	
	/**
	 * Get a text for option value
	 *
	 * @param string|integer $value
	 * @return string|bool
	 */
	public function getOptionText($value)
	{
		foreach ($this->getAllOptions() as $option) {
			if ($option['value'] == $value) {
				return $option['label'];
			}
		}
		return false;
	}
}