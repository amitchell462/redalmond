<?php
namespace RedAlmond\CmsPages\Setup;

use Magento\Cms\Model\PageFactory;
use Magento\Framework\Setup\InstallDataInterface;
use Magento\Framework\Setup\ModuleContextInterface;
use Magento\Framework\Setup\ModuleDataSetupInterface;

/**
 * Class InstallData
 */
class InstallData implements InstallDataInterface
{
    /**
     * @var \Magento\Cms\Model\PageFactory
     */
    private $pageFactory;

    /**
     * @param \Magento\Cms\Model\PageFactory $pageFactory
     */
    public function __construct(
        \Magento\Cms\Model\PageFactory $pageFactory
    ) {
        $this->pageFactory = $pageFactory;
    }

    /**
     * @param ModuleDataSetupInterface $setup
     * @param ModuleContextInterface $context
     */
    public function install(ModuleDataSetupInterface $setup, ModuleContextInterface $context)
    {
        $installer = $setup;
        $installer->startSetup();

        $cmsPageData = [
            'title' => 'Button Demo',
            'page_layout' => '1column',
            'identifier' => 'button-demo',
            'content' => '<style>.grid {  display: grid; grid-template-columns: 1fr 1fr 1fr; grid-gap: 40px; }</style><h1>BUTTONS</h1><div class="grid"><div class="col"><button class="button primary tocart" type="button"><span><span>Load More</span></span></button></div><div class="col"><button class="button btn-continue" title="Continue Shopping" type="button"><span><span>Continue Shopping</span></span></button></div><div class="col"><button class="action primary checkout" type="button">Checkout</button></div></div>',
            'is_active' => 1,
            'stores' => [0],
        ];

        $this->pageFactory->create()->setData($cmsPageData)->save();

        $installer->endSetup();
    }
}
