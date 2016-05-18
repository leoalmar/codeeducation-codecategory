<?php

namespace Leoalmar\CodeCategory\Tests\Controllers;

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
        $controller = new AdminCategoriesController($category);

        $this->assertInstanceOf(Controller::class, $controller);

    }
}