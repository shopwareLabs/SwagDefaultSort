<?php


namespace Shopware\SwagDefaultSort\Components;

/**
 * Class RegistrationService
 *
 * Register common namespaces
 *
 * @package Shopware\SwagdefaultSort\Components
 */
class RegistrationService
{
    /**
     * Registers the template directory, needed for templates in frontend an backend
     */
    public function registerTemplateDir()
    {
        Shopware()->Template()
            ->addTemplateDir($this->getPluginPath() . '/Views');
    }

    /**
     * Registers the snippet directory, needed for backend snippets
     */
    public function registerSnippets()
    {
        Shopware()->Snippets()->addConfigDir(
            $this->getPluginPath() . '/Snippets/'
        );
    }

    public function getPluginPath() {
        return __DIR__ . '/..';
    }
}