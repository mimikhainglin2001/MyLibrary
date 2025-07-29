<?php require_once APPROOT . '/views/inc/sidebar.php'; ?>

<main class="main-content-area bg-blue-100 shadow-md">
    <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-800">User List</h2>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search"
                       class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="<?php echo URLROOT; ?>/admin/profile"
               class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition duration-300">
                <i class="fas fa-user-circle text-2xl"></i>
                <span class="font-medium"><?php echo htmlspecialchars($name['name']); ?></span>
            </a>
        </div>
    </div>

    <div class="bg-white p-6 rounded-lg shadow-md">
        <div class="table-scroll-container">
            <table class="table-auto w-full border-collapse border border-gray-300">
                <thead>
                <tr class="bg-gray-200 text-gray-700">
                    <th class="border px-4 py-2">ID</th>
                    <th class="border px-4 py-2">Name</th>
                    <th class="border px-4 py-2">Email</th>
                    <th class="border px-4 py-2">Roll No</th>
                    <th class="border px-4 py-2">Gender</th>
                    <th class="border px-4 py-2">Year</th>
                    <th class="border px-4 py-2">Status</th>
                    <th class="border px-4 py-2">Actions</th>
                </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                <?php foreach ($data['members'] as $member): ?>
                    <tr>
                        <td class="border px-4 py-2"><?= htmlspecialchars($member['id']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($member['name']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($member['email']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($member['rollno']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($member['gender']) ?></td>
                        <td class="border px-4 py-2"><?= htmlspecialchars($member['year']) ?></td>
                        <td class="border px-4 py-2">
                            <span class="<?= $member['is_active'] ? 'text-green-600' : 'text-red-600' ?>">
                                <?= $member['is_active'] ? 'Active' : 'Inactive' ?>
                            </span>
                        </td>
                        <td class="flex space-x-2">
                            <button
                                class="view-details-button bg-blue-500 text-white px-3 py-1 rounded"
                                data-id="<?= htmlspecialchars($member['id']) ?>"
                                data-name="<?= htmlspecialchars($member['name']) ?>"
                                data-email="<?= htmlspecialchars($member['email']) ?>"
                                data-rollno="<?= htmlspecialchars($member['rollno']) ?>"
                                data-gender="<?= htmlspecialchars($member['gender']) ?>"
                                data-year="<?= htmlspecialchars($member['year']) ?>"
                                data-status="<?= $member['is_active'] ? 'Active' : 'Inactive' ?>"
                            >
                                View
                            </button>

                            <button
                                class="edit-button bg-yellow-500 text-white px-3 py-1 rounded"
                                data-id="<?= htmlspecialchars($member['id']) ?>"
                                data-name="<?= htmlspecialchars($member['name']) ?>"
                                data-year="<?= htmlspecialchars($member['year']) ?>"
                                data-status="<?= $member['is_active'] ? 'Active' : 'Inactive' ?>"
                            >
                                Edit
                            </button>

                            <button
                                class="delete-button bg-red-500 text-white px-3 py-1 rounded"
                                data-id="<?= htmlspecialchars($member['id']) ?>"
                            >
                                Delete
                            </button>
                        </td>
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>

<!-- View Modal -->
<div id="viewModal" class="modal hidden" role="dialog" aria-modal="true" aria-labelledby="viewModalTitle">
    <div class="modal-content">
        <h3 id="viewModalTitle">User Details</h3>
        <p><strong>ID:</strong> <span id="viewId"></span></p>
        <p><strong>Name:</strong> <span id="viewName"></span></p>
        <p><strong>Email:</strong> <span id="viewEmail"></span></p>
        <p><strong>Roll No:</strong> <span id="viewRoll"></span></p>
        <p><strong>Gender:</strong> <span id="viewGender"></span></p>
        <p><strong>Year:</strong> <span id="viewYear"></span></p>
        <p><strong>Status:</strong> <span id="viewStatus"></span></p>
        <button onclick="closeModal('viewModal')" class="mt-4 bg-gray-500 text-white px-4 py-2 rounded">Close</button>
    </div>
</div>

<!-- Edit Modal -->
<div id="editModal" class="modal hidden" role="dialog" aria-modal="true" aria-labelledby="editModalTitle">
    <div class="modal-content">
        <h3 id="editModalTitle">Edit User</h3>
        <form id="editForm" method="POST">
            <input type="hidden" id="editId" name="id">
            <label>Name: <input type="text" id="editName" name="name" required></label><br>
            <label>Year: <input type="text" id="editYear" name="year" required></label><br>
            <label>Status:
                <select id="editStatus" name="status" required>
                    <option value="Active">Active</option>
                    <option value="Inactive">Inactive</option>
                </select>
            </label><br>
            <button type="submit" class="bg-blue-600 text-white px-4 py-2 rounded mt-2">Save</button>
            <button type="button" onclick="closeModal('editModal')" class="bg-gray-500 text-white px-4 py-2 rounded mt-2">Cancel</button>
        </form>
    </div>
</div>

<!-- Delete Modal -->
<div id="deleteModal" class="modal hidden" role="dialog" aria-modal="true" aria-labelledby="deleteModalTitle">
    <div class="modal-content">
        <h3 id="deleteModalTitle">Confirm Deletion</h3>
        <p>Are you sure you want to delete this member?</p>
        <button id="confirmDelete" class="bg-red-600 text-white px-4 py-2 rounded">Delete</button>
        <button onclick="closeModal('deleteModal')" class="bg-gray-500 text-white px-4 py-2 rounded">Cancel</button>
    </div>
</div>

<style>
    .modal {
        position: fixed;
        top: 0; left: 0;
        width: 100%; height: 100%;
        background: rgba(0, 0, 0, 0.5);
        display: flex; align-items: center; justify-content: center;
        z-index: 1000;
    }

    .modal.hidden {
        display: none;
    }

    .modal-content {
        background: white;
        padding: 20px;
        border-radius: 8px;
        width: 400px;
        animation: fadeIn 0.2s ease-in-out;
    }

    @keyframes fadeIn {
        from { opacity: 0; transform: scale(0.95); }
        to { opacity: 1; transform: scale(1); }
    }
</style>

<script>
    const viewButtons = document.querySelectorAll('.view-details-button');
    const editButtons = document.querySelectorAll('.edit-button');
    const deleteButtons = document.querySelectorAll('.delete-button');

    let deleteId = null;

    function closeModal(id) {
        document.getElementById(id).classList.add('hidden');
    }

    function openModal(id) {
        document.getElementById(id).classList.remove('hidden');
    }

    // View Button Click
    viewButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('viewId').textContent = btn.dataset.id;
            document.getElementById('viewName').textContent = btn.dataset.name;
            document.getElementById('viewEmail').textContent = btn.dataset.email;
            document.getElementById('viewRoll').textContent = btn.dataset.rollno;
            document.getElementById('viewGender').textContent = btn.dataset.gender;
            document.getElementById('viewYear').textContent = btn.dataset.year;
            document.getElementById('viewStatus').textContent = btn.dataset.status;
            openModal('viewModal');
        });
    });

    // Edit Button Click
    editButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            document.getElementById('editId').value = btn.dataset.id;
            document.getElementById('editName').value = btn.dataset.name;
            document.getElementById('editYear').value = btn.dataset.year;
            document.getElementById('editStatus').value = btn.dataset.status;
            openModal('editModal');
        });
    });

    // Edit Form Submit — dynamically sets action URL
    document.getElementById('editForm').addEventListener('submit', function (e) {
        const id = document.getElementById('editId').value;
        this.action = "<?php echo URLROOT; ?>/admin/editMemberList/" + id;
    });

    // Delete Button Click — open confirmation modal
    deleteButtons.forEach(btn => {
        btn.addEventListener('click', () => {
            deleteId = btn.dataset.id;
            openModal('deleteModal');
        });
    });

    // Confirm Delete
 document.getElementById('confirmDelete').addEventListener('click', () => {
    if (deleteId) {
        fetch("<?php echo URLROOT; ?>/admin/deleteMemberList/" + deleteId, {
            method: "POST",
            headers: {
                'Content-Type': 'application/json'
            },
            body: JSON.stringify({ id: deleteId })  // send id in body if needed by backend
        })
        .then(async response => {
            if (!response.ok) {
                const errorText = await response.text();
                throw new Error(errorText || 'Failed to delete member');
            }
            return response.text();
        })
        .then(result => {
            console.log("Deleted:", result);
            closeModal('deleteModal');
            location.reload();
        })
        .catch(error => {
            console.error("Delete failed:", error);
            alert("Failed to delete member: " + error.message);
        });
    }
});

</script>
