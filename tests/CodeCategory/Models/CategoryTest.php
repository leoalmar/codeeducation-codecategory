<?php

namespace Leoalmar\CodeCategory\Tests\Models;


use Illuminate\Support\MessageBag;
use Illuminate\Validation\Validator;
use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeCategory\Tests\AbstractTestCase;
use Mockery as M;

class CategoryTest extends AbstractTestCase
{
    
    public function setUp()
    {
        parent::setUp();
        $this->migrate();
    }

    public function test_inject_validator_in_category_model()
    {
        $category = new Category();
        $validator = M::mock(Validator::class);
        $category->setValidator($validator);

        $this->assertEquals($category->getValidator(), $validator);
    }

    public function test_should_check_if_it_is_valid_when_it_is()
    {
        $category = new Category();
        $category->name = "Category Test";

        $validator = M::mock(Validator::class);
        $validator->shouldReceive('setRules')->with(['name'=>'required|max:255']);
        $validator->shouldReceive('setData')->with(['name'=>'Category Test']);
        $validator->shouldReceive('fails')->andReturn(false);

        $category->setValidator($validator);

        $this->assertTrue( $category->isValid() );
    }

    public function test_should_check_if_it_is_invalid_when_it_is()
    {
        $category = new Category();
        $category->name = "Category Test";

        $messageBag = M::mock(MessageBag::class);

        $validator = M::mock(Validator::class);
        $validator->shouldReceive('setRules')->with(['name'=>'required|max:255']);
        $validator->shouldReceive('setData')->with(['name'=>'Category Test']);
        $validator->shouldReceive('fails')->andReturn(true);

        $validator->shouldReceive('errors')->andReturn($messageBag);

        $category->setValidator($validator);

        $this->assertFalse($category->isValid());
        $this->assertEquals($messageBag, $category->errors);
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