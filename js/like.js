// script.js
document.addEventListener('DOMContentLoaded', function() {
  // Récupérer tous les boutons de like
  const likeButtons = document.querySelectorAll('.like-button');
  
  // Récupérer les likes stockés
  const storedLikes = JSON.parse(localStorage.getItem('likes')) || {};

  likeButtons.forEach(button => {
      const cardId = button.getAttribute('data-id');
      const likeCountElement = document.querySelector(`.like-count[data-id="${cardId}"]`);
      let likeCount = storedLikes[cardId] || 0;

      // Mettre à jour le compteur d'affichage
      likeCountElement.textContent = likeCount;

      button.addEventListener('click', function() {
          // Incrémenter le compteur
          likeCount++;
          likeCountElement.textContent = likeCount;

          // Mettre à jour le stockage local
          storedLikes[cardId] = likeCount;
          localStorage.setItem('likes', JSON.stringify(storedLikes));
      });
  });
});