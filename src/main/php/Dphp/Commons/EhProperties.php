<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * Enhanced version of Properties.
 *
 * LICENSE: See LICENSE.md
 *
 * COPYRIGHT: See COPYRIGHT.md
 *
 * @package Commons
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @copyright See COPYRIGHT.md
 * @license See LICENSE.md
 * @version $Id$
 * @since File available since v0.2
 */
namespace Dphp\Commons;

/**
 * This class enhances Properties with extra functionalities.
 *
 * @package Commons
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @copyright See COPYRIGHT.md
 * @license See LICENSE.md
 * @version $Id$
 * @since Class available since v0.2
 */
class EhProperties extends Properties {
    /**
     * Constructs a new EhProperties object.
     */
    public function __construct() {
        parent::__construct ();
    }
    
    /**
     * @see Properties::getProperty()
     */
    public function getProperty($key, $defaultValue = NULL) {
        return $this->_getProperty ( Array (), $key, $defaultValue );
    }
    
    private function _getProperty($cached, $key, $defaultValue = NULL) {
        if (in_array ( $key, $cached )) {
            // loop detected
            return '';
        }
        
        $cached [] = $key;
        $value = parent::getProperty ( $key, $defaultValue );
        
        if ($value === NULL) {
            return $value;
        }
        $result = '';
        while ( strlen ( $value ) > 0 ) {
            if (preg_match ( '/^([^\{]+)/', $value, $matches )) {
                $result .= $matches [1];
                $value = substr ( $value, strlen ( $matches [1] ) );
            } elseif (preg_match ( '/^\{\%([^}]+)\}/', $value, $matches )) {
                // an environment-name placeholder
                $name = $matches [1];
                if (isset ( $_ENV [$name] )) {
                    $result .= $_ENV [$name];
                } elseif (isset ( $_SERVER [$name] )) {
                    $result .= $_SERVER [$name];
                }
                $value = substr ( $value, strlen ( $matches [0] ) );
            } elseif (preg_match ( '/^\{\$([^}]+)\}/', $value, $matches )) {
                // an property-name placeholder
                $name = $matches [1];
                $result .= $this->_getProperty ( $cached, $name );
                $value = substr ( $value, strlen ( $matches [0] ) );
            } else {
                $result .= substr ( $value, 0, 1 );
                $value = substr ( $value, 1 );
            }
        }
        return $result;
    }
}
