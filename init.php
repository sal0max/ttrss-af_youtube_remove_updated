<?php
class Af_Youtube_Remove_Updated extends Plugin {
	private $host;

	function about() {
		return array("1.0",
			"Removes the 'updated' element of Youtube feeds. Bringing some order.",
			"salomax",
			false,
			"https://github.com/sal0max/ttrss-af_youtube_remove_updated");
	}

	function api_version() {
		return 2;
	}

	function init($host) {
		$this->host = $host;
		$host->add_hook($host::HOOK_FEED_FETCHED, $this);
	}

	function hook_feed_fetched($feed_data, $fetch_url, $owner_uid, $feed) {
		// only apply to youtube feeds
		if (strpos($fetch_url, "youtube.com") === FALSE) {
			return $feed_data;
		}

		$doc = new DOMDocument();
		if (@$doc->loadXML($feed_data)) {
			$feed = $doc->getElementsByTagName('feed')->item(0);
			// remove all <updated> elements
			$entries = $feed->getElementsByTagName('entry');
			foreach ($entries as $entry) {
				$updated = $entry->getElementsByTagName('updated')->item(0);
				$entry->removeChild($updated);
			}

			return $doc->saveXML();
		}

		return $feed_data;
	}
}
