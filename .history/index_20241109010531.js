function addFavorite(button) {
    if (button.childNodes[3].nodeName === 'SPAN') {
        button.innerHTML = `
        <i class="fa fa-heart ms-2" style="font-size: 21px;"></i>
        `
    } else {
        button.innerHTML = `
         <span class="material-symbols-outlined ms-2"> favorite </span>
        `
    }
}