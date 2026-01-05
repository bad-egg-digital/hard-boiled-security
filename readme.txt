=== Hard Boiled Security ===
Contributors:      badegg
Tags:              security
Tested up to:      6.9
Stable tag:        1.0.1
License:           GPL-3.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-3.0.html

## A simple plugin that hardens some common Wordpress vulnerabilities.
We wrote this plugin for our client websites and made it available to everyone so that more can benefit from it. We will expand on the functionality as time allows and are happy to receive pull requests if there's something you'd like to contribute. 

### Plugin Features
- Zero configuration, hardens security just by activating
- Tested and working with [Roots.io's Bedrock](https://roots.io/bedrock) directory structure as a mu-plugin.
- Prevents username exposure by setting a url-safe first and last name as the user's slug or hashing the username if a name isn't provided.
- The ability for those with `list_users` capability to change a user's `user_nicename`. Please note that Wordpress core handles sanitization and uniqueness, similar post slugs. 
- Pingbacks and Trackbacks are disabled on all existing and future posts.
- Disables all file editing within Wordpress Admin

