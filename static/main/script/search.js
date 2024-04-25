let input = document.getElementById('seach-input');
input.addEventListener('keyup', function () {
    let filter = input.value.toLowerCase();
    let filterElements = document.querySelectorAll('#user-block #user-block_in');
    filterElements.forEach(item => {
        if (item.innerHTML.toLocaleLowerCase().indexOf(filter) > -1) {
            item.style.display = '';
        } else {
            item.style.display = 'none';
        }
    });
});