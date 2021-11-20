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
    	file_put_contents('/var/www/chroot/praktyka01/log.txt', "install construct\n");
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
        				'is_used_in_grid' => false,
        				'is_visible_in_grid' => false,
        				'is_filterable_in_grid' => false,
        				'visible' => true,
        				'is_html_allowed_on_front' => true,
        				'visible_on_front' => true
        		]
        		);
    }
}