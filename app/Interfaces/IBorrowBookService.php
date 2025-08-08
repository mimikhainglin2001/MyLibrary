<?php
interface IBorrowBookService
{
    public function borrowBook(int $userId, int $bookId): array;
    public function returnBook(int $borrowId): bool;
    public function renewBook(int $borrowId): array;
    public function checkOverdueBooks(): void;
}
