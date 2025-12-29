# Hard Boiled Security
by [Bad Egg Digital](https://www.badegg.uk)


## A zero-configuration plugin that addresses some common Wordpress vulnerabilities.
This plugin was written for our client websites and made available to anyone who would benefit from it. We will expand on the functionality as time allows and are happy to receive pull requests if there's something you'd like to contribute. 

### Plugin Features
- Prevents username exposure by setting a url-safe first and last name as the user's slug or hashing the username if a name isn't provided.
- The ability for those with `list_users` capability to change a user's `user_nicename`. Please note that Wordpress core handles sanitization and uniqueness, similar post slugs. 
- Pingbacks and Trackbacks are disabled on all existing and future posts.
- Disables all file editing within Wordpress Admin
