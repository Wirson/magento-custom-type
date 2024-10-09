<?php

declare(strict_types=1);

namespace Mati\CustomType\Model\Resolver\Product;

class CustomType implements \Magento\Framework\GraphQl\Query\ResolverInterface
{
    public function resolve(
        \Magento\Framework\GraphQl\Config\Element\Field $field,
        $context,
        \Magento\Framework\GraphQl\Schema\Type\ResolveInfo $info,
        array $value = null,
        array $args = null
    ) {
        if (!isset($value['model'])) {
            throw new \Magento\Framework\Exception\LocalizedException(__('"model" value should be specified'));
        }

        /** @var \Magento\Catalog\Model\Product $product */
        $product = $value['model'];

        return $product->getAttributeText('custom_type');
    }

}
