document.getElementById('contactForm').addEventListener('submit', function(event) {
    event.preventDefault();
    
    var email = document.getElementById('email').value;
    var contact = document.getElementById('contact').value;

    var data = {
        email: email,
        contact: contact
    };

    fetch('send_email.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json'
        },
        body: JSON.stringify(data)
    })
    .then(function(response) {
        if (!response.ok) {
            throw new Error('Network response was not ok');
        }
        alert('Заявка успішно відправлена!');
    })
    .catch(function(error) {
        console.error('There was a problem with the fetch operation:', error);
        alert('Сталася помилка. Будь ласка, спробуйте ще раз.');
    });
});
