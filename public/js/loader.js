    const loaderEl = document.getElementsByClassName('fullpage-loader')[0];
    document.addEventListener('readystatechange', (event) => {
        // const readyState = "interactive";
        const readyState = "complete";

        if (document.readyState == readyState) {
            // when document ready add lass to fadeout loader
            loaderEl.classList.add('fullpage-loader--invisible');

            // when loader is invisible remove it from the DOM
            setTimeout(() => {
                loaderEl.parentNode.removeChild(loaderEl);
            }, 2000)
        }
    });