function autoResize() {
    // Get all param row ID
    const items = document.querySelectorAll('.vehicle-item:first-child .list__item');
    const params = [];

    items.forEach((element, key, parent) => {
        params.push(element.dataset.param);
    });

    // Find highest row
    params.forEach((element, key) => {
        const parameter = document.querySelectorAll('.list__item[data-param="' + element + '"]');
        let height = 0;
        
        parameter.forEach((el, index) => {
            let arr = Object.values(parameter);
            let max = Math.max.apply(Math, arr.map((o) => {
                return o.offsetHeight;
            }));
            
            if(max > height) {
                height = max;
            }

            if(height > 0) {
                el.style.height = height + 'px';
            }
        });
    });
}

window.addEventListener('resize', () => {
    autoResize();
});

export { autoResize }