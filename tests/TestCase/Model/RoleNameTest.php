<?php

declare(strict_types=1);

namespace App\Test\TestCase\Model;

use App\Model\RoleName;
use PHPUnit\Framework\TestCase;

final class RoleNameTest extends TestCase
{
    public function testOk(): void
    {
        // Arrange
        $expected = RoleName::class;
        // Act
        $roleName = RoleName::from('general');
        // Assert
        $this->assertInstanceOf($expected, $roleName);
    }
}
