<?php
/*
 * Copyright 2014 Google Inc.
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

/**
 * This example updates a custom channel on a host ad client.
 * To get ad clients, see GetAllAdClientsForHost.php.
 * To get custom channels, see GetAllCustomChannelsForHost.php.
 *
 * Tags: customchannels.patch
 */
class UpdateCustomChannelOnHost {
  /**
   * Updates a custom channel on a host ad client.
   *
   * @param $service Google_Service_AdSenseHost AdSenseHost service object on
   *     which to run the requests.
   * @param $adClientId string the ID for the ad client to be used.
   * @param $customChannelId string the ID of the custom channel to be updated.
   * @return Google_Service_AdSenseHost_CustomChannel the updated custom channel
   */
  public static function run($service, $adClientId, $customChannelId) {
    $separator = str_repeat('=', 80) . "\n";
    print $separator;
    printf("Updating custom channel %s\n", $customChannelId);
    print $separator;

    $customChannel = new Google_Service_AdSenseHost_CustomChannel();
    $customChannel->setName("Updated Custom Channel #" . getUniqueName());

    $result = $service->customchannels->patch($adClientId, $customChannelId,
        $customChannel);

    printf(
        "Custom channel with ID \"%s\" and code \"%s\" got its name updated " .
            "to \"%s\"\n",
        $result->getId(), $result->getCode(), $result->getName());

    print "\n";

    return $result;
  }
}
