<?php
/* @var $this Mage_Eav_Model_Entity_Setup  */

$this->startSetup();

$attributeName = 'is_sibling_navigation';
$this->removeAttribute('catalog_category', $attributeName);
$this->addAttribute('catalog_category', $attributeName, array(
    'type' => 'int',
    'group'     => 'Display Settings',
    'backend' => '',
    'frontend' => '',
    'label' => 'Display Siblings Instead of Children in Layered Navigation',
    'input' => 'select',
    'class' => '',
    'source' => 'eav/entity_attribute_source_boolean',
    'global' => Mage_Catalog_Model_Resource_Eav_Attribute::SCOPE_STORE,
    'visible' => true,
    'required' => false,
    'user_defined' => true,
    'default' => '0',
    'searchable' => false,
    'filterable' => false,
    'comparable' => false,
    'visible_on_front' => false,
    'unique' => false,
    'sort_order' => 500,
));

$this->endSetup();