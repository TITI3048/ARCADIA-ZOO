

let modablesimg = document.querySelectorAll('.modablesimg');

for (let i =0; i < modablesimg.length; i++) {
    modablesimg[i].addEventListener('click', function() {
        generateModal(modablesimg[i].src, modalesimg[i].getattribute("data-modal-captation"));
    });
}

function generateModal(src, caption) 
{
let div = document.createElement('div');
let img = document.createElement('img');
let close = document.createElement('span');
let text = document.createElement('span');

text.innerHTML = caption;
close.innerHTML = "&times;";
img.src = src;
div.append(img, close,text);
document.body.appendChild(div);
}