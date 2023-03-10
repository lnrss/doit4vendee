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

class GoogleCloudRetailV2AddFulfillmentPlacesRequest extends \Google\Collection
{
  protected $collection_key = 'placeIds';
  public $addTime;
  public $allowMissing;
  public $placeIds;
  public $type;

  public function setAddTime($addTime)
  {
    $this->addTime = $addTime;
  }
  public function getAddTime()
  {
    return $this->addTime;
  }
  public function setAllowMissing($allowMissing)
  {
    $this->allowMissing = $allowMissing;
  }
  public function getAllowMissing()
  {
    return $this->allowMissing;
  }
  public function setPlaceIds($placeIds)
  {
    $this->placeIds = $placeIds;
  }
  public function getPlaceIds()
  {
    return $this->placeIds;
  }
  public function setType($type)
  {
    $this->type = $type;
  }
  public function getType()
  {
    return $this->type;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudRetailV2AddFulfillmentPlacesRequest::class, 'Google_Service_CloudRetail_GoogleCloudRetailV2AddFulfillmentPlacesRequest');
