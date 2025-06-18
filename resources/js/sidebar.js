document.addEventListener('DOMContentLoaded', () => {
    const currentPath = window.location.pathname;

    document.querySelectorAll('[data-bs-toggle="collapse"]').forEach(element => {
        const href = element.getAttribute('href');
        const targetElement = href && document.getElementById(href.substring(1));
        const arrowIcon = element.querySelector('.arrow-icon');

        if (targetElement && arrowIcon) {
            targetElement.addEventListener('show.bs.collapse', () => {
                arrowIcon.classList.add('rotate');
            });

            targetElement.addEventListener('hide.bs.collapse', event => {
                if (targetElement === event.target) {
                    arrowIcon.classList.remove('rotate');
                }
            });
        }
    });

    const activateLink = (link) => {
        link.classList.add('active');
        const parentCollapse = link.closest('.collapse');
        if (parentCollapse) {
            parentCollapse.classList.add('show');
            const parentLink = document.querySelector([href="#${parentCollapse.id}"]);
            if (parentLink) {
                parentLink.querySelector('.arrow-icon').classList.add('rotate');
                activateLink(parentLink); // Recursively activate parent links
            }
        }
    };

    document.querySelectorAll('.nav-link').forEach(link => {
        if (link.getAttribute('href') === currentPath) {
            activateLink(link);
        }
    });
});