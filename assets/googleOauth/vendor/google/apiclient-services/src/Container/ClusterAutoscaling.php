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

namespace Google\Service\Container;

class ClusterAutoscaling extends \Google\Collection
{
  protected $collection_key = 'resourceLimits';
  public $autoprovisioningLocations;
  protected $autoprovisioningNodePoolDefaultsType = AutoprovisioningNodePoolDefaults::class;
  protected $autoprovisioningNodePoolDefaultsDataType = '';
  public $autoscalingProfile;
  public $enableNodeAutoprovisioning;
  protected $resourceLimitsType = ResourceLimit::class;
  protected $resourceLimitsDataType = 'array';

  public function setAutoprovisioningLocations($autoprovisioningLocations)
  {
    $this->autoprovisioningLocations = $autoprovisioningLocations;
  }
  public function getAutoprovisioningLocations()
  {
    return $this->autoprovisioningLocations;
  }
  /**
   * @param AutoprovisioningNodePoolDefaults
   */
  public function setAutoprovisioningNodePoolDefaults(AutoprovisioningNodePoolDefaults $autoprovisioningNodePoolDefaults)
  {
    $this->autoprovisioningNodePoolDefaults = $autoprovisioningNodePoolDefaults;
  }
  /**
   * @return AutoprovisioningNodePoolDefaults
   */
  public function getAutoprovisioningNodePoolDefaults()
  {
    return $this->autoprovisioningNodePoolDefaults;
  }
  public function setAutoscalingProfile($autoscalingProfile)
  {
    $this->autoscalingProfile = $autoscalingProfile;
  }
  public function getAutoscalingProfile()
  {
    return $this->autoscalingProfile;
  }
  public function setEnableNodeAutoprovisioning($enableNodeAutoprovisioning)
  {
    $this->enableNodeAutoprovisioning = $enableNodeAutoprovisioning;
  }
  public function getEnableNodeAutoprovisioning()
  {
    return $this->enableNodeAutoprovisioning;
  }
  /**
   * @param ResourceLimit[]
   */
  public function setResourceLimits($resourceLimits)
  {
    $this->resourceLimits = $resourceLimits;
  }
  /**
   * @return ResourceLimit[]
   */
  public function getResourceLimits()
  {
    return $this->resourceLimits;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ClusterAutoscaling::class, 'Google_Service_Container_ClusterAutoscaling');
