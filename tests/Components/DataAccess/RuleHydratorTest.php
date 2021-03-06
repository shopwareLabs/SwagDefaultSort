<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Shopware\SwagDefaultSort\Test\Components\ValueObject;

use Shopware\SwagDefaultSort\Components\DataAccess\RuleHydrator;
use Shopware\SwagDefaultSort\Components\DataAccess\RuleVo;

/**
 * Class DatabaseAdapter.
 *
 * Sorry no fixtures here, will only test if the querys are valid....
 */
class RuleHydratorTest extends \PHPUnit_Framework_TestCase
{
    /**
     * @var RuleHydrator
     */
    private $ruleHydrator;

    public function setUp()
    {
        $this->ruleHydrator = new RuleHydrator();
    }

    /**
     * @return array
     */
    public function getFixtures()
    {
        return [
            [
                'id' => 1,
                'sortOrder' => 0,
                'definitionUid' => 's_articles::name',
                'descending' => true,
            ],
            [
                'id' => 2,
                'sortOrder' => 1,
                'definitionUid' => 's_articles::datum',
                'descending' => false,
            ],
        ];
    }

    public function testVoGenerate()
    {
        $vos = $this->ruleHydrator->createRuleVos($this->getFixtures());
        $this->assertContainsOnlyInstancesOf(RuleVo::class, $vos);
    }

    public function testVoDataComplete()
    {
        $vo = $this->ruleHydrator->createRuleVo([
                'id' => 2,
                'sortOrder' => 1,
                'definitionUid' => 's_articles::datum',
                'descending' => false,
        ]);

        $this->assertEquals(2, $vo->getId());
        $this->assertEquals(1, $vo->getOrder());
        $this->assertEquals('s_articles::datum', $vo->getDefinitionUid());
        $this->assertEquals(false, $vo->isDescending());
    }
}
