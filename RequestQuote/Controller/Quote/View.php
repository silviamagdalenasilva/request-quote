<?php
namespace Cochez\RequestQuote\Controller\Quote;

use Magento\Framework\App\Action\Action;
use Cochez\RequestQuote\Model\QuoteFactory;
use Magento\Framework\Controller\ResultFactory;

class View extends Action
{
    public function execute()
    {
        /** @var \Magento\Framework\View\Result\Page $resultPage */
        $resultPage = $this->resultFactory->create(ResultFactory::TYPE_PAGE);

        $block = $resultPage->getLayout()->getBlock('quote_view');
        if ($block) {
            $block->setRefererUrl($this->_redirect->getRefererUrl());
        }
        $resultPage->getConfig()->getTitle()->set(__('Quote #'));
        return $resultPage;
    }
}
