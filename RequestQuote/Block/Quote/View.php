<?php
namespace Cochez\RequestQuote\Block\Quote;

use Magento\Customer\Model\Context;
use Cochez\RequestQuote\Model\ResourceModel\Quote\CollectionFactory;

/**
 * RequestQuote quote view block
 */
class View extends \Magento\Framework\View\Element\Template
{
    /**
     * @var string
     */
    protected $_template = 'Cochez_RequestQuote::quote/view.phtml';

    /**
     * Core registry
     *
     * @var \Magento\Framework\Registry
     */
    protected $_coreRegistry = null;

    /**
     * @var \Magento\Framework\App\Http\Context
     * @since 101.0.0
     */
    protected $httpContext;

    /**
     * @var \Magento\Payment\Helper\Data
     */
    protected $_paymentHelper;

    /**
     * @param \Magento\Framework\View\Element\Template\Context $context
     * @param \Magento\Framework\Registry $registry
     * @param \Magento\Framework\App\Http\Context $httpContext
     * @param \Magento\Payment\Helper\Data $paymentHelper
     * @param array $data
     */
    public function __construct(
        \Magento\Framework\View\Element\Template\Context $context,
        \Magento\Framework\Registry $registry,
        \Magento\Framework\App\Http\Context $httpContext,
        \Magento\Payment\Helper\Data $paymentHelper,
        private readonly \Magento\Framework\App\RequestInterface $request,
        private CollectionFactory $collectionFactory,
        array $data = []
    ) {
        $this->_paymentHelper = $paymentHelper;
        $this->_coreRegistry = $registry;
        $this->httpContext = $httpContext;
        parent::__construct($context, $data);
        $this->_isScopePrivate = true;
    }

    /**
     * @return string
     */
    public function getPaymentInfoHtml()
    {
        return $this->getChildHtml('payment_info');
    }

    /**
     * Return back url for logged in and guest users
     *
     * @return string
     */
    public function getBackUrl()
    {
        if ($this->httpContext->getValue(Context::CONTEXT_AUTH)) {
            return $this->getUrl('*/*/history');
        }
        return $this->getUrl('*/*/form');
    }

    /**
     * Return back title for logged in and guest users
     *
     * @return \Magento\Framework\Phrase
     */
    public function getBackTitle()
    {
        if ($this->httpContext->getValue(Context::CONTEXT_AUTH)) {
            return __('Back to My Quotes');
        }
        return __('View Another Quote');
    }

    /**
     * Return url for quote printing
     *
     * @return string
     */
    public function getPrintUrl()
    {
        return $this->getUrl(
            'requestquote/quote_view/printquote',
            ['quote_id' => $this->request->getParam('id')]
        );
    }

    /**
     * @return mixed
     */
    public function getQuote()
    {
        $quoteId = $this->request->getParam('id');

        $collection = $this->collectionFactory->create();
        $collection->addFieldToFilter('quote_id', $quoteId);
        return $collection;
    }
}
