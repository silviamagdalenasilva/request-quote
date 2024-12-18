<?php
declare(strict_types=1);
namespace Cochez\RequestQuote\Controller\Quote;

use Magento\Customer\Model\Session;
use Magento\Framework\App\Action\Action;
use Magento\Framework\App\Action\Context;
use Magento\Framework\App\ResponseInterface;
use Magento\Framework\Controller\ResultInterface;
use Cochez\RequestQuote\Model\QuoteFactory;

class AddToQuote extends Action
{
    protected $jsonFactory;
    protected $cartManagement;
    protected $cartRepository;
    protected $productRepository;

    public function __construct(
        private Context $context,
        private readonly QuoteFactory $quoteFactory,
        private readonly Session $customerSession    )
    {
        parent::__construct($context);
    }

    /**
     * @return ResponseInterface|ResultInterface
     */
    public function execute()
    {
        $data = $this->getRequest()->getPostValue();
        $quote = $this->quoteFactory->create();

        $request = $this->getRequest();
        // Obtener el producto y la cantidad desde la solicitud
        $productId = (int) $request->getParam('product_id');
        $quantity = (int) $request->getParam('qty', 1);

        $quote->setData($data);

        $quote->setCustomerId($this->customerSession->getCustomerId());

        try {
            $quote->save();
            $this->messageManager->addSuccessMessage(__('Quote saved successfully.'));
        } catch (\Exception $e) {
            $this->messageManager->addErrorMessage(__('Could not save quote.'));
        }

        // Redireccionar a la página actual
        $redirectUrl = $this->context->getRequest()->getServer('HTTP_REFERER');
        return $this->context->getResponse()->setRedirect($redirectUrl);
    }
}
