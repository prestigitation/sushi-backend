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
        $testModel = Category::findOrFail(1);
        $this->assertFileExists($testModel->image_path);
    }
}
