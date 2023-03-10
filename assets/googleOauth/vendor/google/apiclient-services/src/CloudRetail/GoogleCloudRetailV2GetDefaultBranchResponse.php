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

namespace Google\Service\CloudRetail;

class GoogleCloudRetailV2GetDefaultBranchResponse extends \Google\Model
{
  public $branch;
  public $note;
  public $setTime;

  public function setBranch($branch)
  {
    $this->branch = $branch;
  }
  public function getBranch()
  {
    return $this->branch;
  }
  public function setNote($note)
  {
    $this->note = $note;
  }
  public function getNote()
  {
    return $this->note;
  }
  public function setSetTime($setTime)
  {
    $this->setTime = $setTime;
  }
  public function getSetTime()
  {
    return $this->setTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2GetDefaultBranchResponse::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2GetDefaultBranchResponse');
