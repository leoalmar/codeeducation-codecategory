<?php

namespace Leoalmar\CodeCategory\Repository;

use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeDatabase\AbstractRepository;

class CategoryRepository extends AbstractRepository
{
    public function model()
    {
        return Category::class;
    }
}