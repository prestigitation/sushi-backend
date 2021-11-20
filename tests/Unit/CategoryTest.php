<?php

namespace Tests\Unit;

use App\Models\Category;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSelectedCategoryHasValidImage()
    {
        $testModel = Category::first();
        $this->assertFileExists($testModel->preview_image);
    }
}
