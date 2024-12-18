<?php
namespace Cochez\RequestQuote\Controller\Quote\View;

class PrintQuote
{

    // TODO Inicio implementacion print pdf
//    public function execute()
//    {
//        if (!$this->formKeyValidator->validate($this->getRequest())) {
//            return $this->resultRedirectFactory->create()->setPath('*/*/');
//        }
//
//        $result = $this->quoteLoader->load($this->_request);
//        if ($result instanceof \Magento\Framework\Controller\ResultInterface) {
//            return $this->resultRedirectFactory->create()->setUrl($this->_redirect->getRefererUrl());
//        }
//
//        $quote = $this->registry->registry('current_quote');
//
//        //write pdf to var/export_quotation/pdf directory
//        $ds = DIRECTORY_SEPARATOR;
//        $storageDir = $this->downloadHelper->getFileHelper()->getStorageDir();
//        $filePath = sprintf(
//            'export_quotation' . $ds . 'pdf' . $ds . '%s.pdf',
//            $quote->getIncrementId()
//        );
//        $filePath = $storageDir . $ds . $filePath;
//
//        $this->downloadHelper->setResource($filePath, \Magento\Downloadable\Helper\Download::LINK_TYPE_FILE);
//
//        // create pdf if it does not yet exist
//        if (!$this->fileSystem->isFile($filePath)) {
//            $this->pdfModel->createQuotePdf([$quote]);
//        }
//
//        $fileName = $this->downloadHelper->getFilename();
//        $contentType = $this->downloadHelper->getContentType();
//        $contentDisposition = 'attachment';
//
//        $this->getResponse()->setHttpResponseCode(200)
//            ->setHeader('target', '_blank', true)
//            ->setHeader('Pragma', 'public', true)
//            ->setHeader('Cache-Control', 'private, max-age=0, must-revalidate, post-check=0, pre-check=0', true)
//            ->setHeader('Content-type', $contentType, true);
//
//        $fileSize = $this->downloadHelper->getFileSize();
//        if ($fileSize) {
//            $this->getResponse()->setHeader('Content-Length', $fileSize);
//        }
//
//        $this->getResponse()->setHeader('Content-Disposition', $contentDisposition . '; filename=' . $fileName);
//        $this->getResponse()->clearBody();
//        $this->getResponse()->sendHeaders();
//
//        //output PDF
//        $this->downloadHelper->output();
//    }
}
