<?php
/**

 */

namespace Rectask\ProductStatusAttribute\Setup;

use Magento\Catalog\Model\Product;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;

use Magento\Framework\Setup\UpgradeDataInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\ModuleContextInterface;

/**
* @codeCoverageIgnore
*/
class UpgradeData implements UpgradeDataInterface
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
    public function __construct(
    		EavSetupFactory $eavSetupFactory
    		)
    {
        $this->eavSetupFactory = $eavSetupFactory;
    }

    /**
     * @inheritdoc
     * @SuppressWarnings(PHPMD.CyclomaticComplexity)
     * @SuppressWarnings(PHPMD.ExcessiveMethodLength)
     * @SuppressWarnings(PHPMD.NPathComplexity)
     */
    public function upgrade(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        
		$eavSetup = $this->eavSetupFactory->create();
    	
 	
    	$new_label = 'Product label';
		
    	//działa jesli atrybut nie istnieje
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
    	
    	
    	
    	//NIe dziala
    	/*
    	$setup->startSetup();
    	
    	$eavSetup->updateAttribute(
    			Product::ENTITY,
    			'product_label',
    			
    			'backend_type' ,
    			'int'
    			);

        $eavSetup->updateAttribute(
        		Product::ENTITY,
        		'frontend_label',

				'label' ,
        			$new_label
        		);
        

        
        $eavSetup->updateAttribute(
        		Product::ENTITY,
        		'product_label',
        		
        		'frontend_input' ,
        		'multiselect'
        		);
        $setup->endSetup();
        
        
        file_put_contents('/var/www/chroot/praktyka01/log.txt', " Setup done\n", FILE_APPEND	);
        */
        /*
        $eavSetup->updateAttribute(
            Product::ENTITY,
            'product_label',
            [
                'group' => 'General',
            	'type' => 'int',
                'label' => 'Product label 112',
                'input' => 'multiselect',
            	'source' => 'Rectask\ProductStatusAttribute\Model\Attribute\Source\Status',
            	'frontend' => 'Rectask\ProductStatusAttribute\Model\Attribute\Frontend\Status',
            	'backend' => 'Rectask\ProductStatusAttribute\Model\Attribute\Backend\Status',
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
        */
        

    }
}