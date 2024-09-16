document.addEventListener('DOMContentLoaded', function () {
    const likeButtons = document.querySelectorAll('.like-button');
    const storedLikes = JSON.parse(localStorage.getItem('likes')) || {};

    likeButtons.forEach(button => {
        const cardId = button.getAttribute('data-id');
        const likeCountElement = document.querySelector(`.like-count[data-id="${cardId}"]`);
        let likeCount = storedLikes[cardId] || 0;

        likeCountElement.textContent = likeCount;

        button.addEventListener('click', function () {
            likeCount++;
            likeCountElement.textContent = likeCount;

            storedLikes[cardId] = likeCount;
            localStorage.setItem('likes', JSON.stringify(storedLikes));

            fetch('/update_likes.php', { // Assurez-vous que le chemin est correct
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json'
                },
                body: JSON.stringify({ cardId: cardId, likeCount: likeCount })
            })
                .then(response => response.json())
                .then(data => {
                    if (data.success) {
                        console.log('Like count updated successfully');
                    } else {
                        console.error('Failed to update like count');
                    }
                })
                .catch(error => console.error('Error:', error));
        });
    });
});