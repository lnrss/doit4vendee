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

namespace Google\Service\ContainerAnalysis;

class PackageOccurrence extends \Google\Model
{
  public $comment;
  public $filename;
  public $id;
  public $licenseComments;
  public $licenseConcluded;
  public $sourceInfo;

  public function setComment($comment)
  {
    $this->comment = $comment;
  }
  public function getComment()
  {
    return $this->comment;
  }
  public function setFilename($filename)
  {
    $this->filename = $filename;
  }
  public function getFilename()
  {
    return $this->filename;
  }
  public function setId($id)
  {
    $this->id = $id;
  }
  public function getId()
  {
    return $this->id;
  }
  public function setLicenseComments($licenseComments)
  {
    $this->licenseComments = $licenseComments;
  }
  public function getLicenseComments()
  {
    return $this->licenseComments;
  }
  public function setLicenseConcluded($licenseConcluded)
  {
    $this->licenseConcluded = $licenseConcluded;
  }
  public function getLicenseConcluded()
  {
    return $this->licenseConcluded;
  }
  public function setSourceInfo($sourceInfo)
  {
    $this->sourceInfo = $sourceInfo;
  }
  public function getSourceInfo()
  {
    return $this->sourceInfo;
  }
}

// Adding a class alias for backwards compatibility with the previous class name.
class_alias(PackageOccurrence::class, 'Google_Service_ContainerAnalysis_PackageOccurrence');
