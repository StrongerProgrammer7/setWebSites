
document.querySelectorAll('a[href^="#"').forEach(link => {

    link.addEventListener('click', function(e) {
        e.preventDefault();

        let href = this.getAttribute('href').substring(1);

        const scrollTarget = document.getElementById(href);

        const topOffset = document.querySelector('#navigation').offsetHeight;
        // const topOffset = 0; // если не нужен отступ сверху 
        const elementPosition = scrollTarget.getBoundingClientRect().top;
        let offsetPosition = 0;
        if(href=="Main")
        {
             offsetPosition = elementPosition - topOffset;
        }
        else
        {
             offsetPosition = elementPosition - topOffset +85;
        }


        window.scrollBy({
            top: offsetPosition,
            behavior: 'smooth'
        });
    });
});