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

namespace Google\Service\CloudKMS;

class MacSignRequest extends \Google\Model
{
  public $data;
  public $dataCrc32c;

  public function setData($data)
  {
    $this->data = $data;
  }
  public function getData()
  {
    return $this->data;
  }
  public function setDataCrc32c($dataCrc32c)
  {
    $this->dataCrc32c = $dataCrc32c;
  }
  public function getDataCrc32c()
  {
    return $this->dataCrc32c;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(MacSignRequest::class, 'Google_Service_CloudKMS_MacSignRequest');
