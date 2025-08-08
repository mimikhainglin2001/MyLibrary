<?php
require_once APPROOT . '/Interfaces/IReservationRepository.php';

class ReservationRepository implements IReservationRepository
{
    private $db;

    public function __construct()
    {
        $this->db = new Database();
    }

    public function hasPendingReservation(int $userId, int $bookId): bool
    {
        return $this->db->hasPendingReservation($userId, $bookId);
    }


    public function createReservation(array $data): bool
    {
        return $this->db->create('reservations', $data);
    }

    public function getReservationByBookId(int $bookId): ?array
    {
        return $this->db->columnFilter('reservations', 'book_id', $bookId);
    }

    public function updateReservation(int $reservationId, array $data): bool
    {
        return $this->db->update('reservations', $reservationId, $data);
    }

    public function deleteReservation(int $reservationId): bool
    {
        return $this->db->delete('reservations', $reservationId);
    }
}
