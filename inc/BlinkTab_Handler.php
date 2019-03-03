<?php

class BlinkTab_Handler{

    public static function init()
   {
       $self = new self();
       add_action('init', [ $self, 'load_frontend_js' ]);
       add_action('admin_menu', [ $self, 'add_admin_settings_page' ]);
   }

   public function load_frontend_js()
   {
       if (is_admin()) {
       	return;
       }
       wp_register_script('blink-tab', BLINK_TAB_JS_URL . 'blink-tab.min.js', [], false, true);
       $blinktab_settings = [
           'wording' => get_option('blinktab_option', ''),
       ];
       wp_localize_script( 'blink-tab', 'blinktabSettings', $blinktab_settings );
       wp_enqueue_script('blink-tab');
   }

   public function add_admin_settings_page()
   {
       $admin_page = new BlinkTab_AdminPage(BLINK_TAB_TEMPLATES_PATH);
       $admin_page->configure();

       add_submenu_page(
           $admin_page->get_parent_slug(),
           $admin_page->get_page_title(),
           $admin_page->get_menu_title(),
           $admin_page->get_capability(),
           $admin_page->get_slug(),
           [$admin_page, 'render_page']
       );
   }
}
