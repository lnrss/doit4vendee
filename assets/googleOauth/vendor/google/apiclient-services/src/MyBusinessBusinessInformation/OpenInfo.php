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

class OpenInfo extends \Google\Model
{
  public $canReopen;
  protected $openingDateType = Date::class;
  protected $openingDateDataType = '';
  public $status;

  public function setCanReopen($canReopen)
  {
    $this->canReopen = $canReopen;
  }
  public function getCanReopen()
  {
    return $this->canReopen;
  }
  /**
   * @param Date
   */
  public function setOpeningDate(Date $openingDate)
  {
    $this->openingDate = $openingDate;
  }
  /**
   * @return Date
   */
  public function getOpeningDate()
  {
    return $this->openingDate;
  }
  public function setStatus($status)
  {
    $this->status = $status;
  }
  public function getStatus()
  {
    return $this->status;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(OpenInfo::class, 'Google_Service_MyBusinessBusinessInformation_OpenInfo');
