<?php

/**
 * Catalin Ciobanu
 *
 * NOTICE OF LICENSE
 *
 * This source file is subject to the Open Software License (OSL 3.0)
 * that is bundled with this package in the file LICENSE.txt.
 * It is also available through the world-wide-web at this URL:
 * http://opensource.org/licenses/osl-3.0.php
 *
 * @package     Catalin_Seo
 * @copyright   Copyright (c) 2012 Catalin Ciobanu
 * @license     http://opensource.org/licenses/osl-3.0.php  Open Software License (OSL 3.0)
 */
class Catalin_SEO_Block_Catalog_Layer_Filter_Price extends Mage_Catalog_Block_Layer_Filter_Price
{

    /**
     * Class constructor
     * 
     * Set correct template depending on module state
     */
    public function __construct()
    {
        parent::__construct();
        if ($this->helper('catalin_seo')->isEnabled()
            && $this->helper('catalin_seo')->isPriceSliderEnabled()) {
            // Modify template to render price filter as slider
            $this->setTemplate('catalin_seo/catalog/layer/price.phtml');
        }
    }

    /**
     * Get max price for the collection
     * 
     * @return int
     */
    public function getMaxPriceInt()
    {
        return $this->_filter->getMaxPriceInt() + 1;
    }

    /**
     * URL Pattern used in javascript for price filtering
     * 
     * @return string
     */
    public function getUrlPattern()
    {
        $item = Mage::getModel('catalog/layer_filter_item')
            ->setFilter($this->_filter)
            ->setValue('__PRICE_VALUE__')
            ->setCount(0);

        return $item->getUrl();
    }

}
