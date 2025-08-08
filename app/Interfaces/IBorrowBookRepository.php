<?php
interface IBorrowBookRepository
{
    public function getBookById(int $bookId): ?array;
    public function getBorrowCountByUser(int $userId): int;
    public function hasUserBorrowedBook(int $userId, int $bookId): bool;
    public function createBorrowRecord(array $data): bool;
    public function getBorrowRecordById(int $borrowId): ?array;
    public function updateBorrowRecord(int $borrowId, array $data): bool;
    public function getAllBorrowRecords(): array;
}
