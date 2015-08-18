<?php

class DEG_SiblingNav_Block_Navigation extends Mage_Catalog_Block_Navigation
{
    protected $_parentChildCategories = null;

    /**
     * Returns the current category's parent's child categories (siblings).
     * See Mage_Catalog_Block_Navigation::getCurrentChildCategories
     *
     * @return array|null
     */
    public function getParentChildCategories()
    {
        if (null === $this->_parentChildCategories) {
            $layer = Mage::getSingleton('catalog/layer');
            $category = $layer->getCurrentCategory()->getParentCategory();
            $this->_parentChildCategories = $category->getChildrenCategories();
            $productCollection = Mage::getResourceModel('catalog/product_collection');
            $layer->prepareProductCollection($productCollection);
            $productCollection->addCountToCategories($this->_parentChildCategories);
        }
        return $this->_parentChildCategories;
    }

    /**
     * @return Mage_Catalog_Model_Resource_Category_Collection
     */
    public function getCurrentChildCategories()
    {
        if (null === $this->_currentChildCategories) {
            $category = Mage::getModel('catalog/category')->getCollection()
                ->addFieldToFilter('name', 'Shop')
                ->addStoreFilter(Mage::app()->getStore()->getId())
                ->getFirstItem();
            $layer = Mage::getSingleton('catalog/layer');
            $this->_currentChildCategories = $category->getChildrenCategories();
            $productCollection = Mage::getResourceModel('catalog/product_collection');
            $layer->prepareProductCollection($productCollection);
            $productCollection->addCountToCategories($this->_currentChildCategories);
        }
        return $this->_currentChildCategories;
    }
}
