

document.addEventListener("DOMContentLoaded", function() {
  // Find all thumbnail images within the thumbnails container
  var thumbnails = document.querySelectorAll('.thumbnails img');

  // The main image that will change when a thumbnail is clicked
  var mainImage = document.querySelector('.main-image-container .main-image');

  // Loop over each thumbnail
  thumbnails.forEach(function(thumbnail) {
    // Add a click event listener to each thumbnail
    thumbnail.addEventListener('click', function() {
      // Update the main image's src with the thumbnail's src
      mainImage.src = this.src;
    });
  });
});


document.addEventListener('DOMContentLoaded', function() {
    var quantityInput = document.getElementById('quantity');

    // Quantity decrement
    document.querySelector('.minus').addEventListener('click', function() {
        quantityInput.value = Math.max(parseInt(quantityInput.value, 10) - 1, 1);
    });

    // Quantity increment
    document.querySelector('.plus').addEventListener('click', function() {
        quantityInput.value = parseInt(quantityInput.value, 10) + 1;
    });

    // Color option selection
    const colorOptions = document.querySelectorAll('.color-option');
    colorOptions.forEach(option => {
        option.addEventListener('click', () => {
            colorOptions.forEach(opt => opt.classList.remove('selected'));
            option.classList.add('selected');
        });
    });
});
document.querySelectorAll('.cart-items select[name="quantity"]').forEach(selectElement => {
        selectElement.addEventListener('change', () => {
            selectElement.form.submit();
        });
    });

