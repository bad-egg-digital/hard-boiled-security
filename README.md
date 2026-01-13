# Hard Boiled Security
by [Bad Egg Digital](https://www.badegg.uk)


## A low-configuration plugin that addresses some common Wordpress vulnerabilities just by activating it.
This plugin stands in contrast to the many heavily marketed security plugins available for Wordpress. Rather than providing a sea of configuration options, we quietly close the most common security vulnerabilities.

### Plugin Features
- Prevents username exposure by setting a url-safe first and last name as the user's slug or hashing the username if a name isn't provided.
- The ability for those with `list_users` capability to change a user's `user_nicename`. Please note that Wordpress core handles sanitization and uniqueness, similar post slugs. 
- Pingbacks and Trackbacks are disabled on all existing and future posts.
- Disables all file editing within Wordpress Admin

This plugin was written for our client websites and made available to anyone who would benefit from it. We will expand on the functionality as time allows and are happy to receive feedback and suggestions. 
