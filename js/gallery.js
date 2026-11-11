// Unified Dynamic Gallery Lightbox

const galleryImages = document.querySelectorAll('.image-item');
let currentImgIndex = 0;

if (galleryImages.length > 0) {
    galleryImages.forEach(function (image, index) {
        image.addEventListener('click', function () {
            currentImgIndex = index;
            openLightbox(currentImgIndex);
        });
    });
}

function getImageSrc(index) {
    const item = galleryImages[index];
    if (!item) return '';
    if (item.dataset.src) {
        return item.dataset.src;
    }
    const bg = window.getComputedStyle(item).getPropertyValue('background-image');
    const match = bg.match(/url\(["']?([^"']*)["']?\)/);
    return match ? match[1] : '';
}

function openLightbox(index) {
    closeImg();

    const container = document.body;
    const newImgWindow = document.createElement('div');
    newImgWindow.setAttribute('class', 'img-window');
    newImgWindow.setAttribute('onclick', 'closeImg()');
    container.appendChild(newImgWindow);

    const newImg = document.createElement('img');
    newImg.setAttribute('src', getImageSrc(index));
    newImg.setAttribute('id', 'current-img');
    newImgWindow.appendChild(newImg);

    newImg.onload = function () {
        const newNextBtn = document.createElement('a');
        newNextBtn.appendChild(document.createTextNode('›'));
        newNextBtn.setAttribute('class', 'img-btn-next');
        newNextBtn.setAttribute('onclick', 'changeImg(1)');
        container.appendChild(newNextBtn);

        const newPrevBtn = document.createElement('a');
        newPrevBtn.appendChild(document.createTextNode('‹'));
        newPrevBtn.setAttribute('class', 'img-btn-prev');
        newPrevBtn.setAttribute('onclick', 'changeImg(0)');
        container.appendChild(newPrevBtn);
    };
}

function closeImg() {
    const win = document.querySelector('.img-window');
    const next = document.querySelector('.img-btn-next');
    const prev = document.querySelector('.img-btn-prev');
    if (win) win.remove();
    if (next) next.remove();
    if (prev) prev.remove();
}

function changeImg(changeDir) {
    const currentImg = document.querySelector('#current-img');
    if (currentImg) currentImg.remove();

    if (changeDir === 1) {
        currentImgIndex = (currentImgIndex + 1) % galleryImages.length;
    } else {
        currentImgIndex = (currentImgIndex - 1 + galleryImages.length) % galleryImages.length;
    }

    const getImgWindow = document.querySelector('.img-window');
    if (!getImgWindow) return;

    const newImg = document.createElement('img');
    newImg.setAttribute('src', getImageSrc(currentImgIndex));
    newImg.setAttribute('id', 'current-img');
    getImgWindow.appendChild(newImg);
}

