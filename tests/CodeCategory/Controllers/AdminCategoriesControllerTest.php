<?php

namespace Leoalmar\CodeCategory\Tests\Controllers;

use Illuminate\Contracts\Routing\ResponseFactory;
use Leoalmar\CodeCategory\Controllers\Controller;
use Leoalmar\CodeCategory\Controllers\AdminCategoriesController;
use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeCategory\Tests\AbstractTestCase;
use Mockery as M;

class AdminCategoriesControllerTest extends AbstractTestCase
{
    
    public function test_should_extend_from_controller()
    {
        $category = M::mock(Category::class);
        $responseFactory = M::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory,$category);

        $this->assertInstanceOf(Controller::class, $controller);
    }
        
    public function test_controller_should_run_index_method_and_return_correct_arguments()
    {
        $category = M::mock(Category::class);
        $responseFactory = M::mock(ResponseFactory::class);
        $controller = new AdminCategoriesController($responseFactory,$category);

        $html = M::mock();

        $categoriesResult = ['Cat1','Cat2'];

        $category->shouldReceive('all')->andReturn($categoriesResult);

        $responseFactory->shouldReceive('view')
            ->with('codecategory::index', ['categories'=>$categoriesResult])
            ->andReturn($html)
        ;

        $this->assertEquals($controller->index(), $html);
    }

}