<?php

/**
 * The User Class
 *
 * @since 2.6.0
 */
class WPUF_User {

    /**
     * User ID
     *
     * @var integer
     */
    public $id;

    /**
     * User Object
     *
     * @var \WP_User
     */
    public $user;

    /**
     * The constructor
     *
     * @param integer|WP_User $user
     */
    function __construct( $user ) {

        if ( is_numeric( $user ) ) {

            $the_user = get_user_by( 'id', $user );

            if ( $the_user ) {
                $this->id   = $the_user->ID;
                $this->user = $the_user;
            }

        } elseif ( is_a( $user, 'WP_User') ) {
            $this->id   = $user->ID;
            $this->user = $user;
        }
    }

    /**
     * Check if a user's posting capability is locked
     *
     * @return boolean
     */
    public function post_locked() {
        return 'yes' ==  get_user_meta( $this->id, 'wpuf_postlock', true );
    }

    /**
     * Get the post lock reason
     *
     * @return string
     */
    public function lock_reason() {
        return get_user_meta( $this->id, 'wpuf_lock_cause', true );
    }

    /**
     * Handles user subscription
     *
     * @return \WPUF_User_Subscription
     */
    public function subscription() {
        return new WPUF_User_Subscription( $this );
    }

    /**
     * Check if user is verified
     *
     * @since 2.8.8
     *
     * @return bool
     */
    public function is_verified() {
       return  0 !== get_user_meta( $this->id, '_wpuf_user_active', true );
    }

    /**
     * Mark user as verified
     *
     * @since 2.8.8
     *
     * @return void
     */
    public function mark_verified() {
        update_user_meta( $this->id, '_wpuf_user_active', 1 );
    }

    /**
     * Mark user as unverified
     *
     * @since 2.8.8
     *
     * @return void
     */
    public function mark_unverified() {
        update_user_meta( $this->id, '_wpuf_user_active', 0 );
    }

    /**
     * Set user activation key
     *
     * @since 2.8.8
     *
     * @return void
     */
    public function set_activation_key( $key ) {
        update_user_meta( $this->id, '_wpuf_activation_key', $key );
    }

    /**
     * Get user activation key
     *
     * @since 2.8.8
     *
     * @return string
     */
    public function get_activation_key() {
        return get_user_meta( $this->id, '_wpuf_activation_key', true );
    }

    /**
     * Remove user activation key
     *
     * @since 2.8.8
     *
     * @return void
     */
    public function remove_activation_key( ) {
        delete_user_meta( $this->id, '_wpuf_activation_key' );
    }

}
