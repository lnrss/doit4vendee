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

namespace Google\Service\Compute;

class ServiceAttachment extends \Google\Collection
{
  protected $collection_key = 'natSubnets';
  protected $connectedEndpointsType = ServiceAttachmentConnectedEndpoint::class;
  protected $connectedEndpointsDataType = 'array';
  public $connectionPreference;
  protected $consumerAcceptListsType = ServiceAttachmentConsumerProjectLimit::class;
  protected $consumerAcceptListsDataType = 'array';
  public $consumerRejectLists;
  public $creationTimestamp;
  public $description;
  public $enableProxyProtocol;
  public $fingerprint;
  public $id;
  public $kind;
  public $name;
  public $natSubnets;
  public $producerForwardingRule;
  protected $pscServiceAttachmentIdType = Uint128::class;
  protected $pscServiceAttachmentIdDataType = '';
  public $region;
  public $selfLink;
  public $targetService;

  /**
   * @param ServiceAttachmentConnectedEndpoint[]
   */
  public function setConnectedEndpoints($connectedEndpoints)
  {
    $this->connectedEndpoints = $connectedEndpoints;
  }
  /**
   * @return ServiceAttachmentConnectedEndpoint[]
   */
  public function getConnectedEndpoints()
  {
    return $this->connectedEndpoints;
  }
  public function setConnectionPreference($connectionPreference)
  {
    $this->connectionPreference = $connectionPreference;
  }
  public function getConnectionPreference()
  {
    return $this->connectionPreference;
  }
  /**
   * @param ServiceAttachmentConsumerProjectLimit[]
   */
  public function setConsumerAcceptLists($consumerAcceptLists)
  {
    $this->consumerAcceptLists = $consumerAcceptLists;
  }
  /**
   * @return ServiceAttachmentConsumerProjectLimit[]
   */
  public function getConsumerAcceptLists()
  {
    return $this->consumerAcceptLists;
  }
  public function setConsumerRejectLists($consumerRejectLists)
  {
    $this->consumerRejectLists = $consumerRejectLists;
  }
  public function getConsumerRejectLists()
  {
    return $this->consumerRejectLists;
  }
  public function setCreationTimestamp($creationTimestamp)
  {
    $this->creationTimestamp = $creationTimestamp;
  }
  public function getCreationTimestamp()
  {
    return $this->creationTimestamp;
  }
  public function setDescription($description)
  {
    $this->description = $description;
  }
  public function getDescription()
  {
    return $this->description;
  }
  public function setEnableProxyProtocol($enableProxyProtocol)
  {
    $this->enableProxyProtocol = $enableProxyProtocol;
  }
  public function getEnableProxyProtocol()
  {
    return $this->enableProxyProtocol;
  }
  public function setFingerprint($fingerprint)
  {
    $this->fingerprint = $fingerprint;
  }
  public function getFingerprint()
  {
    return $this->fingerprint;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setKind($kind)
  {
    $this->kind = $kind;
  }
  public function getKind()
  {
    return $this->kind;
  }
  public function setName($name)
  {
    $this->name = $name;
  }
  public function getName()
  {
    return $this->name;
  }
  public function setNatSubnets($natSubnets)
  {
    $this->natSubnets = $natSubnets;
  }
  public function getNatSubnets()
  {
    return $this->natSubnets;
  }
  public function setProducerForwardingRule($producerForwardingRule)
  {
    $this->producerForwardingRule = $producerForwardingRule;
  }
  public function getProducerForwardingRule()
  {
    return $this->producerForwardingRule;
  }
  /**
   * @param Uint128
   */
  public function setPscServiceAttachmentId(Uint128 $pscServiceAttachmentId)
  {
    $this->pscServiceAttachmentId = $pscServiceAttachmentId;
  }
  /**
   * @return Uint128
   */
  public function getPscServiceAttachmentId()
  {
    return $this->pscServiceAttachmentId;
  }
  public function setRegion($region)
  {
    $this->region = $region;
  }
  public function getRegion()
  {
    return $this->region;
  }
  public function setSelfLink($selfLink)
  {
    $this->selfLink = $selfLink;
  }
  public function getSelfLink()
  {
    return $this->selfLink;
  }
  public function setTargetService($targetService)
  {
    $this->targetService = $targetService;
  }
  public function getTargetService()
  {
    return $this->targetService;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(ServiceAttachment::class, 'Google_Service_Compute_ServiceAttachment');
