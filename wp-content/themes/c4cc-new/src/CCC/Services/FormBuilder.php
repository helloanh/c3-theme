<?php

namespace CCC\Services;

class FormBuilder
{
	/**
	 * Submitted datas
	 * @var array
	 */
	protected $datas = [];

	/**
	 * Tag attributes
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * Form action url
	 * @var string
	 */
	protected $action = '';

	/**
	 * Form errors
	 * @var array
	 */
	private $errors = [];

	/**
	 * show errors
	 * @var boolean
	 */
	private $showErrors = true;

	protected $namePrefix = "";

	public function __construct() {
		$this->datas = $_REQUEST;
	}

	/**
	 * Create Form tag
	 * @param string $method
	 * @param  string $action form url
	 * @return string
	 */
	public function open($method = 'POST', $action = '')
	{
		if(empty($action)) {
			$action = $this->action;
		}
		return '<form action="'.$action.'" method="'.$method.'"'.$this->attributesToHtml().'>';
	}

	protected function label($name) {
		return $this->addTag('label', $name);
	}

	/**
	 * Create Input field
	 * @param  string $fieldName Field name
	 * @param  string $type field type (text, password...)
	 * @param string $valueText
	 * @return string
	 */
	protected function input($fieldName, $type, $valueText = 'value')
	{
		$fieldName = $this->namePrefix . $fieldName;
		if(!empty($fieldName) && $fieldName)
		{
			$this->addAttr('name', $fieldName);
			if($type != 'submit') {
				$this->addAttr($valueText, $this->get($fieldName));
			}
		}
		$field = '<input type="'.$type.'"'.$this->attributesToHtml().'>';
		$field .= $this->getError($fieldName);
		$this->attributes = [];
		return $field;
	}

	/**
	 * Create submit button
	 * @param  string $value  Field value
	 * @return string
	 */
	public function submit($value = 'Submit')
	{
		return $this->addAttr('value', $value)->input(null, 'submit');
	}

	/**
	 * Create a Group Select tag
	 * @param string $fieldName
	 * @param array $options
	 * @return string
	 */
	public function gselect($fieldName, $options = [])
	{
		$fieldName = $this->namePrefix . $fieldName;
		$this->addAttr('name', $fieldName);
		$fieldOptions = '';
		if(!empty($options)) {
			$fieldValue = $this->get($fieldName);
			foreach($options as $parent => $childs) {
				$fieldOptions .= '<optgroup label="'.ucfirst($parent).'">';
				foreach($childs as $value => $text) {
					$selected = $fieldValue != $value ? '' : ' selected="selected"';
					$fieldOptions .= '<option value="'.$value.'"'.$selected.'>'.ucfirst($text).'</option>';
				}
				$fieldOptions .= '</optgroup>';
			}
		}
		$field = $this->addTag('select', $fieldOptions);
		$field .= $this->getError($fieldName);
		return $field;
	}

	/**
	 * Create Select tag
	 * @param string $fieldName
	 * @param array $options
	 * @return string
	 */
	public function select($fieldName, $options = [])
	{
		$fieldName = $this->namePrefix . $fieldName;
		$this->addAttr('name', $fieldName);
		$fieldOptions = '';
		if(!empty($options)) {
			$fieldValue = $this->get($fieldName);
			foreach($options as $value => $text) {
				$selected = $fieldValue != $value ? '' : ' selected="selected"';
				$text     = is_array($text) ? current($text) : $text;
				$fieldOptions .= '<option value="'.$value.'"'.$selected.'>'.ucfirst($text).'</option>';
			}
		}
		$field = $this->addTag('select', $fieldOptions);
		$field .= $this->getError($fieldName);
		return $field;
	}

	/**
	 * Create Textarea tag
	 * @param  string $fieldName
	 * @return string
	 */
	public function textarea($fieldName)
	{
		$fieldName = $this->namePrefix . $fieldName;
		$this->addAttr('name', $fieldName);
		$fieldValue = $this->get($fieldName);
		$field = $this->addTag('textarea', $fieldValue);
		$field .= $this->getError($fieldName);
		return $field;
	}

	/**
	 * Create a radio/checkbox field
	 * @param string $fieldName field name
	 * @param string $fieldLabel field label
	 * @param string $type field type
	 * @return string
	 */
	protected function box($fieldName, $fieldLabel = '', $type = '')
	{
		$fieldName = $this->namePrefix . $fieldName;
		$this->addAttr('name', $fieldName);
		$fieldValue = $this->get($fieldName);
		$value = $this->get('value', 'attributes');
		if($fieldValue && $value){
			$checked = is_array($fieldValue) ? array_key_exists($value, array_flip($fieldValue)) : $fieldValue == $value;
			if($checked){
				$this->addAttr('checked', 'checked');
			}
		}
		$field = '<input type="'.$type.'"'.$this->attributesToHtml().'> ' . $fieldLabel . ' ';
		$field .= $this->getError($fieldName);
		return $field;
	}

