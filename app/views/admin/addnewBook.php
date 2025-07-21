<?php require_once APPROOT . '/views/inc/sidebar.php';?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" integrity="sha512-iBBXm8fW90+nuLcSKlbmrPcLa0OT92xO1BIsZ+ywDWZCvqsWgccV3gFoRBv0z+8dLJgyAHIhR3authorization/lQfrg1Bw==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <main class="flex-1 p-6 md:p-10 flex justify-center items-center">
            <div class="bg-white p-8 md:p-10 rounded-xl shadow-xl max-w-md w-full">
                <h2 class="text-2xl font-bold text-gray-800 text-center mb-8">Add New Book</h2>

                <form id="addBookForm" class="space-y-6">
                    <div>
                        <label for="chooseImage" class="sr-only">Choose Image File</label>
                        <input type="file" id="chooseImage" class="w-full px-4 py-3 border border-gray-300 rounded-full focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="bookID" class="sr-only">Book ID</label>
                        <input type="text" id="bookID" placeholder="Book ID" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="title" class="sr-only">Title</label>
                        <input type="text" id="title" placeholder="Title" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="author" class="sr-only">Author</label>
                        <input type="text" id="author" placeholder="Author" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    <div>
                        <label for="isbn" class="sr-only">ISBN</label>
                        <input type="text" id="isbn" placeholder="ISBN" class="w-full px-4 py-3 border border-gray-300 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
                    </div>
                    
                    <div>
                        <label for="quantityInput" class="block text-gray-700 text-sm font-bold mb-2">Quantity:</label>
                        <div class="flex items-center">
                            <button type="button" id="decrementQuantity" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-l focus:outline-none focus:shadow-outline">
                                <i class="fas fa-minus"></i>
                            </button>
                            <input type="number" id="quantityInput" value="1" min="1" class="shadow appearance-none border-t border-b text-center w-full py-2 px-3 text-gray-700 leading-tight focus:outline-none focus:shadow-outline">
                            <button type="button" id="incrementQuantity" class="bg-gray-300 hover:bg-gray-400 text-gray-800 font-bold py-2 px-4 rounded-r focus:outline-none focus:shadow-outline">
                                <i class="fas fa-plus"></i>
                            </button>
                        </div>
                    </div>

                    <button type="submit" class="w-full bg-green-600 hover:bg-green-700 text-white font-semibold py-3 rounded-full shadow-lg transition duration-300 ease-in-out transform hover:scale-105">
                        Submit
                    </button>
                    <button type="button" class="w-full bg-gray-200 hover:bg-gray-300 text-gray-800 font-semibold py-3 rounded-lg shadow-md transition duration-300 ease-in-out transform hover:scale-105 flex items-center justify-center space-x-2" onclick="window.location.href='<?php echo URLROOT;?>/admin/adminDashboard'">
                        <i class="fas fa-arrow-left"></i>
                        <span>Back</span>
                    </button>
                </form>
            </div>
        </main>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const quantityInput = document.getElementById('quantityInput');
            const decrementQuantity = document.getElementById('decrementQuantity');
            const incrementQuantity = document.getElementById('incrementQuantity');
            const addBookForm = document.getElementById('addBookForm');

            // Set initial value for quantity input if it's empty or invalid
            if (quantityInput.value === '' || parseInt(quantityInput.value) < 1) {
                quantityInput.value = 1;
            }

            // Decrement quantity
            decrementQuantity.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                if (currentValue > parseInt(quantityInput.min)) {
                    quantityInput.value = currentValue - 1;
                }
            });

            // Increment quantity
            incrementQuantity.addEventListener('click', function() {
                let currentValue = parseInt(quantityInput.value);
                quantityInput.value = currentValue + 1;
            });

            // Optional: Form submission listener (for demonstration)
            addBookForm.addEventListener('submit', function(event) {
                event.preventDefault(); // Prevent default form submission

                // Collect form data
                const imageData = document.getElementById('chooseImage').files[0]; // File object
                const bookID = document.getElementById('bookID').value;
                const title = document.getElementById('title').value;
                const author = document.getElementById('author').value;
                const isbn = document.getElementById('isbn').value;
                const quantity = quantityInput.value;

                const newBookData = {
                    image: imageData ? imageData.name : 'No Image', // Just file name for demo
                    bookID: bookID,
                    title: title,
                    author: author,
                    isbn: isbn,
                    quantity: quantity
                };

                console.log('New Book Data:', newBookData);

                // In a real application, you would send this data to your backend
                // using Fetch API or XMLHttpRequest.
                // Example (pseudo-code):
                /*
                const formData = new FormData();
                formData.append('image', imageData);
                formData.append('book_id', bookID);
                formData.append('title', title);
                formData.append('author', author);
                formData.append('isbn', isbn);
                formData.append('quantity', quantity);

                fetch('/api/add-book', {
                    method: 'POST',
                    body: formData
                })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        alert('Book added successfully!');
                        addBookForm.reset(); // Clear form
                        // Optionally redirect or update book list
                        window.location.href = '<?php echo URLROOT;?>/admin/booklist';
                    } else {
                        alert('Error adding book: ' + data.message);
                    }
                })
                .catch(error => {
                    console.error('Error:', error);
                    alert('An error occurred while adding the book.');
                });
                */

                alert('Book details conceptually submitted! Check console for data.');
                addBookForm.reset(); // Clear the form after submission
                quantityInput.value = 1; // Reset quantity to 1
            });
        });
    </script>
</body>
</html>