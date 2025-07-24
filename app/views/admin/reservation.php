<?php require_once APPROOT .'/views/inc/sidebar.php'; ?>
<main class="main-content-area bg-blue-100 shadow-md">
    <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Reservation List</h2>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search" class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="<?php echo URLROOT; ?>/admin/profile" class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition duration-300">
                        <i class="fas fa-user-circle text-2xl"></i>
                        <span class="font-medium"><?php echo $name; ?></span>
                    </a>
        </div>
    </div>

    <!-- Reservation List Table -->
    <div class="bg-white p-6 rounded-lg shadow-md">
        <!-- Wrapper for vertically scrollable table with fixed header -->
        <div class="table-scroll-container"> 
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th class="table-header">Reservation ID</th>
                        <th class="table-header">Member ID</th>
                        <th class="table-header">Member Name</th>
                        <th class="table-header">ISBN</th>
                        <th class="table-header">Book Title</th>
                        <th class="table-header">Reservation Date</th>
                        <th class="table-header">Status</th>
                        <th class="table-header text-center">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    <!-- Example Rows -->
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">R001</td>
                        <td class="table-cell">1</td>
                        <td class="table-cell">John Doe</td>
                        <td class="table-cell">00111</td>
                        <td class="table-cell">Brain and Heart</td>
                        <td class="table-cell">May 15, 2025</td>
                        <td class="table-cell">Pending</td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 confirm-reservation-button" data-reservation-id="R001">
                                    <i class="fas fa-check mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 cancel-reservation-button" data-reservation-id="R001">
                                    <i class="fas fa-times mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <!-- Repeat similarly for other rows with updated classes -->
                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">R002</td>
                        <td class="table-cell">2</td>
                        <td class="table-cell">Alice Wonderland</td>
                        <td class="table-cell">00112</td>
                        <td class="table-cell">Sone Htuk Mg San Shar</td>
                        <td class="table-cell">May 16, 2025</td>
                        <td class="table-cell">Confirmed</td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 confirm-reservation-button" data-reservation-id="R002">
                                    <i class="fas fa-check mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 cancel-reservation-button" data-reservation-id="R002">
                                    <i class="fas fa-times mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">R003</td>
                        <td class="table-cell">3</td>
                        <td class="table-cell">Elle Fanning</td>
                        <td class="table-cell">00113</td>
                        <td class="table-cell">Myanmar Politic</td>
                        <td class="table-cell">May 17, 2025</td>
                        <td class="table-cell">Canceled</td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 confirm-reservation-button" data-reservation-id="R003">
                                    <i class="fas fa-check mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 cancel-reservation-button" data-reservation-id="R003">
                                    <i class="fas fa-times mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">R004</td>
                        <td class="table-cell">4</td>
                        <td class="table-cell">Kim Kardashian</td>
                        <td class="table-cell">00114</td>
                        <td class="table-cell">Thu Lo Lu ThuKhaMain</td>
                        <td class="table-cell">May 18, 2025</td>
                        <td class="table-cell">Pending</td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 confirm-reservation-button" data-reservation-id="R004">
                                    <i class="fas fa-check mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 cancel-reservation-button" data-reservation-id="R004">
                                    <i class="fas fa-times mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>

                    <tr class="hover:bg-blue-50">
                        <td class="table-cell">R005</td>
                        <td class="table-cell">5</td>
                        <td class="table-cell">Jeon Jungkook</td>
                        <td class="table-cell">00115</td>
                        <td class="table-cell">A Yeik</td>
                        <td class="table-cell">May 19, 2025</td>
                        <td class="table-cell">Fulfilled</td>
                        <td class="table-cell">
                            <div class="flex items-center justify-center space-x-2">
                                <button class="bg-green-500 hover:bg-green-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 confirm-reservation-button" data-reservation-id="R005">
                                    <i class="fas fa-check mr-1"></i>
                                </button>
                                <button class="bg-red-500 hover:bg-red-600 text-white font-semibold py-1 px-3 rounded-md transition duration-300 cancel-reservation-button" data-reservation-id="R005">
                                    <i class="fas fa-times mr-1"></i>
                                </button>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div> <!-- End table-scroll-container -->
        <div class="mt-8 flex justify-end">
            <button class="bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-2 px-6 rounded-full shadow-md transition duration-300" onclick="window.location.href='<?php echo URLROOT;?>/admin/adminDashboard'">
                <i class="fas fa-arrow-left mr-2"></i>Back
            </button>
        </div>
    </div>
</main>
</div>

<!-- Confirm Reservation Popup -->
<div id="confirmReservationMessageBox" class="popup-box-overlay">
  <div class="popup-box">
    <h3 class="popup-title">Confirm Reservation</h3>
    <p>Are you sure you want to confirm this reservation?</p>
    <div class="popup-buttons">
      <button id="confirmReservationButton" class="btn btn-confirm">Confirm</button>
      <button id="cancelConfirmReservationButton" class="btn btn-cancel">Cancel</button>
    </div>
  </div>
