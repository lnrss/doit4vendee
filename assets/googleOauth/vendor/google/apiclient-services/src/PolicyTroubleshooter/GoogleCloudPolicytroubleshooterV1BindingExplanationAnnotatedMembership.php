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

namespace Google\Service\PolicyTroubleshooter;

class GoogleCloudPolicytroubleshooterV1BindingExplanationAnnotatedMembership extends \Google\Model
{
  public $membership;
  public $relevance;

  public function setMembership($membership)
  {
    $this->membership = $membership;
  }
  public function getMembership()
  {
    return $this->membership;
  }
  public function setRelevance($relevance)
  {
    $this->relevance = $relevance;
  }
  public function getRelevance()
  {
    return $this->relevance;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GoogleCloudPolicytroubleshooterV1BindingExplanationAnnotatedMembership::class, 'Google_Service_PolicyTroubleshooter_GoogleCloudPolicytroubleshooterV1BindingExplanationAnnotatedMembership');
