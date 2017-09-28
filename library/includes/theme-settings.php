<?php

$theSpotThemeSettings = new theSpotThemeSettings();
class theSpotThemeSettings {

    function theSpotThemeSettings() {
        add_filter( 'admin_init' , array( &$this , 'register_fields' ) );
    }

    function register_fields() {
        /* Newsletter Form Title */
        register_setting( 'general', 'newsletter_form_title', '' );
        add_settings_field( 'newsletter_form_title', '<label for="newsletter_form_title">' . __( 'Newsletter Form Title' , 'newsletter_form_title' ).'</label>' , array( &$this, 'newsletter_form_title_html' ) , 'general' );

        /* Newsletter Form Description */
        register_setting( 'general', 'newsletter_form_description', '' );
        add_settings_field( 'newsletter_form_description', '<label for="newsletter_form_description">' . __( 'Newsletter Form Description' , 'newsletter_form_description' ).'</label>' , array( &$this, 'newsletter_form_description_html' ) , 'general' );

        /* Take Survery CTA Title */
        register_setting( 'general', 'survey_cta_title', '' );
        add_settings_field( 'survey_cta_title', '<label for="survey_cta_title">' . __( 'Newsletter Form Title' , 'survey_cta_title' ).'</label>' , array( &$this, 'survey_cta_title_html' ) , 'general' );

        /* Take Survery CTA Description */
        register_setting( 'general', 'survey_cta_description', '' );
        add_settings_field( 'survey_cta_description', '<label for="survey_cta_description">' . __( 'Take Survey CTA Description' , 'survey_cta_description' ).'</label>' , array( &$this, 'survey_cta_description_html' ) , 'general' );
    }

    function map_cta_subline_html() {
        $value = get_option( 'map_cta_subline', '' );
        echo '<input type="text" id="map_cta_subline" name="map_cta_subline" style="width: 100%;" value="' . $value . '" />';
    }

    function map_cta_title_html() {
        $value = get_option( 'map_cta_title', '' );
        echo '<input type="text" id="map_cta_title" name="map_cta_title" style="width: 100%;" value="' . $value . '" />';
    }

    function newsletter_form_title_html() {
        $value = get_option( 'newsletter_form_title', '' );
        echo '<input type="text" id="newsletter_form_title" name="newsletter_form_title" style="width: 100%;" value="' . $value . '" />';
    }

    function survey_cta_description_html() {
        $value = get_option( 'survey_cta_description', '' );
        echo '<textarea rows="7" id="survey_cta_description" name="survey_cta_description" style="width: 100%; outline: none; resize: none;">' . $value . '</textarea>';
    }

    function survey_cta_title_html() {
        $value = get_option( 'survey_cta_title', '' );
        echo '<input type="text" id="survey_cta_title" name="survey_cta_title" style="width: 100%;" value="' . $value . '" />';
    }

    function newsletter_form_description_html() {
        $value = get_option( 'newsletter_form_description', '' );
        echo '<textarea rows="7" id="newsletter_form_description" name="newsletter_form_description" style="width: 100%; outline: none; resize: none;">' . $value . '</textarea>';
    }

}

?>