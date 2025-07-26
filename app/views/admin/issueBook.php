<?php require_once APPROOT .'/views/inc/sidebar.php'; ?>

<main class="main-content-area bg-blue-100 shadow-md">
    <div class="flex items-center justify-between pb-6 border-b border-blue-200 mb-8">
        <h2 class="text-2xl font-bold text-gray-800">Borrow Book List</h2>
        <div class="flex items-center space-x-4">
            <div class="relative">
                <input type="text" placeholder="Search"
                       class="pl-10 pr-4 py-2 rounded-full border border-gray-300 focus:outline-none focus:ring-2 focus:ring-blue-500 w-48 sm:w-64">
                <i class="fas fa-search absolute left-3 top-1/2 transform -translate-y-1/2 text-gray-400"></i>
            </div>
            <a href="<?php echo URLROOT; ?>/admin/profile" class="flex items-center space-x-4 text-gray-700 hover:text-blue-600 transition duration-300">
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
                        <th class="border px-4 py-2">Book ID</th>
                        <th class="border px-4 py-2">ISBN</th>
                        <th class="border px-4 py-2">Member Name</th>
                        <th class="border px-4 py-2">Title</th>
                        <th class="border px-4 py-2">Borrow Date</th>
                        <th class="border px-4 py-2">Due Date</th>
                        <th class="border px-4 py-2">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($data['borrowBookList'] as $book): ?>
                        <tr class="hover:bg-gray-50">
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['book_id'] ?? '') ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['isbn'] ?? '') ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['name'] ?? '') ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['title'] ?? '') ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['borrow_date'] ?? '') ?></td>
                            <td class="border px-4 py-2"><?= htmlspecialchars($book['due_date'] ?? '') ?></td>
                            <td class="border px-4 py-2">
                                <?php
                                    $now = date('Y-m-d H:i:s');
                                    if (!empty($book['return_date'])) {
                                        echo '<span class="bg-green-100 text-green-700 text-sm px-3 py-1 rounded-full font-semibold">Returned</span>';
                                    } elseif (!empty($book['due_date']) && $now > $book['due_date']) {
                                        echo '<span class="bg-red-100 text-red-700 text-sm px-3 py-1 rounded-full font-semibold">Overdue</span>';
                                    } else {
                                        echo '<span class="bg-yellow-100 text-yellow-700 text-sm px-3 py-1 rounded-full font-semibold">Borrowed</span>';
                                    }
                                ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</main>
</div>

</body>
</html>


            </tbody>
        </table>
                    
                    
</main>
</div>

</body>
</html>