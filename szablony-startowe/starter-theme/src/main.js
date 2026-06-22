import './styles.css';

import gsap from 'gsap';
import { ScrollTrigger } from 'gsap/ScrollTrigger';
import Lenis from 'lenis';

gsap.registerPlugin(ScrollTrigger);

// Fundament dostępności: gdy użytkownik prosi o ograniczenie ruchu, pomijamy
// smooth-scroll i animacje. CSS (prefers-reduced-motion) odsłania treść statycznie.
const reduceMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

if (!reduceMotion) {
  // Smooth scroll (Lenis ~3 kB).
  const lenis = new Lenis({ duration: 1.1, smoothWheel: true });

  // Jedna pętla rAF: spinamy Lenis z tickerem GSAP, żeby uniknąć scroll-janku (psuje INP).
  lenis.on('scroll', ScrollTrigger.update);
  gsap.ticker.add((time) => lenis.raf(time * 1000));
  gsap.ticker.lagSmoothing(0);

  // Animacje wejścia sekcji. W szablonie wystarczy <section data-animate>.
  // Animujemy tylko opacity/transform — idą po GPU, bez reflow.
  gsap.utils.toArray('[data-animate]').forEach((el) => {
    gsap.fromTo(
      el,
      { opacity: 0, y: 40 },
      {
        opacity: 1,
        y: 0,
        duration: 0.8,
        ease: 'power2.out',
        scrollTrigger: { trigger: el, start: 'top 80%' },
      }
    );
  });
}
