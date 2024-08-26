
const like = document.querySelector('.like');

let countLike = 0;
like.addEventListener('click', () => {

    if(countLike === 0) {
        like.classList.toggle('anim-like');
        countLike = 1;
        like.style.backgroundPosition = 'right';
    } else {
        countLike = 0;
        like.style.backgroundPosition = 'left';
    }

});

like.addEventListener('animationend', () => {
    like.classList.toggle('anim-like');
})

let isliked = false;
let isdisliked = false;

const togglelike = () => {
    const button = document.getElementById('button');
    const likecount = document.getElementById('likecount');

    if(isliked) {
        isliked = false;
        likecount.textContent = parseInt(likecount.textContent)
        - 1;
        button.classList.remove("button");
        button.classList.add("button");
    }else{
        isliked = true;
        if(isdisliked) {
            isdisliked = false;
            const dislikecount = document.getElementById('likecount');
            ("dislikecount");
            dislikecount.textContent =parseInt(likecount.textContent) - 1;
            const button = document.getElementById('button');
            button.classList.remove("button");
            button.classList.add("button");
        }
        likecount.textContent = parseInt(likecount.textContent) + 1;
        button.classList.remove("button");
        button.classList.add("button");
    }
}