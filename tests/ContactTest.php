<?php

namespace App\Tests;

use PHPUnit\Framework\TestCase;
use App\Repository\ContactRepository;

class ContactTest extends TestCase
{
    public function testContactSearch(): void
    {
        $newContact = $this->createMock(ContactRepository::class);
        $newContact->expects($this->once())->method("search")->willReturn([]);

        $this->assertEquals([], $newContact->search(""));
    }
}
