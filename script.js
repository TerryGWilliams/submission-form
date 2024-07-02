const form = document.getElementById('feedback_form');

form.addEventListener('submit', function(event) {
  const name = document.getElementById('name').value;
  const email = document.getElementById('email').value;
  const feedback = document.getElementById('feedback').value;
  const rating = document.getElementById('rating').value;

  // Basic validation checks
  if (name === '') {
    alert('Please provide your name.');
    event.preventDefault();
    return;
  }

  if (email === '') {
    alert('Please provide your email address.');
    event.preventDefault();
    return;
  }

  if (feedback === '') {
    alert('Please provide your feedback.');
    event.preventDefault();
    return;
  }

  if (rating === '') {
    alert('Please select a rating.');
    event.preventDefault();
    return;
  }

});
