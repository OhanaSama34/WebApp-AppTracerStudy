/*const navbar = document.getElementsByTagName('nav')[0];

window.addEventListener('scroll', function() {
    console.log(window.scrollY);
    if (window.scrollY > 1) {
        navbar.classList.replace('n', 'nav-color');
    } else {
        navbar.classList.replace('nav-color', 'bg-transparent'); // Ubah urutan kelas di sini
    }
});
*/
// Ambil semua elemen dengan kelas 'nav-link'
const navLinks = document.querySelectorAll('.nav-link');

// Loop melalui setiap elemen nav-link
navLinks.forEach(link => {
  // Tambahkan event listener untuk setiap elemen nav-link
  link.addEventListener('click', () => {
    // Cek apakah tombol hamburger menu sedang terbuka (collapsed)
    const navbarToggler = document.querySelector('.navbar-toggler');
    const isMenuOpen = navbarToggler.getAttribute('aria-expanded') === 'true';

    // Jika menu hamburger sedang terbuka, tutup menu
    if (isMenuOpen) {
      navbarToggler.click(); // Menutup menu dengan mensimulasikan klik pada tombol hamburger
    }
  });
});


const benefiElements = document.querySelectorAll('.benefi');
let benefisAnimated = new Array(benefiElements.length).fill(false);
window.addEventListener('scroll', () => {
    benefiElements.forEach((benefi, index) => {
        const benefiPosition = benefi.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!benefisAnimated[index] && benefiPosition < windowHeight / 0.85) {
            benefi.classList.add('animated');
            benefisAnimated[index] = true;
        } else if (benefisAnimated[index] && benefiPosition > windowHeight) {
            benefi.classList.remove('animated');
            benefisAnimated[index] = false;
        }
    });
});

const benefitElements = document.querySelectorAll('.benefit');
let benefitsAnimated = new Array(benefitElements.length).fill(false);
window.addEventListener('scroll', () => {
    benefitElements.forEach((benefit, index) => {
        const benefitPosition = benefit.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!benefitsAnimated[index] && benefitPosition < windowHeight / 0.75) {
            benefit.classList.add('animated');
            benefitsAnimated[index] = true;
        } else if (benefitsAnimated[index] && benefitPosition > windowHeight) {
            benefit.classList.remove('animated');
            benefitsAnimated[index] = false;
        }
    });
});


/*
const traceElements = document.querySelectorAll('.trace');
let tracesAnimated = new Array(traceElements.length).fill(false);

window.addEventListener('scroll', () => {
    traceElements.forEach((trace, index) => {
        const tracePosition = trace.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!tracesAnimated[index] && tracePosition < windowHeight / 1) {
            trace.classList.add('animated');
            tracesAnimated[index] = true;
        } else if (tracesAnimated[index] && tracePosition > windowHeight) {
            trace.classList.remove('animated');
            tracesAnimated[index] = false;
        }
    });
});
const mageElements = document.querySelectorAll('.mage');
let magesAnimated = new Array(mageElements.length).fill(false);

window.addEventListener('scroll', () => {
    mageElements.forEach((mage, index) => {
        const magePosition = mage.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!magesAnimated[index] && magePosition < windowHeight * 0.85) {
            mage.style.transform = 'translateX(0)';
            mage.style.opacity = 1;
            magesAnimated[index] = true;
        } else if (magesAnimated[index] && magePosition > windowHeight) {
            mage.style.transform = 'translateX(-110px)';
            mage.style.opacity = 0;
            magesAnimated[index] = false;
        }
    });
});

const benefitElements = document.querySelectorAll('.benefit');
let benefitsAnimated = new Array(benefitElements.length).fill(false);

const benefiElements = document.querySelectorAll('.benefi');
let benefisAnimated = new Array(benefiElements.length).fill(false);

*/
const traceElements = document.querySelectorAll('.trace');
let tracesAnimated = new Array(traceElements.length).fill(false);

const mageElements = document.querySelectorAll('.mage');
let magesAnimated = new Array(mageElements.length).fill(false);


// Animasi saat scroll ke bawah

window.addEventListener('scroll', () => {

    traceElements.forEach((trace, index) => {
        const tracePosition = trace.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!tracesAnimated[index] && tracePosition < windowHeight * 0.85) {
            trace.style.transform = 'translateX(0)';
            trace.style.opacity = 1;
            tracesAnimated[index] = true;
        }
    });

    mageElements.forEach((mage, index) => {
        const magePosition = mage.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!magesAnimated[index] && magePosition < windowHeight * 0.85) {
            mage.style.transform = 'translateX(0)';
            mage.style.opacity = 1;
            magesAnimated[index] = true;
        }
    });
    /*benefiElements.forEach((benefi, index) => {
        const benefiPosition = benefi.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!benefisAnimated[index] && benefiPosition < windowHeight * 0.85) {
            benefi.style.transform = 'translateY(0)';
            benefi.style.opacity = 1;
            benefisAnimated[index] = true;
        }
    });
    benefitElements.forEach((benefit, index) => {
        const benefitPosition = benefit.getBoundingClientRect().top;
        const windowHeight = window.innerHeight;

        if (!benefitsAnimated[index] && benefitPosition < windowHeight * 0.85) {
            benefit.style.transform = 'translateY(0)';
            benefit.style.opacity = 1;
            benefitsAnimated[index] = true;
        }
    });*/
});

// Animasi saat scroll ke atas

window.addEventListener('wheel', (event) => {
    if (event.deltaY < 0) {
        traceElements.forEach((trace, index) => {
            trace.style.transform = 'translateX(40px)';
            trace.style.opacity = 0;
            tracesAnimated[index] = false;
        });
        mageElements.forEach((mage, index) => {
            mage.style.transform = 'translateX(-60px)';
            mage.style.opacity = 0;
            magesAnimated[index] = false;
        });
        benefitElements.forEach((benefit, index) => {
            benefit.style.transform = 'translateY(40px)';
            benefit.style.opacity = 0;
            benefitsAnimated[index] = false;
        });
        benefiElements.forEach((benefi, index) => {
            benefi.style.transform = 'translateY(40px)';
            benefi.style.opacity = 0;
            benefisAnimated[index] = false;
        });
    }
});
