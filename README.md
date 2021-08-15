# af\_youtube\_remove\_updated

A plugin for [tt-rss](https://tt-rss.org/)

## About

You can subscribe to Youtube channels via RSS. Simply subscribe to this URL, to get a nice ATOM feed:

`https://www.youtube.com/feeds/videos.xml?channel_id=<channel-id>`

An awesome feature! However, Google also fills the `updated` element in this feed. This gets updated every time a new comment is posted to a video. I don't care for that. This just brings the feed in tt-rss in disorder.

**This plugin simply removes the `updated` element.** This way, if you sort by date, all the videos are nicely ordered by upload date.

## Installation
1. `cd` to the `plugins.local` directory of your tt-rss installation and perform a `git clone` of this repo.

2. Rename the directory to `af_youtube_remove_updated`

3. Then activate the plugin in the tt-rss settings.

