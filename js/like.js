document.addEventListener('DOMContentLoaded', function() {

  const likeButtons = document.querySelectorAll('.like-button');

  const storedLikes = JSON.parse(localStorage.getItem('likes')) || {};

  likeButtons.forEach(button => {
      const cardId = button.getAttribute('data-id');
      const likeCountElement = document.querySelector(`.like-count[data-id="${cardId}"]`);
      let likeCount = storedLikes[cardId] || 0;

      likeCountElement.textContent = likeCount;

      button.addEventListener('click', function() {
          likeCount++;
          likeCountElement.textContent = likeCount;

          storedLikes[cardId] = likeCount;
          localStorage.setItem('likes', JSON.stringify(storedLikes));
      });
  });
});