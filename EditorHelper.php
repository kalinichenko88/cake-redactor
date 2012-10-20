<?php

/*
 * JS editor 
 * This helper use Redactor v8.0.3
 * http://imperavi.com/redactor/
 * http://imperavi.com/redactor/docs/
 */

/**
 * CakePHP Editor
 * @author Joker
 */
class EditorHelper extends AppHelper {

    public $helpers = array(
        'Html',
        'Js'
    );
    // Default settings - More info - http://imperavi.com/redactor/docs/settings/
    public $settings = array(
        'lang' => 'ru',
        'minHeight' => 200,
        'source' => true, // Show/hide the HTML source button on the toolbar.
        'shortcuts' => false, // Turns on/off keydown / keyup shortcuts functionality.
        'autoresize' => true, // This option turns on height autoresizing, which depends on the amount of text inputted into the text layer.
        'cleanup' => true, // Turns on/off a text's cleanup on paste.
        'air' => false, // http://imperavi.com/redactor/examples/air/ // hide toolbar, context edit
    );

    public function __construct(View $View, $settings = array()) {
        parent::__construct($View, $settings);
    }

    public function getScripts() {
        $this->Html->script(array('/redactor/redactor.min', '/redactor/ru'), array('block' => 'script'));
        $this->Html->css('/redactor/redactor', null, array('block' => 'css'));
    }

    public function setup($text_area = null, $settings = array()) {
        $this->getScripts();
        $settings_json = json_encode(am($this->settings, $settings));
        $this->Js->buffer("var settings = $settings_json;");
        if (is_array($text_area)) {
            foreach ($text_area as $txt_id) {
                $this->Js->buffer("$('#$txt_id').redactor(settings);");
            }
        } else {
            $this->Js->buffer("$('#$text_area').redactor(settings);");
        }
    }

}
