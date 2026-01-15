=== Hard Boiled Security ===
Contributors:      badegg
Tags:              security
Tested up to:      6.9
Stable tag:        1.0.1
License:           GPL-3.0-or-later
License URI:       https://www.gnu.org/licenses/gpl-3.0.html


A simple plugin that hardens some common Wordpress vulnerabilities

== Description ==

**Hard Boiled Security** stands in contrast to the many heavily marketed security plugins available for Wordpress. Rather than providing a barrage of configuration options and intrusive prompts and upsells, we silently close the most common security vulnerabilities.

This plugin was inspired by many painful situations we helped people out of over the years and developed to help people who do not code secure websites their with minimal effort.

### Plugin Features
- Zero configuration, hardens security just by activating
- Disables all file editing within Wordpress Admin.
- Pingbacks and Trackbacks are disabled on all existing and future posts.
- Prevents username exposure by ensuring their nice name, which is used in their profile URL and Rest API endpoint, is not their username. Those with the `list_users` capability can change this if needed.
- Tested and working with [Roots.io's Bedrock](https://roots.io/bedrock) directory structure as a mu-plugin.

### Planned features
There is more we can do to harden your Wordpress website's security. The features we will implement in the future will also be opinionated and require little to no configuration.
- Block brute force attacks by limiting failed login attempts within a reasonable timeframe
- Prevent email server spam and abuse by limiting password reset requests
- Logging when brute force and spam prevention measures are triggered with optional opt-in email notifications

## Keep it secret, keep it safe
This plugin is not a magic fix-all security solution. We don't believe any plugin can do that.

Website security, regardless of platform, requires careful consideration around common security principles around access and permissions. Things like always using strong passwords, never reusing them across multiple websites, and limiting administrator accounts to those who actually need it. So many Wordpress websites are compromised because administrator access is given out where the editor role is perfectly sufficient. Even if you are the website owner, using an editor account for your daily activities is a good idea.

### What to do to stay secure beyond using this plugin
- Strong, unique, randomised passwords.
- Fewer administrator accounts given only to those that need access to how the website works.
- Use editor accounts or lower for regular content updates where possible.
- Ensure the plugins and themes you use have been updated within the last few months.
- Abandoned themes or plugins will not be updated if security vulnerabilities are found so replace them.

## Why this plugin may not be for you
This is an opinionated plugin built around our assumptions. These assumptions are based on our experiences over 15 years of building Wordpress websites and may go against your workflow or philosophy.

One of the main reasons we wrote this plugin is to create an easy way for people to disable the built-in file editor in the Wordpress admin. A compromised administrator account can easily add malicious code to any theme or plugin and it can be very difficult to detect and locate it. This is the main reason we disable this feature outright. Secondly, if you're writing code, we consider it to be bad practice to edit files directly in a production environment (ie, a live website).
