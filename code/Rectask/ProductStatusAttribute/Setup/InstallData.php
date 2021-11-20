<?php
/**

 */

namespace Rectask\ProductStatusAttribute\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
* @codeCoverageIgnore
*/
class InstallData implements InstallDataInterface
{
    /**
     * Eav setup factory
     * @var EavSetupFactory
     */
    private $eavSetupFactory;

    /**
     * Init
     * @param EavSetupFactory $eavSetupFactory
     */
    public function __construct(EavSetupFactory $eavSetupFactory)
    {

        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
    	
        $eavSetup = $this->eavSetupFactory->create();

        
        $eavSetup->addAttribute(
        		Product::ENTITY,
        		'product_label',
        		[
        				'group' => 'General',
        				'type' => 'varchar',
        				'label' => $new_label,
        				'input' => 'multiselect',
        				'source' => 'Rectask\ProductStatusAttribute\Model\Attribute\Source\Status',
        				'frontend' => 'Rectask\ProductStatusAttribute\Model\Attribute\Frontend\Status',
        				'backend' => 'Magento\Eav\Model\Entity\Attribute\Backend\ArrayBackend',
        				'required' => false,
        				'sort_order' => 50,
        				'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
        				'is_used_in_grid' => true, //czy atrybut może byc na liscie produktow w panelu admina
        				'is_visible_in_grid' => true, //czy atrybut jest domyslnie wlaczony w panelu admina
        				'is_filterable_in_grid' => false,
        				'visible' => true,
        				'is_html_allowed_on_front' => true,
        				'visible_on_front' => true
        		]
        		);

    }
}