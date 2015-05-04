<?php


namespace Shopware\SwagDefaultSort\Test\Components\SortDefinition;

use \Shopware\SwagDefaultSort\Components\SortDefinition\DefinitionCollection;

class DefinitionCollectionTest extends \Shopware\Components\Test\Plugin\TestCase {

    /**
     * @var DefinitionCollection
     */
    private $collection;

    public function setUp() {
        $this->collection = new DefinitionCollection();
    }

    public function testAllForReturnValues() {
        foreach($this->collection as $definition) {
            $this->assertNotEmpty($definition->getTableName());
            $this->assertNotEmpty($definition->getFieldName());
        }
    }

    public function testCount() {
        $this->assertGreaterThanOrEqual(1, count($this->collection));
    }

    public function testSubCollections() {
        $iterator = $this->collection->getTableIterator('s_articles');

        $this->assertNotEmpty($iterator);
    }

}