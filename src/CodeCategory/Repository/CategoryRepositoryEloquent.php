<?php

namespace Leoalmar\CodeCategory\Repository;

use Leoalmar\CodeCategory\Models\Category;
use Leoalmar\CodeDatabase\AbstractRepository;
use Leoalmar\CodeDatabase\Contracts\CriteriaCollectionInterface;

class CategoryRepositoryEloquent extends AbstractRepository implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }
}