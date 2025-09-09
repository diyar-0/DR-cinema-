        function setSeason(season) {
            const footer = document.querySelector('.footer');
            const footerBottom = document.getElementById('season-footer');
            const btn = document.getElementById('btn');
            const bgSeason = document.getElementById('bg-season');
            const bgseasonbtnAll = document.querySelectorAll('.bg-season-btn');
            const bgseasonicon = document.querySelectorAll('.bg-season-icon');
            const textseasonbtn = document.querySelectorAll('.text-season-btn');
            const textseasonbtnbg = document.querySelectorAll('.text-season-btn-bg');

            const seasonColors = {
                'spring': '#23b123ff',
                'summer': '#e02727ff',
                'autumn': '#ffd52fff',
                'winter': '#3b83eeff'
            };

            bgseasonbtnAll.forEach(el => {
                el.style.backgroundColor = seasonColors[season] || 'transparent';
            });
             textseasonbtnbg.forEach(el => {
                el.style.Color = seasonColors[season] || 'transparent';
            });

            const seasonColorsicon = {
                'spring': '#23b123ff',
                'summer': '#e02727ff',
                'autumn': '#ffd52fff',
                'winter': '#3b83eeff'
            };
            bgseasonicon.forEach(el => {
                el.style.color = seasonColorsicon[season] || 'transparent';
            });


            footer.className = 'footer ' + season + '-theme';
            footerBottom.className = 'footer-bottom ' + season + '-theme';
            btn.className = 'season-message ' + season + '-text';
            if (bgSeason) {
                bgSeason.className = season + '-bg';
            }

            const messages = {
                'spring': 'Spring has arrived! Flowers and greenery everywhere.',
                'summer': 'Summer is here! A perfect time for trips and beach fun.',
                'autumn': 'Autumn has arrived! Yellow and red leaves all around.',
                'winter': 'Winter is here! A cozy time for coffee and staying indoors.'
            };


            btn.textContent = messages[season];
            btn.style.animation = 'none';
            void btn.offsetWidth;
            btn.style.animation = 'fadeIn 0.8s ease';

            // زیادکردنی رەنگی نووسین بۆ textseasonbtn
            textseasonbtn.forEach(el => {
                if (season === 'autumn') {
                    el.style.color = 'black';
                } else {
                    el.style.color = 'white';
                }
                el.style.fontWeight = 'bold';
            });

            localStorage.setItem('selectedSeason', season);
        }

        document.querySelectorAll('.season-img').forEach(img => {
            img.addEventListener('click', function() {
                const season = this.getAttribute('data-season');
                setSeason(season);
            });
        });

        window.addEventListener('DOMContentLoaded', function() {
            const savedSeason = localStorage.getItem('selectedSeason');
            if (savedSeason) {
                setSeason(savedSeason);
            }
        });

        const style = document.createElement('style');
        style.textContent = `
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
    `;
        document.head.appendChild(style);
