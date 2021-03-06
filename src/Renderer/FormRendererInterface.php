<?php
/**
 * User: delboy1978uk
 * Date: 07/12/2016
 * Time: 01:50
 */

namespace Del\Form\Renderer;

use Del\Form\FormInterface;
use DOMElement;

interface FormRendererInterface
{
    /**
     * @param FormInterface $form
     * @return string of HTML
     */
    public function render(FormInterface $form, $displayErrors = true);

    /**
     * @return DOMElement
     */
    public function renderFieldLabel();

    /**
     * @return DOMElement
     */
    public function renderFieldBlock();
}