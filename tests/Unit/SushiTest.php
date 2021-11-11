<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Sushi;

class SushiTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testSelectedSushiHasValidImage()
    {
        $testModel = Sushi::findOrFail(1);
        $this->assertFileExists($testModel->image_path);
    }
}
