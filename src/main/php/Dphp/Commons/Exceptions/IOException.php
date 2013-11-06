<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * Thrown to indicate that an I/O error has occurred.
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
 * Thrown to indicate that an I/O error has occurred.
 *
 * @package Commons
 * @subpackage Exceptions
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @copyright See COPYRIGHT.md
 * @license See LICENSE.md
 * @version $Id$
 * @since Class available since v0.1
 */
class IOException extends AbstractException {
    /**
     * Constructs a new IOException object.
     *
     * @param
     *            string exception message
     * @param
     *            int user defined exception code
     */
    public function __construct($message = NULL, $code = 0) {
        parent::__construct ( $message, $code );
    }
}
