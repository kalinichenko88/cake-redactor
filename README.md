CakePHP-Helpers
===============

Different helpers for CakePHP for 2.1.*

--------------------------
EditorHelper
--------------------------
JQuery WYSIWYG html editor for CakePHP. 
Usage
In AppController add helper

public $helpers = array(
              'Editor',
               ***
);

In view - $this->Editor->setup(array('%ID_FIELD%', '%ID_FIELD_OTHER%'));

