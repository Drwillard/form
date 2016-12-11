<?php
/**
 * User: delboy1978uk
 * Date: 04/12/2016
 * Time: 23:36
 */

namespace Del\Form\Renderer\Error;


use Del\Form\Field\FieldInterface;
use DOMElement;
use DOMText;

class HorizontalFormErrorRender extends AbstractErrorRender implements ErrorRendererInterface
{
    /**
     * @param FieldInterface $field
     * @return DOMElement
     */
    public function render(FieldInterface $field)
    {
        $helpBlock = $this->dom->createElement('span');
        $helpBlock->setAttribute('class', 'help-block');

        if ($field->hasCustomErrorMessage()) {
            $helpBlock = $this->addCustomErrorMessage($helpBlock, $field);
        } else {
            $helpBlock = $this->addErrorMessages($helpBlock, $field);
        }

        $div = $this->dom->createElement('div');
        $div->setAttribute('class', 'col-sm-offset-2 col-sm-10');
        $div->appendChild($helpBlock);
        return $div;
    }

    /**
     * @param DOMElement $helpBlock
     * @param FieldInterface $field
     * @return DOMElement
     */
    private function addCustomErrorMessage(DOMElement $helpBlock, FieldInterface $field)
    {
        $message = $field->getCustomErrorMessage();
        $text = new DOMText($message);
        $helpBlock->appendChild($text);
        return $helpBlock;
    }

    /**
     * @param DOMElement $helpBlock
     * @param FieldInterface $field
     * @return DOMElement]
     */
    private function addErrorMessages(DOMElement $helpBlock, FieldInterface $field)
    {
        $messages = $field->getMessages();

        foreach ($messages as $message) {
            $helpBlock = $this->appendMessage($helpBlock, $message);
        }
        return $helpBlock;
    }

    /**
     * @param DOMElement $helpBlock
     * @param $message
     * @return DOMElement
     */
    private function appendMessage(DOMElement $helpBlock, $message)
    {
        $text = new DOMText($message);
        $br = $this->dom->createElement('br');
        $helpBlock->appendChild($text);
        $helpBlock->appendChild($br);
        return $helpBlock;
    }

}