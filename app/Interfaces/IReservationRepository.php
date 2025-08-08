<?php
interface IReservationRepository
{
    public function hasPendingReservation(int $userId, int $bookId): bool;
    public function createReservation(array $data): bool;
    public function getReservationByBookId(int $bookId): ?array;
    public function updateReservation(int $reservationId, array $data): bool;
    public function deleteReservation(int $reservationId): bool;
}
