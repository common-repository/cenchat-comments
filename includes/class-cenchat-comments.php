<?php
/**
 * The file that defines the core plugin class
 *
 * A class definition that includes attributes and functions used across both the
 * public-facing side of the site and the admin area.
 *
 * @link https://cenchat.com
 * @since 0.0.1
 *
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/includes
 */

/**
 * The core plugin class.
 *
 * This is used to define internationalization, admin-specific hooks, and
 * public-facing site hooks.
 *
 * Also maintains the unique identifier of this plugin as well as the current
 * version of the plugin.
 *
 * @since 0.0.1
 * @package Cenchat_Comments
 * @subpackage Cenchat_Comments/includes
 */
class Cenchat_Comments {
    /**
     * The loader that's responsible for maintaining and registering all hooks that power
     * the plugin.
     *
     * @since 0.0.1
     * @access protected
     * @var Cenchat_Comments_Loader $loader Maintains and registers all hooks for the plugin.
     */
    protected $loader;

    /**
     * The unique identifier of this plugin.
     *
     * @since 0.0.1
     * @access protected
     * @var string $plugin_name The string used to uniquely identify this plugin.
     */
    protected $plugin_name;

    /**
     * The current version of the plugin.
     *
     * @since 0.0.1
     * @access protected
     * @var string $version The current version of the plugin.
     */
    protected $version;

    /**
     * Define the core functionality of the plugin.
     *
     * Set the plugin name and the plugin version that can be used throughout the plugin.
     * Load the dependencies, define the locale, and set the hooks for the admin area and
     * the public-facing side of the site.
     *
     * @since 0.0.1
     */
    public function __construct() {
        if ( defined( 'CENCHAT_COMMENTS_VERSION' ) ) {
            $this->version = CENCHAT_COMMENTS_VERSION;
        } else {
            $this->version = '0.0.1';
        }

        $this->plugin_name = 'cenchat-comments';

        $this->load_dependencies();
        $this->define_admin_hooks();
        $this->define_public_hooks();
    }

    /**
     * Load the required dependencies for this plugin.
     *
     * Include the following files that make up the plugin:
     *
     * - Cenchat_Comments_Loader. Orchestrates the hooks of the plugin.
     * - Cenchat_Comments_Admin. Defines all hooks for the admin area.
     * - Cenchat_Comments_Public. Defines all hooks for the public side of the site.
     *
     * Create an instance of the loader which will be used to register the hooks
     * with WordPress.
     *
     * @since    0.0.1
     * @access   private
     */
    private function load_dependencies() {
        /**
         * The class responsible for orchestrating the actions and filters of the
         * core plugin.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'includes/class-cenchat-comments-loader.php';

        /**
         * The class responsible for defining all actions that occur in the admin area.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'admin/class-cenchat-comments-admin.php';

        /**
         * The class responsible for defining all actions that occur in the public-facing
         * side of the site.
         */
        require_once plugin_dir_path( dirname( __FILE__ ) ) . 'public/class-cenchat-comments-public.php';

        $this->loader = new Cenchat_Comments_Loader();
    }

    /**
     * Register all of the hooks related to the admin area functionality
     * of the plugin.
     *
     * @since 0.0.1
     * @access private
     */
    private function define_admin_hooks() {
        $plugin_admin = new Cenchat_Comments_Admin( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'admin_init', $plugin_admin, 'register_settings' );
        $this->loader->add_action( 'admin_menu', $plugin_admin, 'add_menu_page' );
    }

    /**
     * Register all of the hooks related to the public-facing functionality
     * of the plugin.
     *
     * @since 0.0.1
     * @access private
     */
    private function define_public_hooks() {
        $plugin_public = new Cenchat_Comments_Public( $this->get_plugin_name(), $this->get_version() );

        $this->loader->add_action( 'wp_enqueue_scripts', $plugin_public, 'enqueue_scripts' );
        $this->loader->add_filter( 'comments_template', $plugin_public, 'add_cenchat_comments' );
    }

    /**
     * Run the loader to execute all of the hooks with WordPress.
     *
     * @since 0.0.1
     */
    public function run() {
        $this->loader->run();
    }

    /**
     * The name of the plugin used to uniquely identify it within the context of
     * WordPress and to define internationalization functionality.
     *
     * @since 0.0.1
     * @return string The name of the plugin.
     */
    public function get_plugin_name() {
        return $this->plugin_name;
    }

    /**
     * The reference to the class that orchestrates the hooks with the plugin.
     *
     * @since 0.0.1
     * @return Cenchat_Comments_Loader Orchestrates the hooks of the plugin.
     */
    public function get_loader() {
        return $this->loader;
    }

    /**
     * Retrieve the version number of the plugin.
     *
     * @since 0.0.1
     * @return string The version number of the plugin.
     */
    public function get_version() {
        return $this->version;
    }
}
