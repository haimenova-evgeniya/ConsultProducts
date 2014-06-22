<?php

/**
 *  View class
 */

class View {

    protected $_template;
    protected $_data = array();

    public function __construct( $template ) {
        if ( file_exists( $template ) ) {
            $this->_template = $template;
        }
        else {
            exit( 'File ' . $template . ' not exists.' );
        }
    }

    public function __set( $key, $value ) {
        $this->_data[$key] = $value;
    }

    public function block( $block, array $data = NULL ) {
        if ( file_exists( $block ) ) {
            if ( $data !== NULL ) extract( $data );
            ob_start();
            require $block;
            $out = ob_get_contents();
            ob_end_clean();
            return $out;
        }
        else {
            return 'File ' . $block . ' not exists.';
        }
    }

    public function display() {
        extract( $this->_data );
        require $this->_template;
    }

}


?>
