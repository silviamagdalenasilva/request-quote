<?php

namespace Cochez\RequestQuote\Model\ResourceModel;

use Magento\Framework\Model\ResourceModel\Db\AbstractDb;

class Quote extends AbstractDb
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init('request_quote', 'quote_id');
    }
}