</div>

<!-- Cancel Reservation Popup -->
<div id="cancelReservationMessageBox" class="popup-box-overlay">
  <div class="popup-box">
    <h3 class="popup-title">Cancel Reservation</h3>
    <p>Are you sure you want to cancel this reservation?</p>
    <div class="popup-buttons">
      <button id="confirmCancelReservationButton" class="btn btn-cancel">Yes</button>
      <button id="denyCancelReservationButton" class="btn btn-confirm">No</button>
    </div>
  </div>
</div>

<style>
  /* Overlay for popup */
  .popup-box-overlay {
    position: fixed;
    top: 0;
    left: 0;
    width: 100vw;
    height: 100vh;
    background-color: rgba(0, 0, 0, 0.5);
    display: none; /* hidden by default */
    justify-content: center;
    align-items: center;
    z-index: 1000;
  }

  .popup-box-overlay.show {
    display: flex;
    animation: fadeIn 0.3s ease forwards;
  }

  /* Popup box */
  .popup-box {
    background-color: #fff;
    padding: 2rem 2.5rem;
    border-radius: 12px;
    box-shadow: 0 10px 25px rgba(0, 0, 0, 0.15);
    max-width: 400px;
    width: 90%;
    text-align: center;
    animation: slideDown 0.3s ease forwards;
  }

  /* Popup title */
  .popup-title {
    margin-bottom: 1rem;
    font-size: 1.5rem;
    font-weight: 700;
    color: #1e3a8a; /* blue-800 */
  }

  /* Popup message */
  .popup-box p {
    margin-bottom: 2rem;
    font-size: 1.1rem;
    color: #374151; /* gray-700 */
  }

  /* Button container */
  .popup-buttons {
    display: flex;
    justify-content: center;
    gap: 1rem;
  }

  /* Buttons */
  .btn {
    padding: 0.6rem 1.8rem;
    border-radius: 9999px;
    font-size: 1rem;
    font-weight: 600;
    cursor: pointer;
    border: none;
    transition: background-color 0.3s ease;
    min-width: 100px;
  }

  .btn-confirm {
    background-color: #2563eb; /* blue-600 */
    color: white;
  }
  .btn-confirm:hover {
    background-color: #1d4ed8; /* blue-700 */
  }

  .btn-cancel {
    background-color: #e5e7eb; /* gray-200 */
    color: #374151; /* gray-700 */
  }
  .btn-cancel:hover {
    background-color: #d1d5db; /* gray-300 */
  }

  /* Animations */
  @keyframes fadeIn {
    from {opacity: 0;}
    to {opacity: 1;}
  }
  @keyframes slideDown {
    from {
      opacity: 0;
      transform: translateY(-20px);
    }
    to {
      opacity: 1;
      transform: translateY(0);
    }
  }
</style>


<script>
document.addEventListener('DOMContentLoaded', function () {
    const confirmReservationButtons = document.querySelectorAll('.confirm-reservation-button');  
    const cancelReservationButtons = document.querySelectorAll('.cancel-reservation-button');  

    const confirmBox = document.getElementById('confirmReservationMessageBox');
    const cancelBox = document.getElementById('cancelReservationMessageBox');

    const confirmAction = document.getElementById('confirmReservationButton');
    const cancelConfirm = document.getElementById('cancelConfirmReservationButton');

    const cancelAction = document.getElementById('confirmCancelReservationButton');
    const denyCancel = document.getElementById('denyCancelReservationButton');

    let currentId = null;

    // Open Confirm Popup
    confirmReservationButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentId = button.dataset.reservationId;
            confirmBox.classList.add('show');
        });
    });

    // Open Cancel Popup
    cancelReservationButtons.forEach(button => {
        button.addEventListener('click', () => {
            currentId = button.dataset.reservationId;
            cancelBox.classList.add('show');
        });
    });

    // Confirm Reservation
    confirmAction.addEventListener('click', () => {
        console.log('✅ Confirmed reservation:', currentId);
        confirmBox.classList.remove('show');
        // TODO: Add AJAX or form submit logic here to confirm reservation in backend
    });

    // Cancel Confirm Popup
    cancelConfirm.addEventListener('click', () => {
        confirmBox.classList.remove('show');
    });

    // Cancel Reservation
    cancelAction.addEventListener('click', () => {
        console.log('❌ Cancelled reservation:', currentId);
        cancelBox.classList.remove('show');
        // TODO: Add AJAX or form submit logic here to cancel reservation in backend
    });

    // Deny Cancel Popup
    denyCancel.addEventListener('click', () => {
        cancelBox.classList.remove('show');
    });
});
</script>

</body>
</html>
