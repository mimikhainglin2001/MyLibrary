<?php
require_once APPROOT . '/Interfaces/IBorrowBookRepository.php';

class BorrowBookRepository implements IBorrowBookRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function getBookById(int $bookId): ?array
    {
        return $this->db->getById('books', $bookId);
    }

    public function getBorrowCountByUser(int $userId): int
    {
        return $this->db->getBorrowCountByUser($userId);
    }

    public function hasUserBorrowedBook(int $userId, int $bookId): bool
    {
        return $this->db->hasUserBorrowedBook($userId, $bookId);
    }

    public function createBorrowRecord(array $data): bool
    {
        return $this->db->create('borrowBook', $data);
    }

    public function getBorrowRecordById(int $borrowId): ?array
    {
        return $this->db->getById('borrowBook', $borrowId);
    }

    public function updateBorrowRecord(int $borrowId, array $data): bool
    {
        return $this->db->update('borrowBook', $borrowId, $data);
    }

    public function getAllBorrowRecords(): array
    {
        return $this->db->readAll('borrowBook');
    }
}
