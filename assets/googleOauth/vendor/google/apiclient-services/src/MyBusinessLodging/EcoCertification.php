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

namespace Google\Service\MyBusinessLodging;

class EcoCertification extends \Google\Model
{
  public $awarded;
  public $awardedException;
  public $ecoCertificate;

  public function setAwarded($awarded)
  {
    $this->awarded = $awarded;
  }
  public function getAwarded()
  {
    return $this->awarded;
  }
  public function setAwardedException($awardedException)
  {
    $this->awardedException = $awardedException;
  }
  public function getAwardedException()
  {
    return $this->awardedException;
  }
  public function setEcoCertificate($ecoCertificate)
  {
    $this->ecoCertificate = $ecoCertificate;
  }
  public function getEcoCertificate()
  {
    return $this->ecoCertificate;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EcoCertification::class, 'Google_Service_MyBusinessLodging_EcoCertification');
