<?php

namespace Test;

// require_once "vendor/autoload.php";

use PHPUnit\Framework\TestCase;

class CollectionTest extends TestCase
{
    /**
     * setUp
     *
     * @return void
    */
    protected function setUp(): void
    {
    }

    /**
     * Duplicates
     *
     * @return void
     */
    public function testDuplicates()
    {
        // ソースデータ
        $testData = [
            ['id' => 3, 'name' => '田中三郎', 'email' => 'saburo@example.com'],
            ['id' => 1, 'name' => '山田太郎', 'email' => 'taro@example.com'],
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
            ['id' => 1, 'name' => '山田太郎', 'email' => 'taro@example.com'],
            ['id' => 1, 'name' => '山田太郎', 'email' => 'taro@example.com'],
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
        ];

        // 期待データ
        $expected = [
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
            ['id' => 1, 'name' => '山田太郎', 'email' => 'taro@example.com'],
            ['id' => 1, 'name' => '山田太郎', 'email' => 'taro@example.com'],
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
            ['id' => 2, 'name' => '佐藤次郎', 'email' => 'jiro@example.com'],
        ];

        $res = collect($testData)->duplicates();

        $this->assertSame($res->values()->all(), $expected);
    }

    /**
     * Flatten
     *
     * @return void
     */
    public function testFlatten()
    {
        // ソースデータ
        $testData = [
            'Apple_A' => [
                [
                    'name'  => 'iPhone 6S',
                    'brand' => 'Apple'
                ],
            ],
            'Samsung_B' => [
                [
                    'name'  => 'Galaxy S7',
                    'brand' => 'Samsung'
                ],
            ],
        ];

        // case 1
        $res      = collect($testData)->flatten();
        $expected = ['iPhone 6S', 'Apple', 'Galaxy S7', 'Samsung'];

        $this->assertSame($res->values()->all(), $expected);

        // case 2
        $res = collect($testData)->flatten(1);
        $expected = [
            ['name' => 'iPhone 6S', 'brand' => 'Apple'],
            ['name' => 'Galaxy S7', 'brand' => 'Samsung'],
        ];

        $this->assertSame($res->values()->all(), $expected);
    }

    /**
     * [data] 税込み料金メソッド
     * @return void
     */
    public static function dataCollection()
    {
        return [
            'case1: 料金が1100円' => [
                'expected' => 101,
            ],
        ];
    }
}
