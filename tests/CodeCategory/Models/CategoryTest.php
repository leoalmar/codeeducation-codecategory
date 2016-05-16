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

    public function test_check_if_can_assign_a_parent_to_a_category()
    {
        $parentCategory = Category::create(['name'=>'Parent Test','active'=>true]);
        $category = Category::create(['name'=>'Category Test','active'=>true]);

        $category->parent()->associate($parentCategory)->save();

        $childCategory = $parentCategory->children->first();

        $this->assertEquals('Category Test', $childCategory->name);
        $this->assertEquals('Parent Test', $category->parent->name);
    }

}