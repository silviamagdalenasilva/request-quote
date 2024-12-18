<?php
namespace Cochez\RequestQuote\Model;

use Magento\Framework\Model\AbstractModel;

class Quote extends AbstractModel
{
    protected $_idFieldName = 'quote_id';

    protected function _construct()
    {
        $this->_init(\Cochez\RequestQuote\Model\ResourceModel\Quote::class);
    }
}
