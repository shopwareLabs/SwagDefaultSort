<?php


namespace Shopware\SwagDefaultSort\Test\Components\Integration\ValueObject;

use Shopware\SwagDefaultSort\Components\ValueObject\FieldVO;
use Shopware\SwagDefaultSort\Components\ValueObject\TranslateFilter;
use Shopware\SwagDefaultSort\Components\SortDefinition\DefinitionCollection;
use Shopware\SwagDefaultSort\Components\SortDefinition\AbstractSortDefinition;

class FieldVoCollectionTest extends \PHPUnit_Framework_TestCase {

    /**
     * @var DefinitionCollection
     */
    private $definitionCollection;

    public function setUp() {
        $this->definitionCollection = new DefinitionCollection();
    }

    public function testGetters() {
        $filter = new TranslateFilter(Shopware()->Snippets()->getNamespace('backend/swwagdefaultsort/tables'));

        /** @var AbstractSortDefinition $definition */
        foreach($this->definitionCollection as $definition) {
            $fieldVo = new FieldVO(
                $definition,
                $filter
            );

            //@todo mock the available locales to test whether everything is translated
//            $this->assertNotEmpty($tableVo->getTranslation());
//            $this->assertNotEquals($tableVo->getTranslation(), $tableName);

            $json = json_encode($fieldVo);
            $array = json_decode($json, true);

            $this->assertArrayHasKey('tableName', $array);
            $this->assertArrayHasKey('translation', $array);
            $this->assertArrayHasKey('fieldName', $array);
        }
    }

}