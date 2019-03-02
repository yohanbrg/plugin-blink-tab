<?php
class BlinkTab_AdminPage
{
    private $template_path;

    public function __construct($template_path)
    {
        $this->template_path = rtrim($template_path, '/');
    }

    public function configure()
    {
        register_setting($this->get_slug(), 'blinktab_option');

        add_settings_section(
            $this->get_slug() . '-section',
            __('', 'blinktab'),
            [$this, 'render_section'],
            $this->get_slug()
        );
        add_settings_field(
            $this->get_slug() . '-api-status',
            __('Blink tab text', 'blinktab'),
            [$this, 'render_option_field'],
            $this->get_slug(),
            $this->get_slug() . '-section'
        );
    }

    public function get_capability()
    {
        return 'install_plugins';
    }

    public function get_menu_title()
    {
        return 'Blink Tab';
    }

    public function get_page_title()
    {
        return 'Blink Tab Admin Page';
    }

    public function get_parent_slug()
    {
        return 'options-general.php';
    }

    public function get_slug()
    {
        return 'blinktab';
    }

    public function render_option_field()
    {
        $this->render_template('option_field');
    }

    public function render_page()
    {
        $this->render_template('page');
    }

    public function render_section()
    {
        $this->render_template('section');
    }

    private function render_template($template)
    {
        $template_path = $this->template_path . '/' . $template . '.php';

        if (!is_readable($template_path)) {
            return;
        }

        include $template_path;
    }
}
