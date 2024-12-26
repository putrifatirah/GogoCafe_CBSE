// Get the modal element
const modal = document.getElementById("add-item-modal");

// Function to open the modal
function openAddItemModal() {
  modal.style.display = "block";
}

// Function to close the modal
function closeAddItemModal() {
  modal.style.display = "none";
}

// Handle form submission
const addItemForm = document.getElementById("add-item-form");
addItemForm.addEventListener("submit", function (e) {
  e.preventDefault();

  // Get form values
  const itemName = document.getElementById("item-name").value;
  const itemDescription = document.getElementById("item-description").value;
  const itemCategory = document.getElementById("item-category").value;
  const itemPrice = document.getElementById("item-price").value;
  const itemImage = document.getElementById("item-image").value;

  // TODO: Handle adding the new item to the table or updating the menu data
  
  // Clear the form
  addItemForm.reset();
  
  // Close the modal
  closeAddItemModal();
});
