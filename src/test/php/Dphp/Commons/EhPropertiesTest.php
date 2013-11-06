<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * PHPUnit (http://www.phpunit.de/) test case(s) for Dphp\Commons\EhProperties.
 *
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @version $Id$
 * @since File available since v0.1
 */
namespace Dphp\Commons;

require_once 'vendor/autoload.php';
class EhPropertiesTest extends \PHPUnit_Framework_TestCase {
    const TEST_FILE = 'src/test/php/Dphp/Commons/test.eh.properties';
    
    /**
     */
    public function test1() {
        $obj = new EhProperties ();
        $this->assertNotNull ( $obj );
    }
    
    /**
     */
    public function test2() {
        $obj = new EhProperties ();
        $this->assertNotNull ( $obj );
        $obj->load ( self::TEST_FILE );
        
        $value = $obj->getProperty ( 'name' );
        $this->assertEquals ( 'Thanh', $value );
    }
    
    /**
     */
    public function test3() {
        $obj = new EhProperties ();
        $this->assertNotNull ( $obj );
        $obj->load ( self::TEST_FILE );
        
        $value = $obj->getProperty ( 'hello' );
        $this->assertEquals ( 'Hello Thanh! How are you Thanh?', $value );
    }
    
    /**
     */
    public function test4() {
        $obj = new EhProperties ();
        $this->assertNotNull ( $obj );
        $obj->load ( self::TEST_FILE );
        
        $value = $obj->getProperty ( 'hola' );
        $this->assertEquals ( 'Hola !', $value );
    }
    
    /**
     */
    public function test5() {
        $obj = new EhProperties ();
        $this->assertNotNull ( $obj );
        $obj->load ( self::TEST_FILE );
        
        $value = $obj->getProperty ( 'greeting' );
        $this->assertEquals ( 'Greeting! Hello Thanh! How are you Thanh?', $value );
    }
    
    /**
     */
    public function test6() {
        $obj = new EhProperties ();
        $this->assertNotNull ( $obj );
        $obj->load ( self::TEST_FILE );
        
        $value = $obj->getProperty ( 'wrongFormat' );
        $this->assertEquals ( 'Hello, ${wrong} format!', $value );
    }
}
