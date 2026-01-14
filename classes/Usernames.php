<?php

namespace bedhbs;

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

class Usernames
{
    public function __construct()
    {
        add_action('user_register', [$this, 'hardenNicename'], 10, 2);
        add_action('show_user_profile', [$this, 'nicenameField']);
        add_action('edit_user_profile', [$this, 'nicenameField']);
        add_action('personal_options_update', [$this, 'nicenameSave']);
        add_action('edit_user_profile_update', [$this, 'nicenameSave']);
    }

    public function hardenNicename($userID, $userData)
    {
        $first_name = $userData['first_name'];
        $last_name = $userData['last_name'];
        $full_name = $first_name . ' ' . $last_name;
        $nicename = sanitize_text_field($full_name);

        $args = [
            'ID' => $userID,
            'user_nicename' => $nicename,
        ];

        if (!trim($nicename) || username_exists($nicename)) {
            $args['user_nicename'] = shorthash($userData['user_login']);
            $args['display_name'] = __('Unnamed User', 'hard-boiled-security');
        }

        wp_update_user($args);
    }

    public function nicenameField($user)
    {
        ?>

        <p>&nbsp;</p>
        <hr/>
        <h2><?php esc_html_e('Hard Boiled Security', 'hard-boiled-security') ?></h2>
        <table class="form-table">
            <tr>
                <th>
                    <label for="user_nicename">
                        <?php esc_html_e('User Nicename', 'hard-boiled-security') ?>
                        <span class="description">(<?php esc_html_e('required', 'hard-boiled-security') ?>)</span>
                    </label>
                </th>
                <td>
                    <input
                        type="text"
                        name="user_nicename"
                        id="user_nicename"
                        value="<?php echo esc_attr($user->user_nicename); ?>"
                        class="regular-text"
                    /><br />
                    <p class="description">
                        <?php
                            esc_html_e(
                                'The nicename is used in the user profile\'s permalink.
                                For security reasons, it should be different from the username.',
                                'hard-boiled-security',
                            );
                        ?>

                    </p>
                    <p class="description">
                        <?php
                            esc_html_e(
                                'This user\'s profile URL is ',
                                'hard-boiled-security',
                            );
                        ?>

                        <a href="<?php echo esc_html(get_author_posts_url($user->ID)) ?>" target="_blank"><?php echo esc_html(get_author_posts_url($user->ID)) ?></a>.
                    </p>
                    <?php
                        wp_nonce_field('save_user_nicename', 'user_nicename_nonce');
                    ?>
                </td>
            </tr>
        </table>

        <?php
    }

    public function nicenameSave($userID)
    {

        if (!current_user_can('edit_user', $userID)) {
            return false;
        }

        if (!isset($_POST['user_nicename_nonce']) || !wp_verify_nonce(wp_unslash(sanitize_text_field($_POST['user_nicename_nonce'])), 'save_user_nicename')) {
            return false;
        }

        if (isset($_POST['user_nicename'])) {
            $nicename = wp_unslash($_POST['user_nicename']);

            $args = [
                'ID' => $userID,
                'user_nicename' => $nicename,
            ];

            wp_update_user($args);
        }
    }
}
