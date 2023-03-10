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

namespace Google\Service\GameServices;

class GameServerCluster extends \Google\Model
{
  protected $clusterStateType = KubernetesClusterState::class;
  protected $clusterStateDataType = '';
  protected $connectionInfoType = GameServerClusterConnectionInfo::class;
  protected $connectionInfoDataType = '';
  public $createTime;
  public $description;
  public $etag;
  public $labels;
  public $name;
  public $updateTime;

  /**
   * @param KubernetesClusterState
   */
  public function setClusterState(KubernetesClusterState $clusterState)
  {
    $this->clusterState = $clusterState;
  }
  /**
   * @return KubernetesClusterState
   */
  public function getClusterState()
  {
    return $this->clusterState;
  }
  /**
   * @param GameServerClusterConnectionInfo
   */
  public function setConnectionInfo(GameServerClusterConnectionInfo $connectionInfo)
  {
    $this->connectionInfo = $connectionInfo;
  }
  /**
   * @return GameServerClusterConnectionInfo
   */
  public function getConnectionInfo()
  {
    return $this->connectionInfo;
  }
  public function setCreateTime($createTime)
  {
    $this->createTime = $createTime;
  }
  public function getCreateTime()
  {
    return $this->createTime;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEtag($etag)
  {
    $this->etag = $etag;
  }
  public function getEtag()
  {
    return $this->etag;
  }
  public function setLabels($labels)
  {
    $this->labels = $labels;
  }
  public function getLabels()
  {
    return $this->labels;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setUpdateTime($updateTime)
  {
    $this->updateTime = $updateTime;
  }
  public function getUpdateTime()
  {
    return $this->updateTime;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(GameServerCluster::class, 'Google_Service_GameServices_GameServerCluster');
