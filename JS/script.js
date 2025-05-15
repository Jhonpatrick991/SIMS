document.addEventListener('DOMContentLoaded', function() {
    const statCards = document.querySelectorAll('.stat-card');
    statCards.forEach(card => {
        card.addEventListener('click', function() {
            const statTitle = this.querySelector('.stat-title').textContent;
            console.log(`Clicked on ${statTitle}`);
            
            if (statTitle.includes('Students')) {
                window.location.href = 'Menu/students.php';
            } else if (statTitle.includes('Sections')) {
                window.location.href = 'Menu/sections.php';
            } else if (statTitle.includes('Subjects')) {
                window.location.href = 'Menu/subjects.php';
            }
        });
        
        const moreInfoLink = card.querySelector('.more-info');
        if (moreInfoLink) {
            moreInfoLink.addEventListener('click', function(event) {
                event.stopPropagation();
                
                const statTitle = card.querySelector('.stat-title').textContent;
                
                if (statTitle.includes('Students')) {
                    window.location.href = 'Menu/students.php';
                } else if (statTitle.includes('Sections')) {
                    window.location.href = 'Menu/sections.php';
                } else if (statTitle.includes('Subjects')) {
                    window.location.href = 'Menu/subjects.php';
                }
            });
        }
    });
    
    const classCards = document.querySelectorAll('.class-card');
    classCards.forEach(card => {
        card.addEventListener('click', function() {
            const classCode = this.querySelector('.class-code').textContent;
            console.log(`Clicked on class ${classCode}`);
            
        });
    });
    
    const sidebarItems = document.querySelectorAll('nav li');
    sidebarItems.forEach(item => {
        item.addEventListener('mouseenter', function() {
            if (!this.classList.contains('active')) {
                this.style.backgroundColor = '#444';
            }
        });
        
        item.addEventListener('mouseleave', function() {
            if (!this.classList.contains('active')) {
                this.style.backgroundColor = '';
            }
        });
    }); 

  function updateLiveClock() {
    const now = new Date();
    const options = {
      hour: 'numeric',
      minute: 'numeric',
      second: 'numeric',
      hour12: true
    };
    const clockElement = document.getElementById('liveClock');
    if (clockElement) {
      clockElement.textContent = now.toLocaleTimeString('en-US', options);
    }
  }

  updateLiveClock();    
  setInterval(updateLiveClock, 1000);
});


document.querySelector(".user-info").addEventListener("click", function() {
    document.querySelector(".dropdownContent").classList.toggle("show");
})
