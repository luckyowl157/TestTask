document.addEventListener('DOMContentLoaded', function() {
    const faqItems = document.querySelectorAll('.faq-grid-list li');

    faqItems.forEach(item => {
        const question = item.getElementsByClassName('faq-question')[0];
        const answer = item.querySelector('p');

        if (question && answer) {
            if (window.innerWidth < 768) {
                answer.style.display = 'none';
                item.classList.add('faq-collapsed');
            }

            question.addEventListener('click', function() {
							console.log('clicked')
                if (window.innerWidth < 768) {
                    const isCollapsed = item.classList.contains('faq-collapsed');
                    
                    if (isCollapsed) {
                        answer.style.display = 'block';
                        item.classList.remove('faq-collapsed');
                        item.classList.add('faq-expanded');
                    } else {
                        answer.style.display = 'none';
                        item.classList.add('faq-collapsed');
                        item.classList.remove('faq-expanded');
                    }
                }
            });
        }
    });
    window.addEventListener('resize', function() {
        const faqItems = document.querySelectorAll('.faq-grid-list li');
        
        faqItems.forEach(item => {
            const answer = item.querySelector('p');
            
            if (answer) {
                if (window.innerWidth >= 768) {
                    answer.style.display = 'block';
                    item.classList.remove('faq-collapsed', 'faq-expanded');
                } else {
                    answer.style.display = 'none';
                    item.classList.add('faq-collapsed');
                    item.classList.remove('faq-expanded');
                }
            }
        });
    });
});
