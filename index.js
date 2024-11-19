
function addFavorite(button) {
    if (button.childNodes[1].nodeName === 'SPAN') {
        button.innerHTML = `
        <i class="fa fa-heart ms-2" style="font-size: 21px; color: red"></i>
        `
    } else {
        button.innerHTML = `
         <span class="material-symbols-outlined ms-2"> favorite </span>
        `
    }
    console.log(button.childNodes);

}