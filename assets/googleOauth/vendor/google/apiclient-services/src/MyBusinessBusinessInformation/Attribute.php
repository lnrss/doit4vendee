<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License"); you may not
 * use this file except in compliance with the License. You may obtain a copy of
 * the License at
 *
 * http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS, WITHOUT
 * WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied. See the
 * License for the specific language governing permissions and limitations under
 * the License.
 */

namespace Google\Service\MyBusinessBusinessInformation;

class Attribute extends \Google\Collection
{
  protected $collection_key = 'values';
  public $name;
  protected $repeatedEnumValueType = RepeatedEnumAttributeValue::class;
  protected $repeatedEnumValueDataType = '';
  protected $uriValuesType = UriAttributeValue::class;
  protected $uriValuesDataType = 'array';
  public $valueType;
  public $values;

  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  /**
   * @param RepeatedEnumAttributeValue
   */
  public function setRepeatedEnumValue(RepeatedEnumAttributeValue $repeatedEnumValue)
  {
    $this->repeatedEnumValue = $repeatedEnumValue;
  }
  /**
   * @return RepeatedEnumAttributeValue
   */
  public function getRepeatedEnumValue()
  {
    return $this->repeatedEnumValue;
  }
  /**
   * @param UriAttributeValue[]
   */
  public function setUriValues($uriValues)
  {
    $this->uriValues = $uriValues;
  }
  /**
   * @return UriAttributeValue[]
   */
  public function getUriValues()
  {
    return $this->uriValues;
  }
  public function setValueType($valueType)
  {
    $this->valueType = $valueType;
  }
  public function getValueType()
  {
    return $this->valueType;
  }
  public function setValues($values)
  {
    $this->values = $values;
  }
  public function getValues()
  {
    return $this->values;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(Attribute::class, 'Google_Service_MyBusinessBusinessInformation_Attribute');
