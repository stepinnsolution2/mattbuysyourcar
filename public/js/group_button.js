// Select all buttons in the group
const buttons = document.querySelectorAll('.btn-modalone');

// Add click event listener to each button
buttons.forEach(button => {
  button.addEventListener('click', () => {
    // Remove the 'active' class from all buttons
    buttons.forEach(btn => btn.classList.remove('active'));
    // Add the 'active' class to the clicked button
    button.classList.add('active');
  });
});





// Select all buttons in the group
const buttons_two = document.querySelectorAll('.btn-modaltwo');

// Add click event listener to each button
buttons_two.forEach(button => {
  button.addEventListener('click', () => {
    // Remove the 'active' class from all buttons
    buttons_two.forEach(btn => btn.classList.remove('active'));
    // Add the 'active' class to the clicked button
    button.classList.add('active');
  });
});







// Select all buttons in the group
const buttons_three = document.querySelectorAll('.btn-modalthree');

// Add click event listener to each button
buttons_three.forEach(button => {
  button.addEventListener('click', () => {
    // Remove the 'active' class from all buttons
    buttons_three.forEach(btn => btn.classList.remove('active'));
    // Add the 'active' class to the clicked button
    button.classList.add('active');
  });
});





// Select all buttons in the group
const buttons_four = document.querySelectorAll('.btn-modalfour');

// Add click event listener to each button
buttons_four.forEach(button => {
  button.addEventListener('click', () => {
    // Remove the 'active' class from all buttons
    buttons_four.forEach(btn => btn.classList.remove('active'));
    // Add the 'active' class to the clicked button
    button.classList.add('active');
  });
});