<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * This class is the top level abstract class of all other exception classes.
 *
 * LICENSE: See LICENSE.md
 *
 * COPYRIGHT: See COPYRIGHT.md
 *
 * @package Commons
 * @subpackage Exceptions
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @copyright See COPYRIGHT.md
 * @license See LICENSE.md
 * @version $Id$
 * @since File available since v0.1
 */
namespace Dphp\Commons\Exceptions;

/**
 * This class is the top level abstract class of all other exception classes.
 *
 * @package Commons
 * @subpackage Exceptions
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @copyright See COPYRIGHT.md
 * @license See LICENSE.md
 * @version $Id$
 * @since Class available since v0.1
 */
abstract class AbstractException extends Exception {
    
    /**
     * Constructs a new AbstractException object.
     *
     * @param
     *            string exception message
     * @param
     *            int user defined exception code
     */
    public function __construct($message = NULL, $code = 0) {
        parent::__construct ( $message, $code );
    }
    
    /**
     * Custom string representation of the object.
     *
     * @return string
     */
    public function __toString() {
        return __CLASS__ . ": [{$this->code}]: {$this->message}\n";
    }
}
