<?php
require_once APPROOT . '/middleware/authmiddleware.php';
class  Reservation extends Controller
{
    private $db;
    public function __construct()
    {
        AuthMiddleware::userOnly();
        $this->db = new Database();
        $this->model('ReservationModel');
    }
    public function reserve()
    {
        try {
            $user = $_SESSION['session_loginuser'] ?? null;
            $bookId = $_GET['id'] ?? null;

            if (!$user || !$bookId) {
                $this->redirectWithMessage('Invalid user or book.', 'pages/category', 'error');
                return;
            }

            // Fetch all reservations
            $allReservations = $this->db->readAll('reservations');

            // Check for existing pending reservation 
            $existingReservations = array_filter($allReservations, function ($reservation) use ($user, $bookId) {
                return $reservation['user_id'] == $user['id']
                    && $reservation['book_id'] == $bookId
                    && $reservation['status'] === 'pending';
            });

            if (empty($existingReservations)) {
                date_default_timezone_set('Asia/Yangon');
                $reservationData = [
                    'book_id'            => $bookId,
                    'available_quantity' => 0,
                    'user_id'            => $user['id'],
                    'reserved_at'        => date('Y-m-d H:i:s'),
                    'status'             => 'pending',
                ];

                if ($this->db->create('reservations', $reservationData)) {
                    $this->redirectWithMessage('Book reserved successfully.', 'user/history', 'success');
                } else {
                    $this->redirectWithMessage('Failed to reserve book. Please try again later.', 'user/history', 'error');
                }
                return;
            }

            $this->redirectWithMessage('You have already reserved this book.', 'user/history', 'error');
        } catch (PDOException $e) {
            $this->redirectWithMessage('Database error: ' . $e->getMessage(), 'user/history', 'error');
        } catch (Exception $e) {
            $this->redirectWithMessage('An unexpected error occurred.', 'user/history', 'error');
        }
    }

    // Redirect with session message, 
    private function redirectWithMessage(string $message, string $location, string $type = 'error')
    {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        $_SESSION['flash_message'] = ['type' => $type, 'message' => $message];

        header("Location: /$location");
        exit();
    }

    // Cancel Reservation
    public function cancelreservation()
    {
        try {
            $reservationId = $_GET['id'] ?? null;

            if (!$reservationId) {
                setMessage('error', 'Reservation not found');
                redirect('user/history');
                return;
            }

            $deleteReservation = $this->db->delete('reservations', $reservationId);

            if (!$deleteReservation) {
                setMessage('error', 'Failed to delete reservation');
                redirect('user/history');
            } else {
                setMessage('success', 'Successfully deleted reservation');
                redirect('user/history');
            }
        } catch (PDOException $e) {
            setMessage('error', 'Database error: ' . $e->getMessage());
            redirect('user/history');
        } catch (Exception $e) {
            setMessage('error', 'An unexpected error occurred.');
            redirect('user/history');
        }
    }
}
