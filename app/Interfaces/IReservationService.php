<?php
interface IReservationService
{
    public function reserveBook(int $userId, int $bookId): array;
    public function confirmReservation(int $userId, int $bookId, int $availableQuantity): bool;
    public function cancelReservation(int $reservationId): bool;
}
