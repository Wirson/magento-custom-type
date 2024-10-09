<?php

declare(strict_types=1);

namespace Mati\CustomType\Model\Product\Attribute\Source;

class CustomType extends \Magento\Eav\Model\Entity\Attribute\Source\AbstractSource
{
    public const VALUE_NEW = 1;
    public const VALUE_DISCOUNT = 2;
    public const VALUE_EXCLUSIVE = 3;

    public function getAllOptions()
    {
        return [
            ['label' => __('New'), 'value' => self::VALUE_NEW],
            ['label' => __('Discount'), 'value' => self::VALUE_DISCOUNT],
            ['label' => __('Exclusive'), 'value' => self::VALUE_EXCLUSIVE],
        ];
    }
}
