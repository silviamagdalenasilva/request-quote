<?php
declare(strict_types=1);
namespace Cochez\RequestQuote\Controller\Quote;

use Magento\Framework\View\Result\Page;
use Magento\Framework\Controller\ResultFactory;

class History extends \Magento\Framework\App\Action\Action
{
    /**
     * @return Page
     */
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);


        $block = $resultPage->getLayout()->getBlock('quote_history');
        if ($block) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
        $resultPage->getConfig()->getTitle()->set(__('My Quotes'));
        return $resultPage;
    }
}
