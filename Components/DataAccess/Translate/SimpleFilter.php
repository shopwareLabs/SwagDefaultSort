<?php
/**
 * (c) shopware AG <info@shopware.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Shopware\SwagDefaultSort\Components\DataAccess\Translate;

/**
 * Class SimpleFilter.
 *
 * KJust a proxy for 'Enlight_Components_Snippet_Namespace'
 */
class SimpleFilter implements FilterInterface
{
    /**
     * @var \Enlight_Components_Snippet_Namespace
     */
    private $namespace;

    /**
     * @param \Enlight_Components_Snippet_Namespace $namespace
     */
    public function __construct(\Enlight_Components_Snippet_Namespace $namespace)
    {
        $this->namespace = $namespace;
    }

    /**
     * {@inheritdoc}
     */
    public function filter($value)
    {
        $ret = $this->namespace->get($value);

        if (!$ret) {
            return $value;
        }

        return $ret;
    }
}
