const likes = document.querySelectorAll('.like');
const likesState = {};

likes.forEach((like) => {
    likesState[like.dataset.id] = { isLiked: false, countLike: 0 };

  const cardId = like.dataset.id; // Définir la variable cardId ici

    like.addEventListener('click', () => {
    const likeCount = document.querySelector(`.like-count[data-id="${cardId}"]`);

    if (!likesState[cardId].isLiked) {
    likesState[cardId].isLiked = true;
    likesState[cardId].countLike++;
    likeCount.textContent = likesState[cardId].countLike;
    like.classList.add('liked');
    like.style.backgroundPosition = 'right';
    console.log('Like added');
    } else {
    likesState[cardId].isLiked = false;
    likesState[cardId].countLike--;
    likeCount.textContent = likesState[cardId].countLike;
    like.classList.remove('liked');
    like.style.backgroundPosition = 'left';
    console.log('Like removed');
    }

    like.classList.toggle('anim-like');
    });

    like.addEventListener('animationend', () => {
    console.log('Animation end event triggered');
    like.classList.toggle('anim-like');
    });
});