<?php

declare(strict_types=1);

namespace Mati\CustomType\Setup\Patch\Data;

class SetCustomTypeValues implements \Magento\Framework\Setup\Patch\DataPatchInterface
{
    public function __construct(
        private readonly \Magento\Catalog\Model\ResourceModel\Product $productResource,
        private readonly \Magento\Catalog\Model\ResourceModel\Product\CollectionFactory $collectionFactory,
        private readonly \Magento\Framework\Setup\ModuleDataSetupInterface $moduleDataSetup,
    ) {

    }

    public function apply()
    {
        $this->moduleDataSetup->startSetup();
        $collection = $this->collectionFactory->create();
        foreach ($collection as $product) {
            $product->setData('custom_type', \Mati\CustomType\Model\Product\Attribute\Source\CustomType::VALUE_DISCOUNT);
            $this->productResource->saveAttribute($product, 'custom_type');
        }

        $this->moduleDataSetup->endSetup();
    }


    /**
     * @inheritDoc
     */
    public static function getDependencies()
    {
        return [
            \Mati\CustomType\Setup\Patch\Data\CreateCustomTypeAttribute::class
        ];
    }

    /**
     * @inheritDoc
     */
    public function getAliases()
    {
        return [];
    }
}
