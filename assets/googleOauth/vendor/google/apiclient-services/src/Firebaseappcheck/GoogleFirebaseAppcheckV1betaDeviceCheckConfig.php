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

namespace Google\Service\Firebaseappcheck;

class GoogleFirebaseAppcheckV1betaDeviceCheckConfig extends \Google\Model
{
  public $keyId;
  public $name;
  public $privateKey;
  public $privateKeySet;
  public $tokenTtl;

  public function setKeyId($keyId)
  {
    $this->keyId = $keyId;
  }
  public function getKeyId()
  {
    return $this->keyId;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setPrivateKey($privateKey)
  {
    $this->privateKey = $privateKey;
  }
  public function getPrivateKey()
  {
    return $this->privateKey;
  }
  public function setPrivateKeySet($privateKeySet)
  {
    $this->privateKeySet = $privateKeySet;
  }
  public function getPrivateKeySet()
  {
    return $this->privateKeySet;
  }
  public function setTokenTtl($tokenTtl)
  {
    $this->tokenTtl = $tokenTtl;
  }
  public function getTokenTtl()
  {
    return $this->tokenTtl;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleFirebaseAppcheckV1betaDeviceCheckConfig::class, 'Google_Service_Firebaseappcheck_GoogleFirebaseAppcheckV1betaDeviceCheckConfig');
