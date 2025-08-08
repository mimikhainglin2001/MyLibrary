<?php
require_once APPROOT . '/Interfaces/IBorrowBookService.php';
require_once APPROOT . '/Repository/BorrowBookRepository.php';

class BorrowBookService implements IBorrowBookService
{
    private IBorrowBookRepository $repository;

    public function __construct(IBorrowBookRepository $repository)
    {
        $this->repository = $repository;
        date_default_timezone_set('Asia/Yangon');
    }

    public function borrowBook(int $userId, int $bookId): array
    {
        $book = $this->repository->getBookById($bookId);
        if (!$book) {
            return ['success' => false, 'message' => 'Book not found.'];
        }

        if ((int)$book['available_quantity'] <= 0) {
            return ['success' => false, 'message' => 'Book currently not available.'];
        }

        $borrowCount = $this->repository->getBorrowCountByUser($userId);
        if ($borrowCount >= 2) {
            return ['success' => false, 'message' => 'You have already borrowed 2 books.'];
        }

        if ($this->repository->hasUserBorrowedBook($userId, $bookId)) {
            return ['success' => false, 'message' => 'You have already borrowed this book.'];
        }

        $now = date('Y-m-d H:i:s');
        $dueDate = date('Y-m-d H:i:s', strtotime('+7 days'));

        $borrowData = [
            'book_id' => $bookId,
            'user_id' => $userId,
            'borrow_date' => $now,
            'due_date' => $dueDate,
            'return_date' => null,
            'renew_date' => null,
            'status' => 'borrowed',
            'renew_count' => 0
        ];

        if ($this->repository->createBorrowRecord($borrowData)) {
            return ['success' => true, 'message' => 'Book borrowed successfully.'];
        }

        return ['success' => false, 'message' => 'Failed to borrow book. Please try again later.'];
    }

    public function returnBook(int $borrowId): bool
    {
        $borrow = $this->repository->getBorrowRecordById($borrowId);
        if (!$borrow) return false;

        $updateSuccess = $this->repository->updateBorrowRecord($borrowId, [
            'return_date' => date('Y-m-d H:i:s'),
            'status' => 'returned'
        ]);

        if (!$updateSuccess) return false;

        // Additional logic to update book availability etc. can be added here or in a dedicated BookService

        return true;
    }

    public function renewBook(int $borrowId): array
    {
        $record = $this->repository->getBorrowRecordById($borrowId);
        if (!$record || empty($record['due_date'])) {
            return ['success' => false, 'message' => 'Due date not found.'];
        }

        $renewCount = ((int)($record['renew_count'] ?? 0)) + 1;
        if ($renewCount > 3) {
            return ['success' => false, 'message' => 'Maximum number of renewals reached.'];
        }

        $baseDate = $record['renew_date'] ?? $record['due_date'];
        $renewDate = date('Y-m-d H:i:s', strtotime("$baseDate +7 days"));

        $updated = $this->repository->updateBorrowRecord($borrowId, [
            'renew_date' => $renewDate,
            'renew_count' => $renewCount,
            'status' => 'renewed',
        ]);

        if ($updated) {
            return ['success' => true, 'message' => 'Book renewed successfully.'];
        }

        return ['success' => false, 'message' => 'Failed to renew book.'];
    }

    public function checkOverdueBooks(): void
    {
        $now = date('Y-m-d');
        $allRecords = $this->repository->getAllBorrowRecords();

        foreach ($allRecords as $record) {
            if (!in_array($record['status'], ['borrowed', 'renewed'])) {
                continue;
            }
            $compareDate = $record['renew_date'] ?: $record['due_date'];
            if ($compareDate && strtotime($compareDate) < strtotime($now)) {
                $this->repository->updateBorrowRecord($record['id'], ['status' => 'overdue']);
            }
        }
    }
}
