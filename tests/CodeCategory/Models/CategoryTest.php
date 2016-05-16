<?php

namespace Leoalmar\CodeCategory\Tests\Models;


use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeCategory\Tests\AbstractTestCase;

class CategoryTest extends AbstractTestCase
{
    
    public function setUp()
    {
        parent::setUp();
        
        $this->migrate();
    }


    public function test_check_if_a_category_can_be_persisted()
    {
        $category = Category::create(['name'=>'Category Test','active'=>true]);
        $this->assertEquals('Category Test', $category->name);

        $category = Category::all()->first();
        $this->assertEquals('Category Test', $category->name);
    }

}