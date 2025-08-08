<?php
require_once APPROOT . '/Interfaces/IReservationService.php';
require_once APPROOT . '/Repository/ReservationRepository.php';

class ReservationService implements IReservationService
{
    private IReservationRepository $repository;

    public function __construct(IReservationRepository $repository)
    {
        $this->repository = $repository;
        date_default_timezone_set('Asia/Yangon');
    }
    public function reserveBook(int $userId, int $bookId): array
    {
        if ($this->repository->hasPendingReservation($userId, $bookId)) {
            return ['success' => false, 'message' => 'You have already reserved this book.'];
        }

        $data = [
            'book_id' => $bookId,
            'user_id' => $userId,
            'available_quantity' => 0,
            'reserved_at' => date('Y-m-d H:i:s'),
            'status' => 'pending',
        ];

        $created = $this->repository->createReservation($data);
        if ($created) {
            return ['success' => true, 'message' => 'Book reserved successfully.'];
        }

        return ['success' => false, 'message' => 'Failed to reserve book.'];
    }

    public function confirmReservation(int $userId, int $bookId, int $availableQuantity): bool
    {
        $reservation = $this->repository->getReservationByBookId($bookId);
        if (!$reservation) return false;

        $newQuantity = $availableQuantity - 1;
        $this->repository->updateReservation($reservation['id'], ['available_quantity' => $newQuantity]);

        // Assume BorrowBookService injected if needed for borrow creation, or handle here

        // Delete reservation after confirmation
        $this->repository->deleteReservation($reservation['id']);

        // Update book availability should be handled by another service or repository

        return true;
    }

    public function cancelReservation(int $reservationId): bool
    {
        return $this->repository->deleteReservation($reservationId);
    }
}
