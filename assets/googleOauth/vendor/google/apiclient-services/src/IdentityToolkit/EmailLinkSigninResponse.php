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

namespace Google\Service\IdentityToolkit;

class EmailLinkSigninResponse extends \Google\Model
{
  public $email;
  public $expiresIn;
  public $idToken;
  public $isNewUser;
  public $kind;
  public $localId;
  public $refreshToken;

  public function setEmail($email)
  {
    $this->email = $email;
  }
  public function getEmail()
  {
    return $this->email;
  }
  public function setExpiresIn($expiresIn)
  {
    $this->expiresIn = $expiresIn;
  }
  public function getExpiresIn()
  {
    return $this->expiresIn;
  }
  public function setIdToken($idToken)
  {
    $this->idToken = $idToken;
  }
  public function getIdToken()
  {
    return $this->idToken;
  }
  public function setIsNewUser($isNewUser)
  {
    $this->isNewUser = $isNewUser;
  }
  public function getIsNewUser()
  {
    return $this->isNewUser;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setLocalId($localId)
  {
    $this->localId = $localId;
  }
  public function getLocalId()
  {
    return $this->localId;
  }
  public function setRefreshToken($refreshToken)
  {
    $this->refreshToken = $refreshToken;
  }
  public function getRefreshToken()
  {
    return $this->refreshToken;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(EmailLinkSigninResponse::class, 'Google_Service_IdentityToolkit_EmailLinkSigninResponse');
