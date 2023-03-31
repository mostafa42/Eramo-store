// Get the file input element
const fileInput = document.querySelector('#images');

// Get the container element
const previewContainer = document.querySelector('#preview-images-container');

// Add an event listener for when the user selects files
fileInput.addEventListener('change', function() {
  // Get the selected files
  const files = fileInput.files;

  previewContainer.innerHTML ='';

  // Loop through the selected files
  for (let i = 0; i < files.length; i++) {
    // Check if the file is an image
    if (files[i].type.startsWith('image/')) {
      // Create a new FileReader object
      const reader = new FileReader();

      // Add an event listener for when the file has been loaded
      reader.addEventListener('load', function() {
        // Create a new image element
        const image = document.createElement('img');
        image.className = 'img-thumbnail  rounded m-2';
        image.style.width ='200px';
        image.style.height ='200px';
        image.style.objectFit ='cover';


        image.style.display ='inline-block';

        // Set the src attribute of the image to the data URL of the file
        image.src = reader.result;

        // Append the image to the previewContainer element
        previewContainer.appendChild(image);
      });

      // Read the file as a data URL
      reader.readAsDataURL(files[i]);
    }
  }
});
