<?php
/* vim: set expandtab tabstop=4 shiftwidth=4 softtabstop=4: */
/**
 * PHPUnit (http://www.phpunit.de/) test case(s) for Dphp\Commons\File.
 *
 * @author Thanh Ba Nguyen <btnguyen2k@gmail.com>
 * @version $Id$
 * @since File available since v0.1
 */
namespace Dphp\Commons;

require_once 'vendor/autoload.php';
class FileTest extends \PHPUnit_Framework_TestCase {
    /**
     * Tests creation of File object.
     */
    public function testObjCreation() {
        $file = new File ( "/" );
        $this->assertNotNull ( $file );
    }
    
    /**
     * Tests basic functionalities.
     */
    public function testBasic() {
        $file = new File ( "C:\\Windows\\" );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'C:/Windows', $file->getPathname () );
        
        $file = new File ( "/etc/php.ini" );
        $this->assertNotNull ( $file );
        $this->assertEquals ( '/etc/php.ini', $file->getPathname () );
        
        $file = new File ( "C:\\Windows\\\\System32///cmd.exe" );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'C:/Windows/System32/cmd.exe', $file->getPathname () );
        
        $file = new File ( "/var/log\\php.log" );
        $this->assertNotNull ( $file );
        $this->assertEquals ( '/var/log/php.log', $file->getPathname () );
    }
    
    /**
     * Tests string parent.
     */
    public function testParentString() {
        $file = new File ( 'notepad.exe', "C:\\Windows\\" );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'C:/Windows/notepad.exe', $file->getPathname () );
        
        $file = new File ( 'php.ini', "/etc" );
        $this->assertNotNull ( $file );
        $this->assertEquals ( '/etc/php.ini', $file->getPathname () );
    }
    
    /**
     * Tests file parent.
     */
    public function testParentFile() {
        $parent = new File ( "C:\\\\Windows\\\\" );
        $this->assertNotNull ( $parent );
        $file = new File ( 'notepad.exe', $parent );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'C:/Windows/notepad.exe', $file->getPathname () );
        
        $parent = new File ( "/etc" );
        $this->assertNotNull ( $parent );
        $file = new File ( '/php.ini', $parent );
        $this->assertNotNull ( $file );
        $this->assertEquals ( '/etc/php.ini', $file->getPathname () );
    }
    
    /**
     * Test method getBasename().
     */
    public function testBasename() {
        $file = new File ( '/etc/passwd' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'passwd', $file->getBasename () );
        
        $file = new File ( 'C:\\Windows\\notepad.exe' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'notepad.exe', $file->getBasename () );
    }
    
    /**
     * Test method getExtension().
     */
    public function testExtension() {
        $file = new File ( 'test.txt' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'txt', $file->getExtension () );
        
        $file = new File ( '/etc/.htaccess' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'htaccess', $file->getExtension () );
        
        $file = new File ( '/etc/noext' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( '', $file->getExtension () );
    }
    
    /**
     * Test method getFilename().
     */
    public function testFilename() {
        $file = new File ( 'test.txt' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'test', $file->getFilename () );
        
        $file = new File ( '/etc/.htaccess' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( '', $file->getFilename () );
        
        $file = new File ( '/etc/noext' );
        $this->assertNotNull ( $file );
        $this->assertEquals ( 'noext', $file->getFilename () );
    }
    
    /**
     * Test directory-related functionalities.
     */
    public function testDirectory() {
        $file = new File ( '/' );
        $this->assertNotNull ( $file );
        $this->assertTrue ( $file->isDirectory () );
    }
    
    /**
     * Test file-related functionalities.
     */
    public function testFile() {
        $file = new File ( __FILE__ );
        $this->assertNotNull ( $file );
        $this->assertTrue ( $file->isFile () );
        $this->assertTrue ( $file->isReadable () );
    }
}
