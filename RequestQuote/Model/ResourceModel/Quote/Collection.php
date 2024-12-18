<?php

namespace Cochez\RequestQuote\Model\ResourceModel\Quote;

class Collection extends \Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection
{
    /**
     * @return void
     */
    protected function _construct()
    {
        $this->_init(\Cochez\RequestQuote\Model\Quote::class,
            \Cochez\RequestQuote\Model\ResourceModel\Quote::class);
    }
}
