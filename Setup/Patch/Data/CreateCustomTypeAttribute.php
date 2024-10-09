<?php

declare(strict_types=1);

namespace Mati\CustomType\Setup\Patch\Data;

class CreateCustomTypeAttribute implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    public function __construct(
        private readonly \Magento\Eav\Setup\EavSetupFactory $eavSetupFactory,
        private readonly \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup
    ) {

    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);

        $eavSetup->addAttribute(
            \Magento\Catalog\Model\Product::ENTITY,
            'custom_type',
            [
                'type' => 'int',
                'input' => 'select',
                'label' => 'Custom Type',
                'source' => \Mati\CustomType\Model\Product\Attribute\Source\CustomType::class,
                'visible' => true,
                'required' => false,
                'user_defined' => false,
                'default' => \Mati\CustomType\Model\Product\Attribute\Source\CustomType::VALUE_NEW,
                'searchable' => false,
                'filterable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
            ]
        );

        $this->moduleDataSetup->endSetup();
    }


    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }
}
