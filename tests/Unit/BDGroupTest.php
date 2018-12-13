<?php
/**
 * Date: 04.06.17
 * Time: 10:53
 */

namespace S327at\L51blog\Tests;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use PHPUnit\Framework\TestCase;
use PHPUnit\DbUnit\TestCaseTrait;

class BDGroupTest extends TestCase
{
    use TestCaseTrait;

     public function getConnection()
    {
        $database='database';
        $user='root';
        $password=1111;
        $pdo=new \PDO('mysql:host=localhost;dbname=database', $user, $password);
        return $this->createDefaultDBConnection($pdo, $database);
    }



      public  function testGroupTable()
    {
        $expected=$this->createMySQLXMLDataSet("db2.xml")->getTable('groups');
        $queryTable = $this->getConnection()->createQueryTable(
            'groups', 'SELECT * FROM groups');

        $this->assertTablesEqual($expected, $queryTable);
    }


    public function getDataSet()
    {
        return $this->createMySQLXMLDataSet('db2.xml');
    }


}