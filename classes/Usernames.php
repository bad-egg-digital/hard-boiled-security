<?php

namespace bedhbs;

class Usernames
{
    public function __construct()
    {
        add_action('user_register', [$this, 'harden_nicename'], 10, 2 );
        add_action( 'show_user_profile', [$this, 'nicename_field'] );
        add_action( 'edit_user_profile', [$this, 'nicename_field'] );
        add_action( 'personal_options_update', [$this, 'nicename_save'] );
        add_action( 'edit_user_profile_update', [$this, 'nicename_save'] );
    }

	public function harden_nicename($userID, $userData)
    {
        $first_name = $userData['first_name'];
        $last_name = $userData['last_name'];
        $full_name = $first_name . ' ' . $last_name;
        $nicename = sanitize_text_field($full_name);

        $args = [
            'ID' => $userID,
            'user_nicename' => $nicename,
        ];

        if(!trim($nicename) || username_exists($nicename)) {
            $args['user_nicename'] = shorthash($userData['user_login']);
            $args['display_name'] = __('Unnamed User', BEDHBS);
        }

        wp_update_user($args);
    }

    public function nicename_field($user)
    {
        ?>

        <p>&nbsp;</p>
        <hr/>
        <h2><?php _e('Hard Boiled Security', BEDHBS) ?></h2>
        <table class="form-table">
            <tr>
                <th>
                    <label for="user_nicename">
                        <?php _e('User Nicename', BEDHBS) ?>
                        <span class="description">(required)</span>
                    </label>
                </th>
                <td>
                    <input type="text" name="user_nicename" id="user_nicename" value="<?php echo esc_attr( $user->user_nicename ); ?>" class="regular-text" /><br />
                    <p class="description">
                        <?php _e('The nicename is used in the user profile\'s permalink. For security reasons, it should be different from the username', BEDHBS) ?>
                        (<strong><?= get_author_posts_url($user->ID) ?></strong>).
                    </p>
                </td>
            </tr>
        </table>

        <?php
    }

    public function nicename_save( $userID ) {

        if ( !current_user_can( 'edit_user', $userID ) ) {
            return false;
        }

        if ( isset( $_POST['user_nicename'] ) ) {
            $nicename = $_POST['user_nicename'];

            $args = [
                'ID' => $userID,
                'user_nicename' => $nicename,
            ];

            wp_update_user($args);
        }
    }
}
