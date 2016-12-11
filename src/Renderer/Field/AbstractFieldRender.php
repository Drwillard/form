<?php
/**
 * User: delboy1978uk
 * Date: 04/12/2016
 * Time: 23:13
 */

namespace Del\Form\Renderer\Field;

use Del\Form\Field\FieldInterface;
use DOMDocument;
use DOMElement;

abstract class AbstractFieldRender implements FieldRendererInterface
{
    /** @var DOMDocument $dom  */
    protected $dom;

    /**
     * @param DOMDocument $dom
     * @return DOMElement
     */
    public function render(DOMDocument $dom, FieldInterface $field)
    {
        $this->dom = $dom;
        $element = $this->createElement($field);
        return $this->renderBlock($field, $element);
    }

    /**
     * @param FieldInterface $field
     * @return DOMElement
     */
    public function createElement(FieldInterface $field)
    {
        $element = $this->dom->createElement($field->getTag());

        foreach ($field->getAttributes() as $key => $value) {
            $element->setAttribute($key, $value);
        }
        return $element;
    }

    abstract public function renderBlock(FieldInterface $field, DOMElement $element );
}