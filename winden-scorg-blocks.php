<?php
/**
 * Plugin Name: Winden - Scripts Organizer Blocks Classes
 * Description: An add-on for the Winden plugin that extends functionality to include custom post types.
 * Author: Your Name
 * Version: 1.0
 */

namespace Winden\CustomPostsAddon;

use WP_Query;

class OxygenCrawlerAddon
{
    public function __construct()
    {
        add_action('wp_loaded', [$this, 'init']);
    }

    public function init()
    {
        // Your initialization code here
    }

    public function addCustomPostTypes($posts)
    {
        $query = new WP_Query([
            'posts_per_page' => -1,
            'post_type' => ['scorg_ga'],
            'fields' => 'ids'
        ]);

        foreach ($query->posts as $post_id) {
            $posts[] = get_post($post_id);
        }

        return $posts;
    }

    // Other methods as needed...
}

// Initialize the plugin
add_action('plugins_loaded', function() {
    new OxygenCrawlerAddon();
});
