<?php
/**
 * @package trivago/Protobuf-PHP
 * @since 2016-08-24
 * @author hhilbert <heiko.hilbert@trivago.com>
 * @copyright 2016 trivago GmbH
 * @license proprietary
 */
namespace DrSlump\Protobuf\Compiler;

class CommentsParserTest extends \PHPUnit_Framework_TestCase {

    public function testParse()
    {
        $parser = new CommentsParser();
        $parser->parse(file_get_contents(__DIR__ . '/Test.proto'));
        $this->assertEquals("test -\n message", $parser->getComment('test.TestMessage'));
        $this->assertEquals("one line comment", $parser->getComment('test.TestMessage.1'));
        $this->assertEquals("two line \n  comments", $parser->getComment('test.TestMessage.2'));
        $this->assertEquals("multi line comment\n    with\n multi lines", $parser->getComment('test.TestMessage.3'));
        $this->assertEquals("single multi line comment", $parser->getComment('test.TestMessage.4'));
    }
}