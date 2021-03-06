<?php
/**
 * User: delboy1978uk
 * Date: 19/11/2016
 * Time: 12:12
 */

namespace Del\Form;

use Del\Form\Collection\FieldCollection;
use Del\Form\Field\FieldInterface;

interface FormInterface
{
    /**
     * @return bool
     */
    public function isValid();

    /**
     * @return array
     */
    public function getValues();

    /**
     * @param array $values
     * @return FormInterface
     */
    public function populate(array $values);

    /**
     * @param string $name
     * @return null|FieldInterface
     */
    public function getField($name);

    /**
     * @return FieldCollection
     */
    public function getFields();

    /**
     * @param FieldInterface $field
     * @return FormInterface
     */
    public function addField(FieldInterface $field);

    /**
     * @return string
     */
    public function render();

    /**
     * @param string $url
     * @return FormInterface
     */
    public function setAction($url);

    /**
     * @return string
     */
    public function getAction();

    /**
     * @return string
     */
    public function getId();

    /**
     * @param string $id
     * @return FormInterface
     */
    public function setId($id);

    /**
     * @param string $encType
     * @return $this
     */
    public function setEncType($encType);

    /**
     * @return string
     */
    public function getEncType();

    /**
     * @param string $method
     * @return FormInterface
     */
    public function setMethod($method);

    /**
     * @return string
     */
    public function getMethod();

    /**
     * @param string $class
     * @return FormInterface
     */
    public function setClass($class);

    /**
     * @return string
     */
    public function getClass();

    /**
     * @param $key
     * @return mixed|string
     */
    public function getAttribute($key);

    /**
     * @param $key
     * @param $value
     * @return $this
     */
    public function setAttribute($key, $value);

    /**
     * @param array $attributes
     * @return $this
     */
    public function setAttributes(array $attributes);

    /**
     * @return array
     */
    public function getAttributes();

    /**
     * @return boolean
     */
    public function isDisplayErrors();

    /**
     * @param boolean $displayErrors
     * @return AbstractForm
     */
    public function setDisplayErrors($displayErrors);
}