	/**
	 * Add an HTML Form tag
	 * @param string $tagType Tag type (label, textarea, select...)
	 * @param mixed $tagContent  Tag content or value
	 * @return string
	 */
	protected function addTag($tagType, $tagContent)
	{
		return '<'.$tagType.' '.$this->attributesToHtml().'>'.$tagContent.'</'.$tagType.'>';
	}

	/**
	 * Add an attribute to the field
	 * @param string|array $key attribute name
	 * @param Integer|String $value attribute value
	 * @return $this
	 */
	public function addAttr($key, $value = null, $push = null)
	{
		if(is_array($key)){
			$this->attributes = array_merge($this->attributes, $key);
		}
		else {
			if($push) {
				$attrValue = $this->get($key, 'attributes');
				if($attrValue) {
					$value = $attrValue . ' ' . $value;
				}
			}
			$this->attributes[$key] = $value;
		}
		return $this;
	}

	/**
	 * Fill the datas variable
	 * @param $key
	 * @param string $value
	 * @internal param array $datas
	 */
	public function setDatas($key, $value = '')
	{
		if(is_array($key)) {
			$this->datas = $key;
		}
		elseif(is_object($key)) {
			$this->datas = (array) $key;
		}
		elseif(is_string($key)) {
			$this->datas[$key] = $value;
		}
	}

	/**
	 * Get element by key from the user datas
	 * @param  string $key the field name
	 * @param  string $source source of datas (datas, files, attributes)
	 * @return mixed
	 */
	public function get($key = '', $source = 'datas')
	{
		if(property_exists($this, $source)) {
			$property = (array) $this->$source;
			if(empty($key))
				return (object) $property;
			if(!empty($property)) {
				$key = str_replace('[]', '', $key);
				if(array_key_exists($key, $property)) {
					$value = $property[$key];
					return is_object($value) ? (array) $value : $value;
				}
			}
		}
		return null;
	}

	public function all($output = 'array')
	{
		$datas = $this->get();
		switch ($output) {
			case 'array': return (array) $datas; break;
			case 'json': return json_encode($datas); break;
			default: return $datas; break;
		}
	}

	public function setError($field, $msg, $style = 'danger')
	{
		$this->errors[$field][$style][] = $msg;
	}

	public function getError($field = '')
	{
		$alerts = "";
		if($this->showErrors) {
			$errors = $this->get($field, 'errors');
			if(is_array($errors)) {
				$alerts .= '<ul class="alerts-text">';
				foreach($errors as $style => $alert) {
					foreach($alert as $alert) {
						$alerts .= '<li class="alert-text-'.$style.'">'.$alert.'</li>';
					}
				}
				$alerts .= '</ul>';
			}
		}
		return $alerts;
	}

	/**
	 * Generate field's attributes
	 * @return string|null
	 */
	protected function attributesToHtml()
	{
		$html = '';
		if(!empty($this->attributes)) {
			if(isset($this->attributes['showErrors'])) {
				$this->showErrors = $this->attributes['showErrors'];
			}
			foreach($this->attributes as $key => $value) {
				if($key != 'showErrors') {
					$value = is_array($value) ? implode(' ', $value) : $value;
					$html .= is_numeric($key) ? $value.' ' : ' ' . $key.'="'.$value.'" ';
				}
			}
			$this->attributes = [];
		}
		return $html;
	}

	/**
	 * @return string
	 */
	public function __toString()
	{
		return '';
	}

	/**
	 * Magic methods call
	 * @param $tagName
	 * @param $methodParams
	 * @return string
	 */
	public function __call($tagName, $methodParams)
	{
		$method = null;
		if(in_array($tagName, ['text','submit','password','date','time','file','hidden','reset'])) {
			array_push($methodParams, $tagName);
			$method = "input";
		}
		elseif(in_array($tagName, ['checkbox','radio'])) {
			if(!isset($methodParams[1]))
				$methodParams[1] = '';
			array_push($methodParams, $tagName);
			$method = "box";
		}
		elseif($tagName == 'close') {
			return '</form>';
		}
		elseif($tagName == 'reset') {
			$this->datas = [];
		}
		$handler = [$this, $method];
		return !is_null($method) && is_callable($handler) ? call_user_func_array($handler, $methodParams) : '';
	}
}
